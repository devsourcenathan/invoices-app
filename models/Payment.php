<?php


class Payment
{
    public static function create($transaction_ID, $invoice_id)
    {
        Database::query("INSERT INTO payments (transaction_ID, invoice_id) VALUES (?, ?)", [$transaction_ID, $invoice_id]);
    }

    public static function delete($id)
    {
        Database::query("DELETE FROM payments WHERE id = ?", [$id]);
    }

    public static function read($id)
    {
        return Database::recover(Database::query("SELECT * FROM payments WHERE id = ?", [$id]));
    }

    public static function readCaution($id)
    {
        return Database::recover(Database::query("SELECT * FROM payments WHERE id = ?", [$id]));
    }

    public static function readAll()
    {
        return Database::recover(Database::query("SELECT * FROM payments"), false);
    }

    public static function getAllByUserId($id)
    {
        return Database::recover(Database::query("SELECT * FROM payments WHERE user_id = ?", [$id]), false);
    }

    public static function getAllByUserIdAndStatus($id, $status)
    {
        return Database::recover(Database::query("SELECT * FROM payments WHERE user_id = ? AND status = ?", [$id, $status]), false);
    }
}
