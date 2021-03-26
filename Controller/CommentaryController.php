<?php


class CommentaryController
{
    /**
     * Return result of data of commentary table for a defined document
     * @param $id
     * @return array
     */
    public function getCommentary(): array {
        return ObjectController::get("SELECT * FROM commentary", Commentary::class);
    }

    /**
     * Add a commentary in table commentary
     * @param $data
     * @return false|int
     */
    public function addCommentary($data) {
        return ObjectController::add("INSERT INTO commentary (commentary, user_fk, document_fk) VALUES ($data)");
    }

    /**
     * Delete a commentary in table commentary
     * @param $id
     */
    public function deleteCommentary($id) {
        ObjectController::delete("DELETE FROM commentary WHERE id = $id");
    }
}