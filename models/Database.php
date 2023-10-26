<?php

class Database
{
    //Data Source Name
    private static $dns = "mysql:host=localhost;dbname=facture_db";
    private static $user = "root";
    private static $password = "root";

    public static $pdo = null;

    //Fonction qui retourne une instance de PDO

    public static function getPDO()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO(self::$dns, self::$user, self::$password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
    //Fonction qui execute une requete SQL avec parametres ou pas et retourne le resultat
    public static function query($sql, $params = null) //
    {
        $req = Database::getPDO()->prepare($sql);
        if ($params != null) {
            $req->execute($params);
        } else {
            $req->execute();
        }
        return $req;
    }
    //Fonction qui permet de recuperer le resultat d'une requette SQL
    public static function recover($req, $one = true)
    {
        $req->setFetchMode(PDO::FETCH_OBJ);
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }
}
