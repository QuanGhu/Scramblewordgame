<?php

namespace app\controller;

use app\basecontroller;
use app\model\query;

class dashboard extends basecontroller {


    protected function Index()
    {
        $viewModel = "DATA";
        $this->AdminView($viewModel);
    }

    protected function word()
    {
        // $viewModel = query::getData('category_product');
        $viewModel = "DATA";
        $this->AdminView($viewModel);

    }
    protected function admin()
    {
        // $viewModel = query::getData('category_product');
        $viewModel = "DATA";
        $this->AdminView($viewModel);

    }

    protected function getWord()
    {
        $viewModel = query::getDataWord();
        return $viewModel;
    }

    protected function getAdmin()
    {
        $viewModel = query::getDataAdmin();
        return $viewModel;
    }

    protected function saveData()
    {
        $list = $_POST['list'];
        $viewModel = query::saveDataWord('word',$list);
        $abc = array();
        if($viewModel =='success') {
            echo json_encode(array('result'=>'true'));
        } elseif($viewModel =='duplicate') {
            echo json_encode(array('result'=>'duplicate'));
        } else {
            echo json_encode(array('result'=>'false'));
        }
    }

    protected function saveAdmin()
    {
        $user = $_POST['username'];
        $pass = $_POST['passwd'];
        $viewModel = query::saveDataAdmin('admin_user',$user,$pass);
        $abc = array();
        if($viewModel =='success') {
            echo json_encode(array('result'=>'true'));
        } elseif($viewModel =='duplicate') {
            echo json_encode(array('result'=>'duplicate'));
        } else {
            echo json_encode(array('result'=>$viewModel));
        }
    }

    protected function deleteData()
    {
        $id = $_GET['id'];
        $viewModel = query::deleteData('word','id',$id);
        if($viewModel =='success') {
            echo json_encode(array('result'=>'true'));
        } else {
            echo json_encode(array('result'=>'false'));
        }
    }

    protected function edit()
    {
        $id = $_GET['id'];
        $viewModel = query::getWordById('word','id',$id);
        $this->AdminView($viewModel);
    }

    protected function updateData()
    {
        $id = $_POST['id'];
        $arrData = $_POST;
        $viewModel = query::updateData('word',$arrData,'id',$id);
        if($viewModel =='success') {
            echo json_encode(array('result'=>'true'));
        } else {
            echo json_encode(array('result'=>'false'));
        }
    }

    protected function score()
    {
        $viewModel = "DATA";
        $this->AdminView($viewModel);
    }

    protected function getSavedScore()
    {
        $viewModel = query::getDataScore();
        return $viewModel;
    }

    protected function logout()
    {
        session_start();
        session_destroy();
        return header('Location: ../');
    }

}
