<?php
    require 'config.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $hapus = mysqli_query($db, "DELETE FROM request WHERE id_req='$id'");

        if($hapus) {
            header("Location:req-R.php");
        }
    }
?>