<?php

class Model_Main extends Model
{
    public function get_data()
    {
        $dir = 'application/files/';
        $files = [];

        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($files, $entry);
                }
            }
            closedir($handle);
        }

        return $files;
    }
}