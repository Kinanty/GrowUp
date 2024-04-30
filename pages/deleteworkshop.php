<?php
    require_once('./class/class.Workshop.php');
    if(isset($_GET['namaworkshop'])){
        $objWorkshop = new Workshop();
        $objWorkshop->namaworkshop = $_GET['namaworkshop'];
        $objWorkshop->DeleteWorkshop();

        echo "<script>alert('$objWorkshop->message'); </script>";
        echo "<script>window.location = 'index.php?p=workshoplist'</script>";
    }else{
        echo '<script>window.history.back()</script>';
    }
?>