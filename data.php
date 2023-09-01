<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data siswa</title>
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dash.css">
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
                <h4><i class="fa-solid fa-user fa-lg"></i>&nbsp;Data Siswa</h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Tambah Data Siswa
                </button>
                <div class="card mt-2 shadow">
                    <div class="scroll ms-2 me-2 text-center  mb-2 overflow-y-auto">
                        <table class="table table-borderless">
                            <thead class="sticky-top">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nilai Raport</th>
                                    <th>Penghasilan Orangtua</th>
                                    <th>Pekerjaan Orangtua</th>
                                    <th>Jumlah Tanggungan</th>
                                    <th>Pemegang KIP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include("koneksi.php");
                                $no=1;
                                $sql= mysqli_query($conn,"select * from alternatif");
                                while($data=$sql->fetch_assoc()){
                                
                                ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['nilai']?></td>
                                    <td><?=$data['penghasilan']?></td>
                                    <td><?=$data['pekerjaan']?></td>
                                    <td><?=$data['jlh_tanggungan']?></td>
                                    <td><?=$data['kip']?></td>
                                    <td class="aksi">
                                        <!-- Button trigger modal edit -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit<?=$data['NIS']?>">
                                            <i class="fa-solid fa-user-pen fa-lg"></i>
                                        </button>

                                        <!-- Moda edit -->
                                        <div class="modal fade" id="edit<?=$data['NIS']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            Siswa
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="enama"
                                                                        name="NIS" placeholder="NIS"
                                                                        value="<?=$data['NIS']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="enama"
                                                                        name="enama" placeholder="Nama Siswa"
                                                                        value="<?=$data['nama']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <input type="text" class="form-control" id="enilai"
                                                                        name="enilai" placeholder="Nilai Raport"
                                                                        value="<?=$data['nilai']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <input type="text" class="form-control"
                                                                        id="epenghasilan" name="epenghasilan"
                                                                        placeholder="Penghasilan Orangtua"
                                                                        value="<?=$data['penghasilan']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <input type="text" class="form-control"
                                                                        id="epekerjaan" name="epekerjaan"
                                                                        placeholder="Pekerjaan"
                                                                        value="<?=$data['pekerjaan']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <input type="text" class="form-control"
                                                                        id="etanggungan" name="etanggungan"
                                                                        placeholder="Jumlah Tanggungan"
                                                                        value="<?=$data['jlh_tanggungan']?>">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <select name="ekip" class="form-control">
                                                                        <option value="<?=$data['kip']?>">
                                                                            <?=$data['kip']?>
                                                                        </option>
                                                                        <option value="Ya">Ya</option>
                                                                        <option value="Tidak">Tidak</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="edit">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!--ubah nilai kriteria-->

                                        <!-- Button trigger modal ubah nilai -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ubahnilai<?=$data['NIS']?>">
                                            <i class="fa-solid fa-arrow-rotate-right fa-lg"></i>
                                        </button>

                                        <!-- Modal nilai -->
                                        <div class="modal fade" id="ubahnilai<?=$data['NIS']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Nilai
                                                            Alternatif</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for=""> Siswa</label>
                                                                </div>
                                                                <div class="col ">
                                                                    <input type="text" class="form-control w-75"
                                                                        name="nnama" id="nnama"
                                                                        value="<?=$data['nama']?>">
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="<?=$data['nilai']?>">
                                                                    </div>
                                                                    <div class="col">
                                                                        <select name="c1" class="form-control">
                                                                            <option value="">--Pilih--</option>
                                                                            <option value="1">Kurang Sekali</option>
                                                                            <option value="2">Kurang</option>
                                                                            <option value="3">Cukup</option>
                                                                            <option value="4">Baik</option>
                                                                            <option value="5">Baik Sekali</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="<?=$data['penghasilan']?>">
                                                                    </div>
                                                                    <div class="col">
                                                                        <select name="c2" class="form-control">
                                                                            <option value="">--Pilih--</option>
                                                                            <option value="1">Kurang Sekali</option>
                                                                            <option value="2">Kurang</option>
                                                                            <option value="3">Cukup</option>
                                                                            <option value="4">Baik</option>
                                                                            <option value="5">Baik Sekali</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="<?=$data['pekerjaan']?>">
                                                                    </div>
                                                                    <div class="col">
                                                                        <select name="c3" class="form-control">
                                                                            <option value="">--Pilih--</option>
                                                                            <option value="1">Kurang Sekali</option>
                                                                            <option value="2">Kurang</option>
                                                                            <option value="3">Cukup</option>
                                                                            <option value="4">Baik</option>
                                                                            <option value="5">Baik Sekali</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="<?=$data['jlh_tanggungan']?>">
                                                                    </div>
                                                                    <div class="col">
                                                                        <select name="c4" class="form-control">
                                                                            <option value="">--Pilih--</option>
                                                                            <option value="1">Kurang Sekali</option>
                                                                            <option value="2">Kurang</option>
                                                                            <option value="3">Cukup</option>
                                                                            <option value="4">Baik</option>
                                                                            <option value="5">Baik Sekali</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="<?=$data['kip']?>">
                                                                    </div>
                                                                    <div class="col">
                                                                        <select name="c5" class="form-control">
                                                                            <option value="">--Pilih--</option>
                                                                            <option value="1">Kurang </option>
                                                                            <option value="2">Baik</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-warning"
                                                                name="nilai">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="hapus_data.php?id=<?=$data['NIS']?>" class="btn btn-danger"><i
                                                class="fa-solid fa-eraser fa-lg"></i></a>
                                    </td>
                                    <?php 
                                }
                              
                                    ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal insert Data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <label for="nama">Nama Siswa</label>
                            <div class="col">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="row">
                            <label for="nilai">Nilai Raport</label>
                            <div class="col">
                                <input type="text" class="form-control" name="nilai" id="nilai">
                            </div>
                        </div>
                        <div class="row">
                            <label for="penghasilan">Penghasilan Orangtua</label>
                            <div class="col">
                                <input type="text" class="form-control" name="penghasilan" id="penghasilan">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pekerjaan">Pekerjaan Orangtua</label>
                            <div class="col">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                            </div>
                        </div>
                        <div class="row">
                            <label for="tanggungan">Jumlah Tanggungan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="tanggungan" id="tanggungan">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pilih">Penerima KIP</label>
                            <div class="col">
                                <select name="kip" id="pilih" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success" name="simpan_data">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!---tambah data -->
    <?php
    include("koneksi.php");
    if(isset($_POST['simpan_data'])){
        $nama=$_POST['nama'];
        $nilai=$_POST['nilai'];
        $penghasilan=$_POST['penghasilan'];
        $pekerjaan=$_POST['pekerjaan'];
        $tanggungan=$_POST['tanggungan'];
        $kip=$_POST['kip'];

        $sql=mysqli_query($conn,"insert into alternatif (nama,nilai,penghasilan,pekerjaan,jlh_tanggungan,kip)values
        ('$nama','$nilai','$penghasilan','$pekerjaan','$tanggungan','$kip')");
        if($sql==true){
            echo " <meta http-equiv='refresh' content='0.1' url=?page=data>";
        }
    }
    ?>

    <!--edit data-->
    <?php
    include("koneksi.php");

    if(isset($_POST['edit'])){
        $nis=$_POST['NIS'];
        $nama=$_POST['enama'];
        $nilai=$_POST['enilai'];
        $penghasilan=$_POST['epenghasilan'];
        $pekerjaan=$_POST['epekerjaan'];
        $tanggungan=$_POST['etanggungan'];
        $kip=$_POST['ekip'];

        $sql=mysqli_query($conn,"update alternatif set nama='$nama',nilai='$nilai',penghasilan='$penghasilan',pekerjaan='$pekerjaan',jlh_tanggungan='$tanggungan',
        kip='$kip' where NIS='$nis'");
        if($sql==true){
            echo " <meta http-equiv='refresh' content='0.1' url=?page=data>";
        }
    } 
    ?>
    <!--nilai kriteria-->
    <?php
    include("koneksi.php");
    if(isset($_POST['nilai'])){
        $nama=$_POST['nnama'];
        $c1=$_POST['c1'];
        $c2=$_POST['c2'];
        $c3=$_POST['c3'];
        $c4=$_POST['c4'];
        $c5=$_POST['c5'];

        $sql=mysqli_query($conn,"insert into nilai_kriteria(nama,c1,c2,c3,c4,c5)values('$nama','$c1','$c2','$c3','$c4','$c5')");
        if($sql==true){
            echo " <meta http-equiv='refresh' content='0.1' url=?page=data>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>