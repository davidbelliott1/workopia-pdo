<?php

class Database
{
    public $conn;

    /**
     * Database constructor for PDO connection
     * 
     * @param array $config
     * 
     */

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};
                port={$config['port']};
                dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                $options
            );
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * 
     * @param string $sql
     * 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($sql, $params = [])
    {



        try {
            $stmt = $this->conn->prepare($sql);

            // bind named params
            foreach ($params as $param => $value) {
                $stmt->bindValue(':' . $param, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed: {$e->getMessage()}, {$e->getCode()}");
        }
    }
}
