<?php

namespace App;

use \PDO;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'toor', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=dossierpro;charset=utf8', 'root', 'toor');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;
        }

        return $this->pdo;
    }

    // ...
    public function query($statement, $class_name = null, $one = false, $params = [])
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params);

        if ($class_name === null) {
            // Utiliser un tableau associatif si aucune classe n'est spécifiée
            if ($one) {
                $data = $req->fetch(PDO::FETCH_ASSOC);
            } else {
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            // Utiliser la classe spécifiée pour le mapping
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            if ($one) {
                $data = $req->fetch();
            } else {
                $data = $req->fetchAll();
            }
        }

        return $data;
    }


    public function createArticle($titre, $contenu)
    {
        $statement = 'INSERT INTO articles (titre, contenu, date) VALUES (:titre, :contenu, NOW())';
        $attributes = array(':titre' => $titre, ':contenu' => $contenu);
        return $this->prepare($statement, $attributes, 'App\Model\Article');
    }

    public function getAllArticles()
    {
        $statement = 'SELECT * FROM articles';
        return $this->query($statement, 'App\Model\Article');
    }





    public function prepare($statement, $attributes, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }
}
