<?php

namespace app;
use PDO;

class DataBase
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = 'password223')
    {

        $dsn = 'mysql:host=' . $config['database']['host'] .
            ';port=' . $config['database']['port'] .
            ';dbname=' . $config['database']['dbname'] .
            ';charset=' . $config['database']['charset'];

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if ($result) {
            return $result;
        } else {
            abort(Response::FORBIDDEN);
        }
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }
}
