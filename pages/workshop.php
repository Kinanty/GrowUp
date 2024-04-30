<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once('./class/class.Workshop.php');
        $objWorkshop = new Workshop();
        if(isset($_POST['btnSubmit'])){
            $objWorkshop->namaworkshop = $_POST['namaworkshop'];
            $objWorkshop->deskripsi = $_POST['deskripsi'];
            $objWorkshop->benefit = $_POST['benefit'];

            if(isset($_GET['namaworkshop'])){
                $objWorkshop->namaworkshop = $_GET['namaworkshop'];
                $objWorkshop->UpdateWorkshop();
            }else{
                $objWorkshop->AddWorkshop();
            }
            echo "<script>alert('$objWorkshop->message');</script>";
            if($objWorkshop->hasil){
                echo '<script>window.location = "index.php?p=workshoplist";</script>';
            }else if(isset($_GET['namaworkshop'])){
                $objWorkshop->namaworkshop = $_GET['namaworkshop'];
                $objWorkshop->SelectOneWorkshop();
            }
        }
    ?>
    <h4 class="title"><span class="text"><strong>Workshop</strong></span></h4>
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Workshop</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="namaworkshop" value="<?php echo $objWorkshop->namaworkshop; ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" class="form-control" ssn="deskripsi" name="deskripsi" value="<?php echo $objWorkshop->deskripsi; ?>"></td>
            </tr>
            <tr>
                <td>Benefit</td>
                <td>:</td>
                <td><textarea class="form-control" name="benefit" cols="19" rows="3"><?php echo $objWorkshop->benefit; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                    <a href="index.php?p=employeelist" class="btn btn-warning">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>