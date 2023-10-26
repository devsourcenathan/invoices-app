<?php


class User
{
    public static function create($name, $email, $role, $password)
    {
        return Database::query("INSERT INTO users (name, email, role, password) VALUES (?, ?, ?, ?)", [$name, $email, $role, $password]);
    }

    public static function update($id, $name, $email, $password)
    {
        return Database::query("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?", [$name, $email, $password, $id]);
    }

    public static function delete($id)
    {
        return Database::query("DELETE FROM users WHERE id = ?", [$id]);
    }

    public static function read($id)
    {
        return Database::recover(Database::query("SELECT * FROM users WHERE id = ?", [$id]));
    }

    public static function readAll()
    {
        return Database::recover(Database::query("SELECT * FROM users"), false);
    }

    public static function login($email, $password)
    {
        return Database::recover(Database::query("SELECT * FROM users WHERE email = ? AND password = ?", [$email, $password]));
    }
}
