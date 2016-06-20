<?php

class Controller_Remove extends Controller
{
    function action_index()
    {
        $this->view->generate('remove_view.php', 'template_view.php');
    }
    function action_delete($argument = null)
    {
        $dir = 'application/files/';
        $filename = $argument;

        if (file_exists($dir.$filename)) {
            unlink($dir.$filename);
            $alert = 'success';
            $message = 'Файл удален!';
        } else {
            $alert = 'danger';
            $message = 'Файл не найден!';
        }

        $data = ['alert' => $alert, 'message' => $message, 'filename' => $filename];
        $this->view->generate('remove_view.php', 'template_view.php', $data);
    }
}

