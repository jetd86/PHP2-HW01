<?php
//Это вспомогательный класс, задача класса Model быть вспомогательным для других
namespace App;

abstract class Model
{
    public static $table = null;
    public $id;


    public function __construct($data = [])
    {
        if (!empty($data)) {
            $props = get_object_vars($this); // передаем исследемый объект через $this
            foreach ($props as $name => $value) {
                $this->$name = $data[$name];
            }
        }

    }

    public static function findById($id)
    {
        $db = new Models\DB();
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $data = $db->query($sql, static::class, [':id' => $id]);

        if (!empty($data)) {
            return reset($data);
        }
        return false;
    }


    //Метод для реализации техники записи Active Record
    public function insert(): void
    {
        $props = get_object_vars($this);
        $fields = [];
        $binds = [];
        foreach ($props as $name => $value) {
            if ($name == 'id') {
                continue;
            }
            $fields[] = $name;
            $binds[] = ":" . $name;
            $data[':' . $name] = $value;
        }

        $sql = "INSERT INTO " . static::$table . " (" . implode(',', $fields) . ")"
            . " VALUES (" . implode(',', $binds) . ")";

        $db = new Models\DB();
        $db->execute($sql, $data);
    }


    public static function findAll()
    {
        $db = new Models\DB();
        return $db->query(
            "SELECT * FROM " . static::$table,
            static::class); //'App\Models\Article'
    }
}