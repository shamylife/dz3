<?php

class Controller_Add extends Controller
{
    function action_index($argument = null)
    {
        $this->view->generate('add_view.php', 'template_view.php');
    }

    function action_create()
    {
        $dir = 'application/files/';
        $error = false;
        $filename = iconv("UTF-8", "cp1251", strip_tags($_POST['name']));
        $content = $_POST['content'];

        if (!$error) {
            if (empty($filename)) {
                $error = true;
                $alert = 'danger';
                $message = "Укажите имя файла!";
            }
        }
        
        if (!$error) {
            if (!fnmatch('*.txt', $filename)) {
                $filename .= '.txt';
            }
        }

        if (!$error) {
            if (file_exists($dir . $filename)) {
                $error = true;
                $alert = 'danger';
                $message = "Файл с таким именем существует. Укажите другое имя.";
            }
        }

        if (!$error) {
            if (empty($content)) {
                $error = true;
                $alert = 'danger';
                $message = "Файл пуст! Напишите что нибудь";
            }
        }

        if (!$error) {
            if (file_put_contents($dir . $filename, $content)) {
                $message = "Файл успешно создан!";
                $alert = 'success';
            } else {
                $error = true;
                $message = "Файл не создан";
                $alert = 'danger';
            }
        }

        $data = ['filename' => $filename,
                 'content'  => $content,
                 'error'    => $error,
                 'alert'    => $alert,
                 'message'  => $message];
        $this->view->generate('show_view.php', 'template_view.php', $data);
    }
}
