<h1>Tasks</h1>



<?php

require_once 'Database.php';
require_once 'tasks.php';

//Creates $content variable went form submitted

if(isset($_POST['add'])) {
    $o = new tasks();
    $content = $_POST['content'];
    $Inserts = $o->addTask(Database::getDb(), $content);

} elseif (isset($_POST['delete'])) {
    $o = new tasks();
    $name = $_POST['del-name'];
    $Deletes = $o->deleteTask(Database::getDb(), $name);
}
 elseif (isset($_POST['updateBtn'])){
    $t = new tasks();
    $name = $_POST['name'];
    $update = $_POST['update'];
    $updates = $t->updateTask(Database::getDb(), $update, $name);
}

//Creates an instance of the tasks class

?>

<table style="border: 1px solid black">
    <thead>
        <th>Task Name</th>
        <th>Status</th>
    </thead>
    <tbody>
    <?php


    $t = new tasks();
    $Texts = $t->getTasks(Database::getDb());

    //Loops through table and lists values

    foreach ($Texts as $t) {
        echo   "<tr>"
             . "<td>" . $t->name . "</td> "
             . "<td>" . $t->status . "</td>"
             . "</tr>";
    }

    ?>
    </tbody>

</table>



<form action="index.php" method="post">
    text:<input type="text" name="content">
    <input type="submit" name="add" value="Add Task">
    <input type="hidden" name="id" value="">
    <br>
    <?php
    $t = new tasks();
    $Read= $t->getTasks(Database::getDb());

    $name = "";
    foreach ($Read as $t){
        $name .= "<option value='$t->name'>" . $t->name . "</option>";
    }
    ?>

    <select name="del-name">
        <?= $name; ?>
    </select>
    <input type="submit" name="delete" value="Delete Task">



    <br>

    <?php

    $t = new tasks();
    $Read= $t->getTasks(Database::getDb());

    $name = "";
    foreach ($Read as $t){
        $name .= "<option value='$t->name'>" . $t->name . "</option>";
    }
    ?>
    <select name="name">
        <?= $name; ?>
    </select>
    update:<input type="text" name="update">
    <input type="submit" name="updateBtn" value="Update Task">

</form>

