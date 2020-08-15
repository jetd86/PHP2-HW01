<?php

namespace App\Models;

class DB
{
    /**
     * @var \PDO
     */
    protected $DBH;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        [$driver, $host, $port, $db_name, $user, $password] = include __DIR__ . '/../../config.php';

        $dsn = $driver . ':host=' . $host . ';port=' . $port . ';dbname=' . $db_name;

        $this->DBH = new \PDO($dsn, $user, $password);
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        return $this->DBH->prepare($sql)->execute($params);
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $params
     * @return array
     */
    public function query(string $sql, string $class, array $params = [])
    {
        $sth = $this->DBH->prepare($sql);
        $sth->execute($params);
        return isset($class) ? $sth->fetchAll(\PDO::FETCH_CLASS, $class) : $sth->fetchAll();
    }

}
