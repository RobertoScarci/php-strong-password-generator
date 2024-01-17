<?php

    function psw($length) {
        $keyspace = "";

        if(empty($_GET["letters"]) && empty($_GET["numbers"]) && empty($_GET["symbols"])) {
            $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        } else {
            if(isset($_GET["letters"])) {
                $keyspace .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if(isset($_GET["numbers"])) {
                $keyspace .= '0123456789';
            }
            if(isset($_GET["symbols"])) {
                $keyspace .= '!@#$%^&*';
            }
        }

        $str = '';
        $max = strlen($keyspace) - 1;

        if($_GET["repeat"]) {
            for ($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
        } else {
            for ($i = 0; $i < $length; $i++) {
                $piece = $keyspace[random_int(0, $max)];
                if(strpos($str, $piece) === false) {
                    $str .= $piece;
                } else {
                    $i--;
                    if(strlen($str) - 1 === $max) {
                        return $str;
                    }
                }
                
            }
        }

        return $str;
    }