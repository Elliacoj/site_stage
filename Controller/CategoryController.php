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
     */
    public function addCategory($data) {
        ObjectController::add("INSERT INTO category VALUES ($data)");
    }

    /**
     * Delete a category in table category
     * @param $id
     */
    public function deleteCategory($id) {
        ObjectController::delete("DELETE FROM category WHERE id = $id");
    }

    public function updateCategory($title, $value, $id) {
        ObjectController::update("UPDATE category SET $title = '$value' WHERE id = '$id'");
    }
}