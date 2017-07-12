<?php

namespace app\controller;

use app\basecontroller;
use app\model\query;

class home extends basecontroller {
    protected function Index()
    {
        $viewModel = "DATA";
        $this->HomeView($viewModel);
    }
    protected function Game()
    {
        $viewModel = "DATA";
        $this->HomeView($viewModel);
    }

    protected function Submit()
    {
        $data = $_POST['answer'];
        $viewModel = query::checkAnswer($data);
        $abc = array();
        if($viewModel =='Correct') {
            echo json_encode(array('message'=>'true'));
        } else {
            echo json_encode(array('message'=>'false'));
        }
        // var_dump($viewModel);
    }

    protected function getScore()
    {
        $viewModel = query::getScore();
        echo json_encode(array('score'=>$viewModel));
    }

    protected function getWord()
    {
        $viewModel = query::getWord('word');
        echo json_encode(array('word'=>$viewModel));
    }

    protected function login()
    {
        $viewModel = "DATA";
        $this->HomeView($viewModel);
    }

    protected function start()
    {
        $playername = $_POST['playername'];
        $viewModel = query::savePlayer($playername);
        header('Location: game');
    }
}
