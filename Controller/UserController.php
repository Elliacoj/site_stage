<?php

class UserController
{
    /**
     * Return result of data of user table
     * @return array
     */
    public function getUser(): array {
        return ObjectController::get("SELECT * FROM user LEFT JOIN role ON role.id = user.role_fk", User::class);
    }

    /**
     * Add a User in table User
     * @param $data
     */
    public function addUser($data) {
        ObjectController::add("INSERT INTO user VALUES ($data)");
    }
}