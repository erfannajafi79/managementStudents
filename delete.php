<?php
require_once("./student.php");
$user = new Students();


if( isset($_GET['action']) && $_GET['action'] == "delete")
{
    $id = $_GET['id'];
    if ($user->deleteData($id))
    {
        header("Location:index.php?delete");
    }
}
?>