<?php

header('Content-Type: text/html; charset=utf-8');
define('FCPATH', $_SERVER ['DOCUMENT_ROOT'] . "/");
require_once $_SERVER ['DOCUMENT_ROOT'] . "/application/config/autoload.php";
foreach ($autoload ['libraries'] as $classe) {
    require_once $_SERVER ['DOCUMENT_ROOT'] . "/application/libraries/{$classe}.php";
}
add_filter('upload_mimes', 'custom_upload_mimes');
add_action('save_post', 'set_post');

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_aplicativo',
        'title' => 'Aplicativo',
        'fields' => array (
            array (
                'key' => 'field_5761bd7d0804e',
                'label' => 'Aplicativo',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5750fe1cd1258',
                'label' => 'Site',
                'name' => 'site',
                'type' => 'checkbox',
                'choices' => array (
                    'sotestes.com' => 'sotestes.com',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array (
                'key' => 'field_6510fe1cd1258',
                'label' => 'Votar',
                'name' => 'votar',
                'type' => 'checkbox',
                'choices' => array (
                    'votar' => 'votar',
                ),
                'default_value' => '',
                'layout' => 'vertical',
            ),
            array (
                'key' => 'field_274d01ccc9019',
                'label' => 'Em destaque?',
                'name' => 'destaque',
                'type' => 'select',
                'choices' => array (
                    'nao' => 'Não',
                    'sim' => 'Sim',
                ),
                'default_value' => 'nao',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_574d01ccc9019',
                'label' => 'Estilo do aplicativo',
                'name' => 'estilo',
                'type' => 'select',
                'choices' => array (
                    'padrao' => 'Padrão',
                    'escolherAmigo' => 'Escolher um amigo',
                    'escolherAmigoRand' => 'Escolhe um amigo aleatório',
                ),
                'default_value' => 'padrao',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_574e9f579020e',
                'label' => 'Titulo de busca',
                'name' => 'titulo_de_busca',
                'type' => 'text',
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_574d01ccc9019',
                            'operator' => '==',
                            'value' => 'escolherAmigo',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'Digite o nome do amigo(a):',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_574e9f819020f',
                'label' => 'Placeholder de busca',
                'name' => 'placeholder_de_busca',
                'type' => 'text',
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_574d01ccc9019',
                            'operator' => '==',
                            'value' => 'escolherAmigo',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => 'Busque o seu amigo',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_573a8b691cc8e',
                'label' => 'Texto',
                'name' => 'texto',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array (
                'key' => 'field_573d3c2b977fa',
                'label' => 'Titulo Compartilhamento',
                'name' => 'tituloCompartilhamento',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_573d3c3c977fb',
                'label' => 'Texto Compartilhamento',
                'name' => 'textoCompartilhamento',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_573e4dd83a422',
                'label' => 'Imagem de Listagem',
                'name' => 'imagemListagem',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'full',
                'library' => 'uploadedTo',
            ),
            array (
                'key' => 'field_573a8ba51cc90',
                'label' => 'imagem Interna',
                'name' => 'imagemInterna',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'full',
                'library' => 'uploadedTo',
            ),
            array (
                'key' => 'field_573a8bc41cc91',
                'label' => 'Componentes',
                'name' => 'componentes',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_573a8bd31cc92',
                        'label' => 'Qual componente?',
                        'name' => 'qual_componente',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array (
                            'ImagemUsuario' => 'Imagem do usuário',
                            'NomeUsuario' => 'Nome do usuário',
                            'ImagemAmigo' => 'Imagem do Amigo',
                            'NomeAmigo' => 'Nome do Amigo',
                            'BarraDePorcentagemComTexto' => 'Barra de Porcentagem com Texto',
                            '' => '-------------------------',
                            'ImagemAmigo2' => 'Imagem do Amigo 2',
                            'NomeAmigo2' => 'Nome do Amigo 2',
                            'ImagemAmigo3' => 'Imagem do Amigo 3',
                            'NomeAmigo3' => 'Nome do Amigo 3',
                            'ImagemAmigo4' => 'Imagem do Amigo 4',
                            'NomeAmigo4' => 'Nome do Amigo 4',
                            'ImagemAmigo5' => 'Imagem do Amigo 5',
                            'NomeAmigo5' => 'Nome do Amigo 5',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_573e4b43b99b2',
                        'label' => 'Tipo do nome',
                        'name' => 'tipo_do_nome',
                        'type' => 'select',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array (
                            'primeiro' => 'Primeiro Nome',
                            'primeiroultimo' => 'Primeiro e Ultimo nome',
                            'completo' => 'Nome completo',
                        ),
                        'default_value' => 'primeiro',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_573a8c941cc97',
                        'label' => 'Largura',
                        'name' => 'w',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo5',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_573a8cac1cc98',
                        'label' => 'Altura',
                        'name' => 'h',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo5',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_573a8cea2ea8f',
                        'label' => 'Posição X',
                        'name' => 'x',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo5',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_573a8d002ea91',
                        'label' => 'Posição Y',
                        'name' => 'y',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo5',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_573a91ba18687',
                        'label' => 'Tamanho da fonte',
                        'name' => 'tamanho',
                        'type' => 'text',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_573a91c918688',
                        'label' => 'Cor da fonte',
                        'name' => 'cor',
                        'type' => 'color_picker',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => '#FFFFFF',
                    ),
                    array (
                        'key' => 'field_573a91e718689',
                        'label' => 'Fonte',
                        'name' => 'fonte',
                        'type' => 'select',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'choices' => array (
                            1 => 'Montserrat Normal',
                            2 => 'Montserrat Semi Bold',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_573a91f71868a',
                        'label' => 'Alinhamento',
                        'name' => 'alinhamento',
                        'type' => 'text',
                        'instructions' => '[left, center, right], [top, center, bottom]',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'NomeAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'default_value' => 'left, top',
                        'placeholder' => 'left, top',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_574e77c828937',
                        'label' => 'Barra de Porcentagem com Texto',
                        'name' => 'barra_de_porcentagem_com_texto',
                        'type' => 'repeater',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'BarraDePorcentagemComTexto',
                                ),
                            ),
                            'allorany' => 'all',
                        ),
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_574e77e728938',
                                'label' => 'Posição X - Barra',
                                'name' => 'x_barra',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e77f628939',
                                'label' => 'Posição Y - Barra',
                                'name' => 'y_barra',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e77fd2893a',
                                'label' => 'Altura - Barra',
                                'name' => 'h_barra',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e78062893b',
                                'label' => 'Largura - Barra',
                                'name' => 'w_barra',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e7938cb79c',
                                'label' => 'Cor da barra',
                                'name' => 'cor_barra',
                                'type' => 'color_picker',
                                'column_width' => '',
                                'default_value' => '',
                            ),
                            array (
                                'key' => 'field_574e78142893c',
                                'label' => 'Posição x - Texto',
                                'name' => 'x_texto',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e78242893d',
                                'label' => 'Posição Y - Texto',
                                'name' => 'y_texto',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e78342893e',
                                'label' => 'Altura - Texto',
                                'name' => 'h_texto',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e784e2893f',
                                'label' => 'Largura - Texto',
                                'name' => 'w_texto',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e785828940',
                                'label' => 'Tamanho da fonte',
                                'name' => 'tamanhor_texto',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e787928941',
                                'label' => 'Cor do texto',
                                'name' => 'cor_texto',
                                'type' => 'color_picker',
                                'column_width' => '',
                                'default_value' => '#FFFFFF',
                            ),
                            array (
                                'key' => 'field_574e788828942',
                                'label' => 'Fonte',
                                'name' => 'fonter_texto',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Montserrat Normal',
                                    2 => 'Montserrat Semi Bold',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_574e789f28943',
                                'label' => 'Alinhamento',
                                'name' => 'alinhamentor_texto',
                                'type' => 'text',
                                'instructions' => '[left, center, right], [top, center, bottom]',
                                'column_width' => '',
                                'default_value' => 'left, top',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_574e78b728944',
                                'label' => 'Variação',
                                'name' => 'variacao',
                                'type' => 'text',
                                'instructions' => '0 - 100',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Add Row',
                    ),
                    array (
                        'key' => 'field_57593f32e8b86',
                        'label' => 'Imagem Redonda',
                        'name' => 'imagem_redonda',
                        'type' => 'true_false',
                        'conditional_logic' => array (
                            'status' => 1,
                            'rules' => array (
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemUsuario',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo2',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo3',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo4',
                                ),
                                array (
                                    'field' => 'field_573a8bd31cc92',
                                    'operator' => '==',
                                    'value' => 'ImagemAmigo5',
                                ),
                            ),
                            'allorany' => 'any',
                        ),
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                    array (
                        'key' => 'field_5759420203adf',
                        'label' => 'Imagem de fundo',
                        'name' => 'imagem_de_fundo',
                        'type' => 'true_false',
                        'column_width' => '',
                        'message' => '',
                        'default_value' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_5761bdc6ab17c',
                'label' => 'Divulgação',
                'name' => '',
                'type' => 'tab',
            ),
            array (
                'key' => 'field_5761bdd2ab17d',
                'label' => 'Status',
                'name' => 'status',
                'type' => 'select',
                'choices' => array (
                    'criacao' => 'Em criação',
                    'divulgar' => 'Divulgar',
                    'divulgado' => 'Divulgado',
                ),
                'default_value' => 'criacao',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5761be14ab17e',
                'label' => 'Prioridade',
                'name' => 'prioridade',
                'type' => 'select',
                'choices' => array (
                    1 => 1,
                    2 => 2,
                    3 => 3,
                ),
                'default_value' => 3,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_5761be2eab17f',
                'label' => 'Aviso',
                'name' => 'obs',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_category',
                    'operator' => '==',
                    'value' => '1',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'custom_fields',
                4 => 'discussion',
                5 => 'comments',
                6 => 'revisions',
                7 => 'slug',
                8 => 'author',
                9 => 'format',
                10 => 'featured_image',
                11 => 'tags',
                12 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_fundo',
        'title' => 'Fundo',
        'fields' => array (
            array (
                'key' => 'field_5752a14563106',
                'label' => 'Fundos',
                'name' => 'fundos',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5752a15263107',
                        'label' => 'Imagem',
                        'name' => 'imagem',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'full',
                        'library' => 'uploadedTo',
                    ),
                    array (
                        'key' => 'field_5752a15f63108',
                        'label' => 'Titulo',
                        'name' => 'titulo',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5752a16763109',
                        'label' => 'Texto',
                        'name' => 'texto',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5752a16f6310a',
                        'label' => 'Sexo',
                        'name' => 'sexo',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array (
                            'todos' => 'Todos',
                            'feminino' => 'Apenas para mulheres',
                            'masculino' => 'Apenas para homens',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_5752a18a6310b',
                        'label' => 'Grupo de texto',
                        'name' => 'grupo_de_texto',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5752a2696310c',
                                'label' => 'Textos',
                                'name' => 'textos',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_5752a2736310d',
                                        'label' => 'Textos',
                                        'name' => 'textos',
                                        'type' => 'repeater',
                                        'column_width' => '',
                                        'sub_fields' => array (
                                            array (
                                                'key' => 'field_57535554211cc',
                                                'label' => 'ID',
                                                'name' => 'id',
                                                'type' => 'text',
                                                'column_width' => '',
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'formatting' => 'html',
                                                'maxlength' => '',
                                            ),
                                            array (
                                                'key' => 'field_575348ade5f87',
                                                'label' => 'Texto',
                                                'name' => 'texto',
                                                'type' => 'textarea',
                                                'column_width' => 500,
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'maxlength' => '',
                                                'rows' => '',
                                                'formatting' => 'none',
                                            ),
                                            array (
                                                'key' => 'field_5753490af5c7c',
                                                'label' => 'Sexo',
                                                'name' => 'sexo',
                                                'type' => 'select',
                                                'column_width' => '',
                                                'choices' => array (
                                                    'todos' => 'Todos',
                                                    'feminino' => 'Apenas para mulheres',
                                                    'masculino' => 'Apenas para homens',
                                                ),
                                                'default_value' => '',
                                                'allow_null' => 0,
                                                'multiple' => 0,
                                            ),
                                            array (
                                                'key' => 'field_575349b87c297',
                                                'label' => 'Pertence',
                                                'name' => 'pertence',
                                                'type' => 'text',
                                                'column_width' => '',
                                                'default_value' => '-1',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'formatting' => 'html',
                                                'maxlength' => '',
                                            ),
                                        ),
                                        'row_min' => '',
                                        'row_limit' => '',
                                        'layout' => 'row',
                                        'button_label' => 'Novo texto',
                                    ),
                                    array (
                                        'key' => 'field_575335e130dca',
                                        'label' => 'Largura',
                                        'name' => 'w',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_575335ec30dcb',
                                        'label' => 'Altura',
                                        'name' => 'h',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_575335f130dcc',
                                        'label' => 'Posição X',
                                        'name' => 'x',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_575335fb30dcd',
                                        'label' => 'Posição Y',
                                        'name' => 'y',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_5753360130dce',
                                        'label' => 'Tamanho',
                                        'name' => 'tamanho',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_5753360a30dcf',
                                        'label' => 'Cor',
                                        'name' => 'cor',
                                        'type' => 'color_picker',
                                        'column_width' => '',
                                        'default_value' => '',
                                    ),
                                    array (
                                        'key' => 'field_5753361030dd0',
                                        'label' => 'Fonte',
                                        'name' => 'fonte',
                                        'type' => 'select',
                                        'column_width' => '',
                                        'choices' => array (
                                            1 => 'Normal',
                                            2 => 'Bold',
                                            3 => 'Impact',
                                            4 => '8 Bit',
                                        ),
                                        'default_value' => '',
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                    ),
                                    array (
                                        'key' => 'field_5753362530dd1',
                                        'label' => 'Alinhamento',
                                        'name' => 'alinhamento',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                ),
                                'row_min' => '',
                                'row_limit' => '',
                                'layout' => 'row',
                                'button_label' => 'Novo texto',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Novo grupo',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Novo fundo',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 1,
    ));
    register_field_group(array (
        'id' => 'acf_grupo-de-textos',
        'title' => 'Grupo de textos',
        'fields' => array (
            array (
                'key' => 'field_57529ef9153e6',
                'label' => 'Grupo de textos',
                'name' => 'grupo_de_textos',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_57529f06153e7',
                        'label' => 'Textos',
                        'name' => 'textos',
                        'type' => 'repeater',
                        'column_width' => '',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_57529f0e153e8',
                                'label' => 'Textos',
                                'name' => 'textos',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_575355704563c',
                                        'label' => 'ID',
                                        'name' => 'id',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_575351be247f3',
                                        'label' => 'Texto',
                                        'name' => 'texto',
                                        'type' => 'textarea',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'maxlength' => '',
                                        'rows' => '',
                                        'formatting' => 'br',
                                    ),
                                    array (
                                        'key' => 'field_575351c3247f4',
                                        'label' => 'Sexo',
                                        'name' => 'sexo',
                                        'type' => 'select',
                                        'column_width' => '',
                                        'choices' => array (
                                            'todos' => 'Todos',
                                            'feminino' => 'Apenas para mulheres',
                                            'masculino' => 'Apenas para homens',
                                        ),
                                        'default_value' => '',
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                    ),
                                    array (
                                        'key' => 'field_575351cd247f5',
                                        'label' => 'Pertence',
                                        'name' => 'pertence',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'html',
                                        'maxlength' => '',
                                    ),
                                ),
                                'row_min' => '',
                                'row_limit' => '',
                                'layout' => 'table',
                                'button_label' => 'Add Row',
                            ),
                            array (
                                'key' => 'field_57529f1f153eb',
                                'label' => 'Largura',
                                'name' => 'w',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_57529f22153ec',
                                'label' => 'Altura',
                                'name' => 'h',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_57529f16153e9',
                                'label' => 'Posição X',
                                'name' => 'x',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_57529f1b153ea',
                                'label' => 'Posição Y',
                                'name' => 'y',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_57529f26153ed',
                                'label' => 'tamanho',
                                'name' => 'tamanho',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_57529f30153ef',
                                'label' => 'cor',
                                'name' => 'cor',
                                'type' => 'color_picker',
                                'column_width' => '',
                                'default_value' => '',
                            ),
                            array (
                                'key' => 'field_57529f2c153ee',
                                'label' => 'fonte',
                                'name' => 'fonte',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array (
                                    1 => 'Normal',
                                    2 => 'Bold',
                                    3 => 'Impact',
                                    4 => '8 Bit',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_57529f3a153f0',
                                'label' => 'alinhamento',
                                'name' => 'alinhamento',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'html',
                                'maxlength' => '',
                            ),
                        ),
                        'row_min' => '',
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Novo texto',
                    ),
                    array (
                        'key' => 'field_5753380822c00',
                        'label' => 'Sexo',
                        'name' => 'sexo',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array (
                            'todos' => 'Todos',
                            'feminino' => 'Apenas para mulheres',
                            'masculino' => 'Apenas para homens',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Novo grupo',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 3,
    ));
}

function custom_upload_mimes($existing_mimes = array()) {
    $existing_mimes ['ttf'] = 'application/x-font-ttf';
    return $existing_mimes;
}

function set_post($id) {
    if (isset(get_the_category($id) [0]) && get_the_category($id) [0]->term_id == 1) {
        $row = get_fields($id);


        $app = new Aplicativo ();
        if (!is_array($row ['site'])) {
            $row ['site'] = [
                $row ['site']
            ];
        }

        if (array_search("sotestes.com", $row['site']) !== FALSE) {
            $mais = 70000;
        } else {
            $mais = 50000;
        }
        $row ['titulo'] = get_the_title($id);
        $row ['id'] = (int) get_post($id)->ID + $mais;
        $row ['slug'] = str_replace("__trashed", "", get_post($id)->post_name);

        if($row ['votar'] == null) {
            $avotar = array(
                0 => "nao"
                );
        } else {
            $avotar = $row ['votar'];
        }

        $app->setSites($row ['site']);
        $app->setVotar($avotar);
        $app->setId($row ['id']);
        $app->setTitulo($row ['titulo']);
        $app->setDestaque($row ['destaque']);
        $app->setTexto($row ['texto']);
        $app->setTituloCompartilhamento($row ['tituloCompartilhamento']);
        $app->setTextoCompartilhamento($row ['textoCompartilhamento']);
        $app->setImagemChamada($row ['imagemListagem']);
        $app->setImagemInterna($row ['imagemInterna']);
        $app->setSlug($row ['slug']);
        $app->setEstilo($row ['estilo']);
        $app->setStatus($row ['status']);
        $app->setPrioridade($row ['prioridade']);
        $app->setObs($row ['obs']);


        $dadosObjeto = json_decode(json_encode($row));
        $com = new Fundo ();
        $app->setComponente($com->convert($dadosObjeto));

        foreach ($dadosObjeto->componentes as $linha) {
            $com = new $linha->qual_componente ();
            $app->setComponente($com->convert($linha));
        }
        $com = new GrupoDeTexto ();
        $app->setComponente($com->convert($dadosObjeto));

        if (get_post($id)->post_status == 'publish') {
            $app->salvar();
        } else if (get_post($id)->post_status == 'trash') {
            $app->excluir();
        }
    } else if (get_page($id)->ID == 2) {
        $fields = get_fields($id);

        foreach ($fields ['clientes'] as $cli) {
            $cliente = new Cliente ();
            $cliente->setNome($cli ['nome']);
            $cliente->setIdFacebook($cli ['idAplicativoFacebook']);
            $cliente->setSecretFacebook($cli ['chaveSecretaFacebook']);
            $cliente->setGoogleAnalitycs($cli ['analytics']);
            $cliente->setTitulo($cli ['titulo']);
            $cliente->setPaginaDoFacebook($cli ['paginaFacebook']);
            $cliente->setIdAdnow($cli ['idAdnow']);
            $cliente->setBotaoFixo($cli ['botaoFixo']);

            $cliente->setIdAws($cli ['id_aws']);
            $cliente->setSecretAws($cli ['secret_aws']);

            $cliente->setHostBd($cli ['host_banco_de_dados']);
            $cliente->setUsuarioBd($cli ['usuario_banco_de_dados']);
            $cliente->setSenhaBd($cli ['senha_banco_de_dados']);
            $cliente->setNomeBd($cli ['nome_do_banco_banco_de_dados']);

            $cliente->setS3Url($cli ['s3_url']);
            $cliente->setStorageS3($cli['storage_s3']);
            $cliente->setTema($cli['tema']);
            $cliente->setAmung($cli['amung']);
            $adsenses = array();

            foreach ($fields ['adsensePadrao'] as $adsense) {
                $adsenses [$adsense ['nome']] = $adsense ['codigo'];
            }
            if (count($cli ['adsense']) > 0) {
                foreach ($cli ['adsense'] as $adsense) {
                    $adsenses [$adsense ['nome']] = $adsense ['codigo'];
                }
            }
            
            foreach($cli['paginas'] as $pagina){
                $cliente->setPagina($pagina);
            }

            $cliente->setAdsense($adsenses);
            $cliente->salvarCliente();
        }
    }
    //print_r($_POST);
}

function send($dados) {
    $aplicativo = new Aplicativo ();
    $aplicativo->setDadosFromAdmin($dados);

    $json = json_decode($dados);
    Storage::setAplicativo($aplicativo, $aplicativo->getDadosSerializado(), $json->site);
}

function delete($dados) {
    $aplicativo = new Aplicativo ();
    $aplicativo->setDadosFromAdmin($dados);
    $json = json_decode($dados);
    Storage::deleteAplicativo($aplicativo, $json->site);
}
