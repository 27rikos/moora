<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Normalisasi & rank</title>
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/norm.css">
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
                <h4><i class="fa-solid fa-chart-simple fa-lg"></i>&nbsp;Normalisasi</h4>
                <div class="card mt-3 shadow">
                    <div class="scroll mt-3 mb-3 ms-4 me-2 overflow-y-auto">
                        <table class="table text-center table-borderless">
                            <thead class="sticky-top">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nilai Raport</th>
                                    <th>Penghasilan Orangtua</th>
                                    <th>Pekerjaan Orangtua</th>
                                    <th>Jumlah Tanggungan</th>
                                    <th>Pemegang KIP</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //---data C1----//
                                  include ("koneksi.php");
                                $alternatif=array();                             
                                $sql=mysqli_query($conn,"select c1 from nilai_kriteria");
                                while($data=mysqli_fetch_array($sql)){
                                    $alternatif[]=pow($data['c1'],2);
                                }          
                                $jumlah=array_sum($alternatif);
                                $akar=sqrt($jumlah);

                                //end data C1//

                                //---data C2----//
                                $alternatif1=array();                             
                                $sql1=mysqli_query($conn,"select c2 from nilai_kriteria");
                                while($data1=mysqli_fetch_array($sql1)){
                                    $alternatif1[]=pow($data1['c2'],2);
                                }          
                                $jumlah1=array_sum($alternatif1);
                                $akar1=sqrt($jumlah1);
                               

                                //end data C2//

                                 //---data C3----//
                                 $alternatif2=array();                             
                                 $sql2=mysqli_query($conn,"select c3 from nilai_kriteria");
                                 while($data2=mysqli_fetch_array($sql2)){
                                     $alternatif2[]=pow($data2['c3'],2);
                                 }          
                                 $jumlah2=array_sum($alternatif2);
                                 $akar2=sqrt($jumlah2);
                                
                                 //---data C4----//
                                 $alternatif3=array();                             
                                 $sql3=mysqli_query($conn,"select c4 from nilai_kriteria");
                                 while($data3=mysqli_fetch_array($sql3)){
                                     $alternatif3[]=pow($data3['c4'],2);
                                 }          
                                 $jumlah3=array_sum($alternatif3);
                                 $akar3=sqrt($jumlah3);
 
                                 //end data C4//

                                  //---data C4----//
                                  $alternatif4=array();                             
                                  $sql4=mysqli_query($conn,"select c5 from nilai_kriteria");
                                  while($data4=mysqli_fetch_array($sql4)){
                                      $alternatif4[]=pow($data4['c5'],2);
                                  }          
                                  $jumlah4=array_sum($alternatif4);
                                  $akar4=sqrt($jumlah4);
  
                                  //end data C4//
                                  $mm=mysqli_query($conn,"select * from bobot");
                                  $bobot=mysqli_fetch_array($mm);
                                  $w1=$bobot['w1'];
                                  $w2=$bobot['w2'];
                                  $w3=$bobot['w3'];
                                  $w4=$bobot['w4'];
                                  $w5=$bobot['w5'];

                                  

                                $no=1;
                                $query=mysqli_query($conn,"select * from nilai_kriteria");
                                while($dt=mysqli_fetch_array($query)){
                                    
                                 ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$dt['nama']?></td>
                                    <td><?=$data_rank1=number_format($dt['c1']/$akar,3)?></td>
                                    <td><?=$data_rank2=number_format($dt['c2']/$akar1,3)?></td>
                                    <td><?=$data_rank3=number_format($dt['c3']/$akar2,3)?></td>
                                    <td><?=$data_rank4=number_format($dt['c4']/$akar3,3)?></td>
                                    <td><?=$data_rank5=number_format($dt['c5']/$akar4,3)?></td>
                                    <td><?=number_format($data_rank1*$w1+$data_rank3*$w3+$data_rank4*$w4+$data_rank5*$w5-$data_rank2*$w2,3)?>
                                    </td>
                                </tr>

                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
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