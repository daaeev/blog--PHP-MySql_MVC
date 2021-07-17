<?php

namespace application\lib;

use PDO;

// Сlass for working with db
class DataBaseReader 
{
    protected $db;

    public function __construct()
    {
        $config = require APP_PATH . '/application/config/db.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
    }

    public function getAll($tableName)
    {
        $query = $this->db->query('SELECT * FROM ' . $tableName);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getObjectById($tableName, $id)
    {
        $query = $this->db->prepare('SELECT * FROM ' . $tableName . ' WHERE `id`=:id');
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getObjectByParams($tableName, $params)
    {
        $paramsString = '';
        foreach ($params as $paramName => $param) {
            $paramsString .= ' `' . $paramName . '`' . '=:' . $paramName;
        }
        $query = $this->db->prepare('SELECT * FROM ' . $tableName . ' WHERE' . $paramsString);
        $query->execute($params);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function createObject($tableName, $params)
    {
        $step = 0;
        $tables = '';
        $values = '';
        foreach ($params as $table => $value) {
            if (++$step == 7) {
                $tables .= "$table";
                $values .= ":$table";
            } else {
            $tables .= "$table, ";
            $values .= ":$table, ";
            }
        }
        
        $query = $this->db->prepare("INSERT INTO `$tableName` ($tables) VALUES ($values) ");
        $query->execute($params);
    }

    public function deleteObject($id)
    {
        $this->db->query("DELETE FROM `Articles` WHERE `id`=$id");
    }
}