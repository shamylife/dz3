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

        $filename = urldecode($argument);
        $filename = mb_convert_encoding($filename, "Windows-1251", "UTF-8");

        $output   = mb_convert_encoding($filename, "UTF-8", "Windows-1251");


        if (file_exists($dir.$filename)) {
            unlink($dir.$filename);
            $alert   = 'success';
            $message = "Файл <b> $output </b> удален!";
        } else {
            $alert   = 'danger';
            $message = "Файл <b> $output </b> не найден!";
        }

        $data = ['alert' => $alert, 'message' => $message, 'filename' => $filename];
        $this->view->generate('remove_view.php', 'template_view.php', $data);
    }
}

