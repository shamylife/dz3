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
        $filename  = urldecode($argument);
        $content   = nl2br(file_get_contents($dir.$filename));

        $data      = ['filename' => $filename, 'content' => $content];
        $this->view->generate('show_view.php', 'template_view.php', $data);
    }
}
