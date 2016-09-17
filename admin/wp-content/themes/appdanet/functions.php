<?php

add_filter('upload_mimes', 'custom_upload_mimes');
add_action('save_post', 'set_post');

function custom_upload_mimes($existing_mimes = array()) {
    $existing_mimes['ttf'] = 'application/x-font-ttf';
    return $existing_mimes;
} 

function isJson($string) {
    $st = json_decode($string, true);
    if ((json_last_error() == JSON_ERROR_NONE) && is_array($st)) {
        return $st;
    } else {
        return $string;
    }
}

function iterate_to_html(array $array) {
    $result = array();
    foreach ($array as $key => $item) {
        if (is_array($item)) {
            $result[$key] = iterate_to_html($item);
        } else {

            $changed = isJson(htmlspecialchars_decode($item)); // do something to the value.
            $result[$key] = $changed;
        }
    }
    return $result;
}

function set_post($id) {
    $post_status = get_post_status($id);
    $post_s = wp_get_post_categories($id);

    if (($post_status == 'publish' || $post_status == 'trash') && @$post_s[0] == 1) {
        if ($post_status == 'publish') {
            $dados = get_fields($id);

            $post = get_post($id);
            unset($dados[null]);
            $dados['titulo'] = get_the_title($id);
            $dados['id'] = $id;
            $dados['autor'] = $post->post_author;
            $dados = iterate_to_html($dados); 

            send_post("http://br.apptests.me/?novo", json_encode($dados, JSON_UNESCAPED_UNICODE));
        } else {
            send_post("http://br.apptests.me/?excluir", json_encode(array("id" => $id)));
        }
    }
}

function send_post($url, $dados) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("dados" => $dados));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
