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
     * Return a document for item select
     * @param $item
     * @return array
     */
    public function getDocumentType($item): array {
        return ObjectController::get("
                                        SELECT * FROM document  
                                            INNER JOIN item ON item.id = document.item_fk
                                        WHERE item.name = '$item'
                                        ", Document::class);
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
        ObjectController::delete("DELETE FROM document WHERE id = $id");
    }

    /**
     * Update a category in table document
     * @param $title
     * @param $value
     * @param $id
     */
    public function updateDocument($title, $value, $id) {
        ObjectController::update("UPDATE document SET $title = '$value' WHERE id = '$id'");
    }

    /**
     * Search a Document in table document
     * @param $id
     * @return object
     */
    public function searchDocument($id): object {
        return ObjectController::search("SELECT * FROM document WHERE id = '$id' LIMIT 1", Document::class);
    }

    public function catDocument($id): array {
        return ObjectController::get("SELECT * FROM document WHERE document.category_fk = '$id'", Document::class);
    }
}