<?php
    require "inc.koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=about">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=contact">Program</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=workshoplist">Akun</a>
            </li>
        </ul>
        <!-- <nav>
            <a href=""></a>
        </nav> -->
    </header>
    <main>
        <?php
            $pages_dir = 'pages';
            if(!empty($_GET['p'])){
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);

                $p = $_GET['p'];
                if(in_array($p. '.php', $pages)){
                    include($pages_dir. '/' .$p. '.php');
                }else{
                    echo 'Halaman tidak ditemukan!:(';   
                }
            }else{
                include($pages_dir. '/beranda.php');
            }
            // if(isset($_GET['p'])){
            //     $page = $_GET['p'];
            //     switch($page){
            //         case 'home':
            //             include "pages/home.php";
            //             break;
            //         case 'about':
            //             include "pages/about.php";
            //             break;
            //         case 'contact':
            //             include "pages/contact.php";
            //             break;
            //         default:
            //         echo "<h1>Halaman tidak ditemukan</h3>";
            //         break;
            //     }
            // }else{
            //     include "pages/home.php";
            // }
        ?>
    </main>
    <footer>
        <p>Copyright 2024 Kinanty</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>