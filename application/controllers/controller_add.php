<?php

class Controller_Add extends Controller
{
    function action_index()
    {
        $this->view->generate('add_view.php', 'template_view.php');
    }

    public function action_create($argument = null)
    {
        $dir = 'application/files/';
        $content = nl2br(file_get_contents($dir.$argument));

        $data = ['argument' => $argument, 'content' => $content];
        $this->view->generate('show_view.php', 'template_view.php', $data);
    }
}
