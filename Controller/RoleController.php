<?php


class RoleController
{
    /**
     * Return result of data of role table
     * @return array
     */
    public function getRole(): array {
        return ObjectController::get("SELECT * FROM role", Role::class);
    }

    /**
     * Return one data of role table
     * @param $id
     * @return object
     */
    public function searchRole($id): object {
        return ObjectController::search("SELECT * FROM role WHERE id = $id LIMIT 1", Role::class);
    }

    /**
     * Add a role in table role
     * @param $data
     */
    public function addRole($data) {
        ObjectController::add("INSERT INTO role VALUES ($data)");
    }

    /**
     * Delete a role in table role
     * @param $id
     */
    public function deleteRole($id) {
        ObjectController::delete("DELETE FROM role WHERE id = $id)");
    }
}