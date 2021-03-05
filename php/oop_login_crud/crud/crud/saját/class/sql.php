<?php

require "database.php";


class SQL extends Database{

    public function __construct(){

        parent::__construct();
    }

    public function show(){

        $con = parent::connect();
        $res = $con->prepare("SELECT * FROM adatok");
        $res->execute();

        $data = $res->fetchAll();

        return $data;
    }


    public function delete($id){

        $con = parent::connect();
        $res = $con->prepare("DELETE FROM adatok WHERE id=?");
        $res->bindParam(1, $id);
        $res->execute();
    }

    public function selected_data($id){

        $con = parent::connect();
        $res = $con->prepare("SELECT username,pwd,email FROM adatok WHERE id=?");
        $res->bindParam(1, $id);
        $res->execute();

        $data = $res->fetchAll();

        return $data;
    }


    public function update($username,$pwd,$email,$id){

        $con = parent::connect();
        $res = $con->prepare("UPDATE adatok SET username=?, pwd=?, email=? WHERE id=?");
        $res->bindParam(1, $username);
        $res->bindParam(2, $pwd);
        $res->bindParam(3, $email);
        $res->bindParam(4, $id);
        $res->execute();


    }
}