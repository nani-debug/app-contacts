<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:connexion.php');
    exit();
}
require_once("lib/fonction.php");
