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
        $filename  = mb_convert_encoding($_POST['filename'], "Windows-1251", "UTF-8");
 /*       
        if (!file_exists($dir.$filename)) {
            $alert   = true;
            $message = 'Такого файла не существует!';
        } else {
            $content = file_get_contents($dir.$filename);
        }
  */      
        $data = ['filename' => $filename, 'content' => $content, 'alert' => $alert, 'message' => $message];
        $this->view->generate('show_view.php', 'template_view.php', $data);
    }
}
