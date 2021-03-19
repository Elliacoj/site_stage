<?php

class UserController
{
    /**
     * Return result of data of user table
     * @return array
     */
    public function getUser(): array {
        return ObjectController::get("SELECT * FROM user", User::class);
    }

    /**
     * Add a User in table User
     * @param $data
     */
    public function addUser($data) {
        return ObjectController::add("INSERT INTO user VALUES ($data)");
    }

    /**
     * Delete a user in table user
     * @param $id
     */
    public function deleteUser($id) {
        ObjectController::delete("DELETE FROM user WHERE id = $id");
    }

    /**
     * Search a User in table user
     * @param $mail
     * @return object
     */
    public function logUser($mail): object {
        return ObjectController::search("SELECT * FROM user  WHERE mail = '$mail' LIMIT 1", User::class);
    }

    /**
     * Update a user in table user
     * @param $title
     * @param $value
     * @param $id
     */
    public function updateUser($title, $value, $id) {
        ObjectController::update("UPDATE user SET $title = '$value' WHERE id = '$id'");
    }
}