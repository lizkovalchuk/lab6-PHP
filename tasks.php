<?php
class Tasks
{
    public function getTasks($db){

        $sql = "SELECT * FROM tasks";
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        return $pdostm->fetchAll();
    }

    public function addTask($db, $content){
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tasks ( name )
             VALUES ('$content')";
        $pdostm = $db->prepare($sql);
        $count = $pdostm->execute();
        return $count;
    }

    public function deleteTask($db, $name){
        $sql = "DELETE FROM tasks WHERE name = '$name'" ;
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        return $pdostm->fetchAll();
    }

    public function updateTask($db, $update, $name){
        $sql = "UPDATE tasks SET name = '$update' WHERE name = '$name' " ;
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        return $pdostm->fetchAll();
    }

}