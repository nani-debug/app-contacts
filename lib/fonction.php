<?php
require_once("db.php");

function test(){
    var_dump(getDb());
}

function getUserByEmail($mail){
    $sql="SELECT * FROM listeUtilisateurs WHERE email=?";
    $req=getDb()->prepare($sql);
    $req->execute([$mail]);
    return $req->fetch(PDO::FETCH_OBJ);
}