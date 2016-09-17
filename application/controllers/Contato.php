<?php

class Contato extends CI_Controller {

    public function index() {
        $this->load->view(Cliente::getCliente()->getTema() . "/header", array(
            "tipo" => "chamada",
            "facebook" => array(
                "url" => "",
                "titulo" => "",
                "descricao" => "",
                "imagem" => ""
            ),
            "titulo" => "Contato - " . Cliente::getCliente()->getTitulo()
        ));
        $this->load->view(Cliente::getCliente()->getTema() . "/contato");
        $this->load->view(Cliente::getCliente()->getTema() . "/footer");
    }

    public function enviar() {
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['assunto']) && isset($_POST['mensagem'])) {

            $this->load->library('email');

            $config['protocol'] = 'mail';

            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_user'] = 'contatoappcool@gmail.com';
            $config['smtp_pass'] = '123cool123';
            $config['smtp_port'] = 587;


            $config['mailtype'] = 'html';

            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);

            $this->email->from('site@appcool.me', 'AppCool Site');
            $this->email->reply_to($_POST['email'], $_POST['nome']);
            $this->email->to('contatoappcool@gmail.com');
            $this->email->subject("{$_POST['assunto']} - Enviado pelo site");


            $html = "<b>Nome: </b>{$_POST['nome']}<br />";
            $html .= "<b>E-mail: </b>{$_POST['email']}<br />";
            $html .= "<b>Assunto: </b>{$_POST['assunto']}<br />";
            $html .= "<b>Mensagem: </b>{$_POST['mensagem']}<br />";



            $this->email->message($html);

            if ($this->email->send()) {
                $sim = "sim";
            } else {
                $sim = "nao";
            }

            return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200)
                            ->set_output(json_encode(array(
                                "sucesso" => $sim
            )));
        }
    }

}
