<?php

class Controller_Edit extends Controller
{
    protected $pathFilesDirectory = 'application/files/';
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index($argument = null)
    {
        $dir       = 'application/files/';//а для чего она здесь нужна?
        //лучше вынести ее в конфиг или в например хотя бы в свойство класса

        $filename  = urldecode($argument);die($filename);
        $filename  = mb_convert_encoding($filename, "Windows-1251", "UTF-8");

        $output    = mb_convert_encoding($filename, "UTF-8", "Windows-1251");

        $content   = nl2br(file_get_contents($dir.$filename));

        $data = ['filename' => $output,
                 'content' => $content];

        $this->view->generate('edit_view.php', 'template_view.php', $data);
    }

    public function action_change($argument = null)
    {
//        $dir       = 'application/files/';

        $filename  = mb_convert_encoding($_POST['filename'], "Windows-1251", "UTF-8");

        $output    = mb_convert_encoding($filename, "UTF-8", "Windows-1251");

        $content   = htmlspecialchars($_POST['content']);
//а здесь мы можем вызвать наше свойство
        if (file_put_contents($this->pathFilesDirectory . $filename, $content)) {
            $message = "<p>Изменения успешно сохранены в файл <b>$output</b>!</p>";
            $alert = 'success';
        } else {
            $message = "<p>Файл <b>$output</b> не сохранен!</p>";
            $alert = 'danger';
        }

        $data = ['filename' => $output,
                 'content'  => $content,
                 'alert'    => $alert,
                 'message'  => $message];
        $this->view->generate('edit_view.php', 'template_view.php', $data);
    }
}
