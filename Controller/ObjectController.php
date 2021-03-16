<?php

class ObjectController {

    /**
     * Return a data list of a table
     * @param $sql
     * @param $class
     * @return array
     */
    public static function get($sql, $class): array {
        $entities = [];
        try {
            $reflexion = new ReflectionClass($class);

            $stmt = DB::getInstance()->prepare($sql);
            $res = $stmt->execute();
            if($res) {
                foreach ($stmt->fetchAll() as $entity_line) {
                    $entity = new $class($entity_line['id']);
                    foreach($entity_line as $key => $value) {
                        $method = "set" . ucfirst($key);

                        if(strpos($key, "_fk")) {
                            $key = substr($key, 0 , strpos($key, "_"));
                            $item = ucfirst($key);
                            $itemController = $item . "Controller";
                            $itemController = new $itemController();
                            $search = "search" . $item;
                            $method = "set". $item;
                            $rid = $itemController->$search($value);
                            if($rid) {
                                $entity->$method($rid);
                            }
                        }
                        elseif($reflexion->hasMethod($method)) {
                            $entity->$method($value);
                        }
                    }
                    $entities[] = $entity;
                }
            }
        }
        catch (ReflectionException $e) {

        }

        return $entities;
    }

    /**
     * Return a data of table
     * @param $sql
     * @param $class
     * @return object
     */
    public static function search($sql, $class): object {
        try {
            $entity = null;
            $reflexion = new ReflectionClass($class);

            $stmt = DB::getInstance()->prepare($sql);
            $res = $stmt->execute();

            if($res) {
                $entity_line = $stmt->fetch();
                $entity = new $class($entity_line['id']);

                foreach($entity_line as $key => $value) {
                    $method = "set" . ucfirst($key);

                    if(strpos($key, "_fk")) {
                        $key = substr($key, 0 , strpos($key, "_"));
                        $item = ucfirst($key);
                        $itemController = $item . "Controller";
                        $itemController = new $itemController();
                        $search = "search" . $item;
                        $method = "set". $item;
                        $rid = $itemController->$search($value);
                        if($rid) {
                            $entity->$method($rid);
                        }
                    }
                    elseif($reflexion->hasMethod($method)) {
                        $entity->$method($value);
                    }
                }
            }
        }
        catch (ReflectionException $e) {}

        return $entity;
    }

    /**
     * Add data in table
     * @param $sql
     */
    public static function add($sql) {
        return DB::getInstance()->exec($sql);
    }

    /**
     * Delete a data in table
     * @param $sql
     */
    public static function delete($sql) {
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
    }
}