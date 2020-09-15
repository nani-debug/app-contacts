<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=db", "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}
/**
 * retourne l'objet de connexion de la base de données
 */
function getDb()
{
    global $bdd;
    if ($bdd) return $bdd;
}
