<?php

namespace app\model;

use app\model\abstractdb;

class query extends abstractdb
{

        public static function saveData($tableName,$arrData)
        {
                $strColumns = implode(", ", array_keys($arrData));
                $strValues  = "'" . implode("','", array_values($arrData)). "'";
                try {
                    $query = self::getDB()->query("INSERT INTO $tableName ($strColumns) VALUES ($strValues)");
                    if($query==true) {
                        return 'success';
                    } else {
                        return self::getDB()->error;
                    }
                }
                catch (MySQLDuplicateKeyException $e) {
                    $e->getMessage();
                    $json = array();
                    return json_encode(array('message'=>$e));
                }
                catch (MySQLException $e) {
                    $e->getMessage();
                    $json = array();
                    return json_encode(array('message'=>$e));
                }
                catch (Exception $e) {
                    $e->getMessage();
                    $json = array();
                    return json_encode(array('message'=>$e));
                }
        }

        public static function deleteData($tableName, $primary, $id)
        {
            $query = self::getDB()->query("DELETE FROM $tableName WHERE $primary = '$id'");
            if($query==true) {
                return 'success';
            } else {
                return self::getDB()->error;
            }
        }

        public static function getWord($tableName)
        {
            session_start();
            if (isset($_SESSION['selectedword']) && isset($_SESSION['shuffledword'])) {
                $data =  $_SESSION['shuffledword'];
                return $data;
            } else {
                $query = "SELECT * FROM ".$tableName;
                $result = self::getDb()->query($query);
                $array = array();
                while($row = $result->fetch_assoc()) {
                    $array[] = $row;
                }
                $num = rand(0,$result->num_rows - 1);
                $selectedword = $array[$num]['list'];
                $_SESSION['selectedword'] = $selectedword;
                $shuffledword = str_shuffle($selectedword);
                $_SESSION['shuffledword'] = $shuffledword;
                $data = $_SESSION['shuffledword'];

                return $data;
            }
        }

        public static function checkAnswer($data)
        {
            session_start();
            if ($data == $_SESSION['selectedword']){
                unset($_SESSION['selectedword']);
                unset($_SESSION['shuffledword']);
                self::saveScore('Correct');
                return 'Correct';
            } else {
                self::saveScore('false');
                return 'Wrong';
            }
        }

        public static function saveScore($result)
        {

            if($result=='Correct'){
                $_SESSION['score'] += 1;
            } else {
                $_SESSION['score'] -= 1;
            }
        }

        public static function getScore()
        {
            session_start();
            return $_SESSION['score'];
        }

        public static function getDataWord()
        {
            $query = "SELECT * FROM word";
            $result = self::getDb()->query($query);

            if($result->num_rows > 0) {
                $json = array();
                $no=1;
                while($row = $result->fetch_assoc()){
                    $json[] = array(
                        $no,
                        $row['list'],
                        '<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</a>
                         <a data="'.$row['id'].'" class="btn btn-danger delete">Remove</a>
                        '
                    );
                $no++;
                }
                $response = array();
                $response['success'] = true;
                $response['aaData'] = $json;
                echo json_encode($response);
        }
    }
}
