<?php

class ConexionBD{
    //static public function
  public function cBD(){

        $bd = new PDO("mysql:host=localhost;dbname=universidad", "root", "");

        $bd -> exec("set names utf8");

        return $bd;

    }

}