<?php
require_once 'connection.php';

if ($_POST) {

    $func_order = $_POST['func_order'];

    if ($func_order == 1) {
        //Update Starting
        $id = $_POST['id'];
        $status = $_POST['status'];
        $query = $db->prepare("UPDATE mytasks SET
    status = :status
    WHERE id = :id");
        $update = $query->execute(array(
            "status" => $status,
            "id" => $id
        ));
        if ($update) {
            echo "güncelleme başarılı!";
        }
    } else if ($func_order == 2) {
        //New Task Add Starting
        $task = $_POST['task'];

        $query = $db->prepare("INSERT INTO mytasks SET
        name = ?,status = ?");
        $insert = $query->execute(array(
            $task, 1
        ));
        if ($insert) {
            $last_id = $db->lastInsertId();
            print "insert işlemi başarılı!";
        }
    } else if ($func_order == 3) {

        $id = $_POST['id'];

        $query = $db->prepare("DELETE FROM mytasks WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $id
        ));
    }
}
