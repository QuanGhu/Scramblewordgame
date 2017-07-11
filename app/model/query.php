<?php

namespace app\model;

use app\model\abstractdb;

class query extends abstractdb
{


        public static function getWord($tableName)
        {
            session_start();
            if (isset($_SESSION['selectedword']) && isset($_SESSION['shuffledword'])) {
                $data =  $_SESSION['shuffledword'];
                return $data;
            } else {
                $query = "SELECT * FROM ".$tableName. " WHERE level = 1;";
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
}
