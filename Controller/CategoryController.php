<?php

class CategoryController
{
    /**
     * Return result of data of category table
     * @return array
     */
    public function getCategory(): array {
        return ObjectController::get("SELECT * FROM category", Category::class);
    }

    /**
     * Return one data of category table
     * @param $id
     * @return object
     */
    public function searchCategory($id): object {
        return ObjectController::search("SELECT * FROM category WHERE id = $id LIMIT 1", Category::class);
    }

    /**
     * Add a Category in table category
     * @param $data
     * @return false|int
     */
    public function addCategory($data) {
        return ObjectController::add("INSERT INTO category VALUES ($data)");
    }

    /**
     * Delete a category in table category
     * @param $id
     */
    public function deleteCategory($id) {
        return ObjectController::delete("DELETE FROM category WHERE id = $id");
    }

    /**
     * Update a category in table category
     * @param $title
     * @param $value
     * @param $id
     */
    public function updateCategory($title, $value, $id) {
        return ObjectController::update("UPDATE category SET $title = '$value' WHERE id = '$id'");
    }
}