<?php

namespace app\model;

use app\model\abstractdb;

class query extends abstractdb
{

        public static function saveDataWord($tableName,$list)
        {
                $data = strtolower($list);
                $check = self::getDb()->query("SELECT * FROM word WHERE list = '$data'");
                $row = $check->fetch_assoc();
                $available = $row['list'];

                if($data != $available) {
                    try {
                        $query = self::getDb()->query("INSERT INTO $tableName (list) VALUES ('$data')");
                        if($query==true) {
                            return 'success';
                        } else {
                            return self::getDb()->error;
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

                else {
                    return 'duplicate';
                }

        }

        public static function saveDataAdmin($tableName,$user,$pass)
        {
                $username = strtolower($user);
                $password = strtolower($pass);
                $check = self::getDb()->query("SELECT * FROM admin_user WHERE username = '$username'");
                $row = $check->fetch_assoc();
                $available = $row['username'];

                if($username != $available) {
                    try {
                        $passencrpyt = md5($password);
                        $query = self::getDb()->query("INSERT INTO $tableName (username,passwd) VALUES ('$username','$passencrpyt')");
                        if($query==true) {
                            return 'success';
                        } else {
                            return self::getDb()->error;
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

                else {
                    return 'duplicate';
                }

        }

        public static function deleteData($tableName, $primary, $id)
        {
            $query = self::getDb()->query("DELETE FROM $tableName WHERE $primary = '$id'");
            if($query==true) {
                return 'success';
            } else {
                return self::getDb()->error;
            }
        }

        public static function updateData($tableName,$arrData,$primary,$id)
        {
            $query = self::getDb()->query("UPDATE $tableName SET " .self::setFormatUpdate($arrData)." WHERE $primary='$id' ");
            if($query==true) {
                return 'success';
            } else {
                return self::getDb()->error;
            }
        }

        public static function setFormatUpdate($arrData, $strConcat = ", ")
        {
           $strAttribute = "";
           if ($arrData != null)
           {
                 if (is_array($arrData))
                 {
                   $arrResult = array();
                   foreach ($arrData as $key => $value)
                   {
                     $arrResult[] = $key." = '".$value."'";
                   }
                   $strAttribute = implode($strConcat, $arrResult);
                 }
                 else
                   $strAttribute = $arrData;
           }
                return $strAttribute;
        }

        public static function getWordById($tableName, $primary, $id)
        {
            $query = self::getDb()->query("SELECT * FROM $tableName WHERE $primary = '$id'");
            if($query==true) {
                $array = array();
                while($row = $query->fetch_assoc()) {
                    $array = array($row['id'],$row['list']);
                }
                return $array;
            } else {
                return self::getDb()->error;
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
                        '<a class="btn btn-info edit" href="dashboard/edit/'.$row['id'].'">Edit</a>
                         <a data="'.$row['id'].'" class="btn btn-danger delete">Remove</a>
                        '
                    );
                $no++;
                }
                $response = array();
                $response['success'] = true;
                $response['aaData'] = $json;
                echo json_encode($response);
            } else {
                $json = array();
                $no='No Data';
                $json[] = array ($no,'No Data');
                $response = array();
                $response['success'] = true;
                $response['aaData'] = $json;
                echo json_encode($response);
            }
        }

        public static function getDataAdmin()
        {
            $query = "SELECT * FROM admin_user";
            $result = self::getDb()->query($query);

            if($result->num_rows > 0) {
                $json = array();
                $no=1;
                while($row = $result->fetch_assoc()){
                    $json[] = array(
                        $no,
                        $row['username']
                    );
                $no++;
                }
                $response = array();
                $response['success'] = true;
                $response['aaData'] = $json;
                echo json_encode($response);
            } else {
                $json = array();
                $no='No Data';
                $json[] = array ($no,'No Data');
                $response = array();
                $response['success'] = true;
                $response['aaData'] = $json;
                echo json_encode($response);
            }
        }

        public static function savePlayer($playername)
        {
            session_start();
            return $_SESSION['player_name'] = $playername;
        }
}
