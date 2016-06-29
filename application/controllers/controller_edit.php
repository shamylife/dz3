<?php

class Controller_Edit extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('edit_view.php', 'template_view.php');
    }
}
