<?php

//======================================================================
// * Старайся стилизовать код, чтоб он выглядел более читабельнее
//   знаки = на одном уровне
//   Так же открытие и закрытие скобок на твое усмотрение по мне перенос
//   их на следующие строки читается лучше, кстати ты так сделал в function start
//======================================================================
class Route
{
    protected static $parameter;
    //можно например передать в свойство твой param
    static function start()
    {
// контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name     = 'index';

        $routes          = explode('/', $_SERVER['REQUEST_URI']);

// получаем имя контроллера
        if (!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }

// получаем имя экшена
        if (!empty($routes[2]))
        {
            $action_name     = $routes[2];
        }

// получаем параметры
        if (!empty($routes[3]))
        {
            self::$parameter           = $routes[3];
        }

// добавляем префиксы
        $model_name      = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name     = 'action_' . $action_name;

// подцепляем файл с классом модели (файла модели может и не быть)
        $model_file      = strtolower($model_name) . '.php';
        $model_path      = "application/models/" . $model_file;

        if (file_exists($model_path))
        {
            include "application/models/" . $model_file;
        }

// подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path))
        {
            include "application/controllers/" . $controller_file;

        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404

            Ты вызываешь класс в контексте которого пишешь
            это все лишнее
            */
//            Route::ErrorPage404();
            self::ErrorPage404();
        }

// создаем контроллер
        $controller = new $controller_name;
        $action     = $action_name;

        if (method_exists($controller, $action)) {

// вызываем действие контроллера и передаем параметры, если таковые имеются
            $controller->$action(  self::$parameter );
            //если не поставить по умолчанию null будет синтаксическая ошибка notice
            //неизвестная переменная
        } else {
// здесь также разумнее было бы кинуть исключение
//            Route::ErrorPage404();
            self::ErrorPage404();//Так правильнее
        }
    }

    public function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
