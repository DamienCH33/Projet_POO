<?php
class DBConnect
{
    private $host = 'localhost';
    private $dbname = 'address_book';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die("Erreur de connection : " . $error->getMessage());
        }
    }
    public function getPDO()
    {
        return $this->pdo;
    }
}
