<?php

namespace app\controller;

use app\basecontroller;
use app\model\query;
use app\model\abstractdb;

class dashboard extends basecontroller {
    // Index Dashboard
    protected function Index()
    {
        $viewModel = "DATA";
        $this->AdminView($viewModel);
    }

    // Category Controller
    protected function category()
    {
        $viewModel = query::getData('category_product');
        $this->AdminView($viewModel);
    }

    protected function savecategory()
    {
        $arrData = $_POST;
        $viewModel = query::saveData('category_product',$arrData);
        if($viewModel =='SUCCESS') {
             header('Location: category');
        }

    }

    protected function editcategory()
    {
		$id = $_GET['id'];
        $viewModel = query::getWhere('category_product','category_id',$id);
        $this->AdminView($viewModel);
    }

    protected function updatecategory()
    {
        $arrData = $_POST;
        $id = $_GET['id'];
        $viewModel = query::updateData('category_product',$arrData,'category_id',$id);
        print_r($id);
        if($viewModel =='SUCCESS') {
              header('Location: ../category');;
        }
    }

    protected function deletecategory()
    {
		$id = $_GET['id'];
        $viewModel = query::deleteData('category_product','category_id',$id);
        if($viewModel =='SUCCESS') {
              header('Location: ../category');
        }
    }
    // end of category controller

    // Controller Product

    protected function product()
    {
        $viewModel = query::selectProduct();
        $this->AdminView($viewModel);
    }

    protected function saveproduct()
    {
        $arrData = $_POST;
        $viewModel = query::saveDataProduct('product',$arrData);
        if($viewModel =='SUCCESS') {
              header('Location: product');
        }else {
             session_start();
            $_SESSION['message'] = $viewModel;
             header('Location: product');
        }
    }

    protected function deleteproduct()
    {
		$id = $_GET['id'];

        $viewModel = query::deleteProduct('product','product_id',$id);
        if($viewModel =='SUCCESS') {
              header('Location: ../product');
        }
    }

    protected function editproduct()
    {
		$id = $_GET['id'];
        $viewModel = query::getWhereProduct($id);
        $this->AdminView($viewModel);
    }

    protected function addstock()
    {
		$id = $_GET['id'];
        $viewModel = query::getWhereProduct($id);
        $this->AdminView($viewModel);
    }

    protected function updateproduct()
    {
        $arrData = $_POST;
        $id = $_GET['id'];
        $viewModel = query::updateDataProduct($arrData,$id);
        if($viewModel =='SUCCESS') {
              header('Location: ../product');;
        }
    }

    protected function updatestock()
    {
        $id = $_GET['id'];
        $new_supplyer = $_POST['supplyer_id'];
        $new_stock = $_POST['new_stock'];
        $status = $_POST['status'];
        $viewModel = query::updateStock($id,$new_supplyer,$new_stock,$status);
        if($viewModel =='SUCCESS') {
              header('Location: ../product');;
        }
    }
    // end of menu controller

    // Supplyer controller
    protected function supplyer()
    {
        $viewModel = query::getData('supplyer');
        $this->AdminView($viewModel);
    }

    protected function savesupplyer()
    {
        $arrData = $_POST;
        $viewModel = query::saveData('supplyer',$arrData);
        if($viewModel =='SUCCESS') {
             header('Location: supplyer');
        }
    }

    protected function editsupplyer()
    {
		$id = $_GET['id'];
        $viewModel = query::getWhere('supplyer','entity_id',$id);
        $this->AdminView($viewModel);
    }

    protected function updatesupplyer()
    {
        $arrData = $_POST;
        $id = $_GET['id'];
        $viewModel = query::updateData('supplyer',$arrData,'entity_id',$id);
        print_r($id);
        if($viewModel =='SUCCESS') {
              header('Location: ../supplyer');;
        }
    }

    protected function deletesupplyer()
    {
		$id = $_GET['id'];
        $viewModel = query::deleteData('supplyer','entity_id',$id);
        if($viewModel =='SUCCESS') {
              header('Location: ../supplyer');
        }
    }

    // Order controller
    protected function sale()
    {
        $viewModel ='asdas';
        $this->AdminView($viewModel);
    }

    protected function dataquote()
    {
        $viewModel = query::selectQuote();
        // var_dump($viewModel);
        $this->AdminView($viewModel, false);
    }

    protected function savequote()
    {
        $ordernumber = $_POST['order_number'];
        $product_id = $_POST['product_id'];
        $product_qty = $_POST['product_qty'];
        $product_price = $_POST['product_price'];
        $viewModel = query::saveQuote($ordernumber,$product_id, $product_qty, $product_price);
        if($viewModel =='SUCCESS') {
              header('Location: sale');
        }else {
             session_start();
            $_SESSION['message'] = $viewModel;
             header('Location: sale');
        }
    }

    protected function deleteQuote()
    {
		$id = $_GET['id'];
        $viewModel = query::deleteQuote($id);
        if($viewModel =='SUCCESS') {
              header('Location: ../sale');
        }
    }

    protected function saveorder()
    {
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $total_price = $_POST['total_price'];

        $viewModel = query::saveDetailsOrder($order_id, $product_id, $qty , $price ,$total_price);
        $viewModel = query::stockUpdate($product_id,$qty);
        $viewModel = query::saveOrder($order_id);
        $viewModel = query::deleteQuoteTemp($order_id);

        header('Location: ordersuccess/'.$order_id);
    }

    protected function ordersuccess()
    {
        $id = $_GET['id'];
        $viewModel = query::orderSuccess($id);
        $this->AdminView($viewModel);

    }

    protected function dayreport()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }
    protected function buyreportbyday()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }
    protected function buyreportbymonth()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }
    protected function buyreportbyyear()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }
    protected function monthreport()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }

    protected function yearreport()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);

    }

    protected function supplyerreport()
    {
        $viewModel = "Report";
        $this->AdminView($viewModel);
    }

    protected function reportstock()
    {
        $viewModel = query::reportstock();
        $this->AdminView($viewModel);

    }

    protected function findreportbyday()
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $viewModel = query::findbyday($from,$to);
        $this->AdminView($viewModel);
    }
    protected function findbuybyday()
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $viewModel = query::findbuybyday($from,$to);
        $this->AdminView($viewModel);
    }
    protected function findbuybymonth()
    {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $viewModel = query::findbuybymonth($month,$year);
        $this->AdminView($viewModel);
    }
    protected function findreportbymonth()
    {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $viewModel = query::findbymonth($month,$year);
        $this->AdminView($viewModel);

    }
    protected function findbuybyyear()
    {
        $year = $_POST['year'];
        $viewModel = query::findbuybyyear($year);
        $this->AdminView($viewModel);

    }

    protected function findreportbyyear()
    {
        $year = $_POST['year'];
        $viewModel = query::findbyyear($year);
        $this->AdminView($viewModel);
    }

    protected function findreportsupplyer()
    {
        $supplyer = $_POST['supplyer'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $viewModel = query::findreportsupllyer($supplyer,$month,$year);
        $this->AdminView($viewModel);

    }

    protected function adduser()
    {
        $viewModel = "User";
        $this->AdminView($viewModel);
    }

    protected function registeruser()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $viewModel = query::saveUser($username,$password, $email, $firstname,$lastname,$role);
    }

    protected function logout()
    {
        session_start();
        session_destroy();
        header("location:../");
    }

}
