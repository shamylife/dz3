<?php

class Controller_Upload extends Controller
{
    function action_index()
    {
        $this->view->generate('upload_view.php', 'template_view.php');
    }
    function action_transfer()
    {
        $dir       = 'application/files/';

        $error     = false;
        
        $file      = $_FILES['uploadfile'];
        $file_mime = $_FILES['uploadfile']['type'];

        if (!$error) {
            if ($file['size'] == 0 && empty($file['name'])) {
                $error = true;
                $alert = 'danger';
                $message = 'Файл не выбран!';
            }
        }

        if (!$error) {
            if ($file_mime != 'text/plain') {
                $error = true;
                $alert = 'danger';
                $message = "Данный тип файла не разрешен для загрузки. Загрузите файл в формате .txt!";
            }
        }

        $filename = mb_convert_encoding($file['name'], "Windows-1251", "UTF-8");

        if (!fnmatch('*.txt', $filename)) {
            $filename .= '.txt';
        }
        if (!$error) {
            if (file_exists($dir . $filename)) {
                $error = true;
                $alert = 'danger';
                $message = "Файл с таким именем существует!";
            }
        }
        if (!$error) {
            if (move_uploaded_file($file['tmp_name'], $dir . $filename)) {
                $alert = 'success';
                $message = 'Файл успешно загружен!';
            } else {
                $error = true;
                $alert = 'danger';
                $message = 'При загрузке файла произошла ошибка!';
            }
        }
        
        $data = ['error' => $error, 'alert' => $alert, 'message' => $message, 'filename' => $filename];
        $this->view->generate('upload_view.php', 'template_view.php', $data);
    }
}
