<?php
    require 'config.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $hapus =mysqli_query($db, "DELETE FROM resep WHERE id_resep='$id'");

        if($hapus) {
            header("Location:resep-R.php");
        }
    }
?>