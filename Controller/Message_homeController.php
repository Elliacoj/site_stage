<?php


class Message_homeController
{
    /**
     * Add a message in table message_home
     * @param $data
     * @return false|int
     */
    public function addMessage_home($data) {
        return ObjectController::add("INSERT INTO message_home (text) VALUES ('$data')");
    }

    /**
     * Return one data of message_home table
     * @param $id
     * @return object
     */
    public function getMessage_home(): array {
        return ObjectController::get("SELECT * FROM message_home", Message_home::class);
    }

    /**
     * Delete a message in table message_home
     * @param $id
     */
    public function deleteMessage_home() {
        ObjectController::delete("DELETE FROM message_home");
    }
}