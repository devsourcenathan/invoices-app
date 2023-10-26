<?php


class Indexs
{
    public static function create($value, $counter_id)
    {
        return Database::query("INSERT INTO indexs (value, counter_id) VALUES (?, ?)", [$value, $counter_id]);
    }

    public static function update($id, $value, $counter_id)
    {
        return Database::query("UPDATE indexs SET value = ?, counter_id  = ? WHERE id = ?", [$value, $counter_id, $id]);
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM indexs WHERE id = ?", [$id]);
    }

    public static function read($id)
    {
        return Database::recover(Database::query("SELECT * FROM indexs WHERE id = ?", [$id]));
    }

    public static function readAll()
    {
        return Database::recover(Database::query("SELECT * FROM indexs"), false);
    }

    public static function getAllIndexByIdAccount($counter_id)
    {
        return Database::recover(Database::query("SELECT * FROM indexs WHERE counter_id = ?", [$counter_id]), false);
    }
}
