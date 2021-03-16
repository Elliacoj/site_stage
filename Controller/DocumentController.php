<?php


class DocumentController
{
    /**
     * Return result of data of document table
     * @return array
     */
    public function getDocument(): array {
        return ObjectController::get("SELECT * FROM document", Document::class);
    }

    /**
     * Add a document in table document
     * @param $data
     */
    public function addDocument($data) {
        ObjectController::add("INSERT INTO document VALUES ($data)");
    }

    /**
     * Delete a document in table document
     * @param $id
     */
    public function deleteDocument($id) {
        ObjectController::delete("DELETE FROM document WHERE id = $id)");
    }
}