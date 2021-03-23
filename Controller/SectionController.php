<?php


class SectionController
{
    /**
     * Return result of data of section table
     * @return array
     */
    public function getSection(): array {
        return ObjectController::get("SELECT * FROM section", Section::class);
    }

    /**
     * Return one data of section table
     * @param $id
     * @return object
     */
    public function searchSection($id): object {
        return ObjectController::search("SELECT * FROM section WHERE id = $id LIMIT 1", Section::class);
    }
}