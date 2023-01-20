<?php
include "connect.php";
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE from `lab_5` where id=$id";
    $conn->query($sql);
}
header('location:/lab_5/index.php?page=list');
exit;
?>