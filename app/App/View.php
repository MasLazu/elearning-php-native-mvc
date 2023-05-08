<?php

namespace CobaMVC\App;

class View
{
    public static function render(string $view, $model=[])
    {
        $model["domain"] = "http://localhost:8080/coba-mvc/public";
        require __DIR__ . "/../View/layout/main/header.php";
        require __DIR__ . "/../View/$view.php";
        require __DIR__ . "/../View/layout/main/footer.php";
    }

    public static function redirect(string $url, string $message=null)
    {
        $url = $message ? "$url?$message" : $url;
        header("Location: http://localhost:8080/coba-mvc/public$url");
        exit();
    }
}