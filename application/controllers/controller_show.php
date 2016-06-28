<?php

class Controller_Show extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('show_view.php', 'template_view.php');
    }

    public function action_view($argument = null)
    {
        $dir       = 'application/files/';
        $filename  = mb_convert_encoding($_POST['filename'], "Windows-1251", "UTF-8");

        if (!file_exists($dir.$filename)) {
            $error   = true;
            $message = 'Такого файла не существует!';
        } else {
            $content = file_get_contents($dir.$filename);
        }

        $data = ['filename' => $filename,
                 'content'  => $content,
                 'error'    => $error,
                 'message'  => $message];
        $this->view->generate('show_view.php', 'template_view.php', $data);
    }
}
