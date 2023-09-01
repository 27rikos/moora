<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bobot Kriteria</title>
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bobot.css">
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
                <h4><i class="fa-solid fa-dumbbell fa-lg"></i>&nbsp;Bobot</h4>
                <div class="card mt-5 shadow">
                    <div class="scroll mt-4 mb-3 ms-4 me-2">
                        <table class="table text-center table-borderless">
                            <?php
                            include("koneksi.php");
                            $sql=mysqli_query($conn,"select * from bobot");
                            while($data=$sql->fetch_assoc()){ 
                            ?>
                            <thead>
                                <tr>
                                    <td>W1</td>
                                    <td><?=$data['w1']?></td>
                                </tr>
                                <tr>
                                    <td>W2</td>
                                    <td><?=$data['w2']?></td>
                                </tr>
                                <tr>
                                    <td>W3</td>
                                    <td><?=$data['w3']?></td>
                                </tr>
                                <tr>
                                    <td>W4</td>
                                    <td><?=$data['w4']?></td>
                                </tr>
                                <tr>
                                    <td>W5</td>
                                    <td><?=$data['w5']?></td>
                                </tr>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#edit<?=$data['id_bobot']?>">
                                    Edit Bobot
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit<?=$data['id_bobot']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Bobot</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="id"
                                                                value="<?=$data['id_bobot']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="w1"
                                                                value="<?=$data['w1']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="w2"
                                                                value="<?=$data['w2']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="w3"
                                                                value="<?=$data['w3']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="w4"
                                                                value="<?=$data['w4']?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="w5"
                                                                value="<?=$data['w5']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning" name="simpan">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            }
                                ?>
                            </thead>
                        </table>
                    </div>
                </div>
                <?php 
                include("koneksi.php");
                if(isset($_POST['simpan'])){
                    $id=$_POST['id'];
                    $w1=$_POST['w1'];
                    $w2=$_POST['w2'];
                    $w3=$_POST['w3'];
                    $w4=$_POST['w4'];
                    $w5=$_POST['w5'];
                    $sql=mysqli_query($conn,"update bobot set w1='$w1',w2='$w2',w3='$w3',w4='$w4',w5='$w5' where id_bobot='$id'");
                    if($sql==true){
                        echo " <meta http-equiv='refresh' content='0.1' url=?page=data>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>