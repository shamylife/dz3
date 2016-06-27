<?php

class Controller_Download extends Controller
{
    function action_index($argument = null)
    {
        $dir = 'application/files/';

        $filename = urldecode($argument);
        $filename = mb_convert_encoding($filename, "Windows-1251", "UTF-8");

        if (file_exists($dir . $filename)) {
            // Сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт.
            // Если этого не сделать, файл будет читаться в память полностью
            if (ob_get_level()) {
                ob_end_clean();
            }
            // Заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/text-plain');
            header('Content-Disposition: attachment; filename=' . $filename);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($dir . $filename));
            // Читаем файл и отправляем пользователю
            readfile($dir . $filename);
            exit;
        }
    }
}
