<?php

    require_once __DIR__ . "/AutoLoader.php";

    use Resources\Router;
    use App\Controller;

    $kernel = new Router($_GET);
    $controller = $kernel->getController();
    $controller->ExecuteAction();
