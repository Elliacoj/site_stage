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
}