<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    ?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SISTEM PENDUKUNG KEPUTUSAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="log_out.php"><i
                                class="fa-solid fa-right-from-bracket fa-lg"></i>&nbsp;Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-1 bg-dark ">
                <ul class="nav flex-column ms-2 mb-4 mt-5">
                    <li class="nav-item">
                        <a class="nav-link active  text-light" href="index.php"><i
                                class="fa-solid fa-house fa-lg"></i></i>&nbsp;Home
                            <hr class="bg-light">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active  text-light" href="data.php"><i
                                class="fa-solid fa-user fa-lg"></i>&nbsp;Data Alternatif
                            <hr class="bg-light">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active  text-light" href="kriteria.php"><i
                                class="fa-solid fa-rotate-right fa-lg"></i>&nbsp;Nilai
                            kriteria
                            <hr class="bg-light">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active  text-light" href="normalisasi.php"><i
                                class="fa-solid fa-chart-simple fa-lg"></i>&nbsp;Normalisasi
                            <hr class="bg-light">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active  text-light" href="bobot.php"><i
                                class="fa-solid fa-dumbbell fa-lg"></i>&nbsp;Bobot
                            <hr class="bg-light">
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-9 mt-3 ms-5 me-3 mb-3">
                <h4><i class="fa-solid fa-house fa-lg"></i></i>&nbsp;Home</h4>
                <div class="card mt-5 shadow">
                    <div class="content mt-3 mb-3 ms-4 me-2">
                        <strong class="mt-3">Selamat Datang Admin</strong>
                        <h4 class="mt-3">Website Sistem Pengambilan keputusan Penerima Beasiswa</h4>
                        <h4>Dengan Menggunkan Metode Moora</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>