<?php


class Counter
{
    public static function create($counter_number, $old_index, $new_index, $user_id, $network)
    {
        return Database::query("INSERT INTO counter (counter_number, old_index, new_index, user_id, network) VALUES (?, ?, ?,?,?)", [$counter_number, $old_index, $new_index, $user_id, $network]);
    }

    public static function update($id, $value, $counter_number, $old_index, $new_index, $user_id)
    {
        return Database::query("UPDATE counter SET value = ?, counter_number = ?, old_index = ?, new_index = ?, user_id = ? WHERE id = ?", [$value, $counter_number, $old_index, $new_index, $user_id, $id]);
    }

    public static function updateIndex($id, $old_index, $new_index)
    {
        return Database::query("UPDATE counter SET old_index = ?, new_index = ? WHERE id = ?", [$old_index, $new_index, $id]);
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM counter WHERE id = ?", [$id]);
    }

    public static function read($id)
    {
        return Database::recover(Database::query("SELECT * FROM counter WHERE id = ?", [$id]));
    }

    public static function readAll()
    {
        return Database::recover(Database::query("SELECT * FROM counter"), false);
    }
}
