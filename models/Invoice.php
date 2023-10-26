<?php


class Invoice
{
    public static function create($amount, $consommation, $status, $counter_id, $id_user)
    {
        Database::query("INSERT INTO invoices (amount, consommation, date,  status, counter_id, user_id) VALUES (?, ?, now(), ?, ?, ?)", [$amount, $consommation, $status, $counter_id, $id_user]);
    }

    public static function changeStatus($id, $status)
    {
        Database::query("UPDATE invoices SET status = ? WHERE id = ?", [$status, $id]);
    }
    public static function update($id, $amount, $consommation, $network, $status)
    {
        Database::query("UPDATE invoices SET amount = ?, consommation = ?, network = ?, status = ? WHERE id = ?", [$amount, $consommation, $network, $status, $id]);
    }

    public static function delete($id)
    {
        Database::query("DELETE FROM invoices WHERE id = ?", [$id]);
    }

    public static function read($id)
    {
        return Database::recover(Database::query("SELECT * FROM invoices WHERE id = ?", [$id]));
    }

    public static function readCaution($id)
    {
        return Database::recover(Database::query("SELECT * FROM invoices WHERE id = ?", [$id]));
    }

    public static function readAll()
    {
        return Database::recover(Database::query("SELECT * FROM invoices"), false);
    }

    public static function getAllByUserId($id)
    {
        return Database::recover(Database::query("SELECT * FROM invoices WHERE user_id = ?", [$id]), false);
    }

    public static function getAllByUserIdAndStatus($id, $status)
    {
        return Database::recover(Database::query("SELECT * FROM invoices WHERE user_id = ? AND status = ?", [$id, $status]), false);
    }
}
