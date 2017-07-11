<?php

namespace app;

abstract class basecontroller {
    protected $urlParams;
    protected $action;

    public function __construct($action, $urlParams) {
        $this->action = $action;
        $this->urlParams = $urlParams;
    }

    public function ExecuteAction() {
        return $this->{$this->action}();
    }

    protected function HomeView($viewModel, $fullView = true) {
        $classData = explode("\\", get_class($this));
        $className = end($classData);

        $content = __DIR__ .
               "/Views/" .
               $className . "/" .
               $this->action . ".php";

        if ($fullView) {
            require __DIR__ ."/Views/Home/template.php";
        } else {
            require $content;
        }
    }
    protected function AdminView($viewModel, $fullView = true) {
        $classData = explode("\\", get_class($this));
        $className = end($classData);

        $content = __DIR__ .
               "/Views/Admin/" .
               $className . "/" .
               $this->action . ".php";

        if ($fullView) {
            require __DIR__ . "/Views/Admin/template.php";
        } else {
            require $content;
        }
    }

    // protected function ajaxView()
}
