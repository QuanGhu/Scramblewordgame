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
        if(isset($_SESSION['score'])) {
            $viewModel = "DATA";
            $this->HomeView($viewModel);
        } else {
            $_SESSION['score'] = 0;
            $viewModel = $_SESSION['score'];
            $this->HomeView($viewModel);
        }

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

    protected function stop()
    {
        session_start();
        $player = $_SESSION['player_name'];
        $score = $_SESSION['score'];
        $viewModel = query::saveGame($player,$score);
        session_destroy();
        header('Location: ../');
    }

    protected function doLogin()
    {
        $user = $_POST['username'];
        $pass = $_POST['passwd'];
        $viewModel = query::login($user,$pass);
        if($viewModel !='fail') {
            echo json_encode(array('result'=>'true'));
        } else {
            echo json_encode(array('result'=>'false'));
        }
    }
}
