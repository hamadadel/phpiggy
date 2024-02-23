<?php
namespace Framework;
use PDO, PDOException;

class Database
{
    public PDO $connection;
    public function __construct(string $driver, array $config, string $user, string $password)
    {
        try {
            $dsn = $driver . ':'.http_build_query($config, arg_separator: ';');
            try {
                $this->connection = new PDO($dsn, $user, $password);
            }catch (PDOException $e) {
                die("unable to connect to database");
            }
        }catch (PDOException $e) {
            die;
        }
    }
}