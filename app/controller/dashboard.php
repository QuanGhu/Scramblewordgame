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

    protected function getWord()
    {
        $viewModel = query::getDataWord();
        return $viewModel;
    }

    protected function saveData()
    {
        $arrData = $_POST;
        $viewModel = query::saveData('word',$arrData);
        $abc = array();
        if($viewModel =='success') {
            echo json_encode(array('result'=>'true'));
        } else {
            echo json_encode(array('result'=>'false'));
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

}
