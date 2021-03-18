<?php


class ItemController
{
    /**
     * Return result of data of item table
     * @return array
     */
    public function getItem(): array {
        return ObjectController::get("SELECT * FROM item", Item::class);
    }

    /**
     * Return one data of item table
     * @param $id
     * @return object
     */
    public function searchItem($id): object {
        return ObjectController::search("SELECT * FROM item WHERE id = $id LIMIT 1", Item::class);
    }

    /**
     * Add a item in table Item
     * @param $data
     */
    public function addItem($data) {
        ObjectController::add("INSERT INTO item VALUES ($data)");
    }

    /**
     * Delete a item in table item
     * @param $id
     */
    public function deleteItem($id) {
        ObjectController::delete("DELETE FROM item WHERE id = $id");
    }
}