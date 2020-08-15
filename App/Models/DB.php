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
     * @param array $data
     * @return bool
     */
    public function execute(string $sql, array $data = [])
    {
        return $this->DBH->prepare($sql)->execute($data);
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return array
     */
    public function query(string $sql, string $class, array $params = [])
    {
        $sth = $this->DBH->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);

//        $ret = [];
//        foreach ($data as $rec) {
//            $r = new $class($rec);
//            $ret[] = $r;
//        }

        return $data;
    }

}
