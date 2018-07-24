<?php 

require 'Config.php';



 session_start();

if (isset($_SESSION['alert'])) {
    session_destroy();
}




// cek apakah tombol sudah ditekan atau belum

if(isset($_POST["submit"])){


//  cek apakah data berhasil di tambahkan
if (tambah($_POST) > 0 ) {

    $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Berhasil!</strong> Data Berhasil ditambahkan.
            </div>';
            header('location: Tambah_pasien.php');
} else {
    $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Gagal!</strong> Data Tidak Berhasil Ditambahkan.
            </div>';
            header('location: Tambah_pasien.php');
}
   
    
    
}



// cek apakah data berhasil ditambahkan atau tidak
/* if (mysqli_affected_rows($conn) == 0 ) {
    $alert = '';

} else if (mysqli_affected_rows($conn) > 0 ) {

    $_SESSION['alert'] = '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Berhasil!</strong> Data Berhasil ditambahkan.
            </div>';

            header('location: Tambah_pasien.php');
} else {
    $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Gagal!</strong> Data Tidak Berhasil Ditambahkan.
            </div>';
            header('location: Tambah_pasien.php');
} */



 
            
            

 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EAZY HEATLH APP</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

    <!-- Navbar Bang -->
    <nav class="navbar navbar-expand-sm r-green mb-0 ">
        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-outline-light ml-3 mr-2">
            <i class="fas fa-bars r-btn-menu"></i>
        </button>
        Menu Utama
    </nav>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Eazy Health POS</h4>
                <strong>EZ</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">
                        <i class="fas fa-chart-bar"></i>
                        Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="#ObatMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fas fa-tablets"></i>
                        Master Obat
                    </a>
                    <ul class="collapse list-unstyled" id="ObatMenu">
                        <li>
                            <a href="#"><i class="fas fa-list"></i>Daftar Obat</a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-plus-square"></i>Tambah Jenis Obat</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-filter"></i>Tambah Jenis Obat</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#PasienMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user"></i>
                        Master Pasien
                    </a>
                    <ul class="collapse list-unstyled" id="PasienMenu">
                        <li>
                             <a href="daftar_pasien.php"><i class="fas fa-list"></i>Daftar Pasien</a>
                        </li>
                        <li>
                            <a href="#"><i class="far fa-plus-square"></i>Tambah Pasien</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Dokter
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#"><i class="fas fa-list"></i>Daftar Dokter</a>
                        </li>
                         <li>
                            <a href="#"><i class="far fa-plus-square"></i>Tambah Dokter</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#adminMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-cog"></i>
                        Pengaturan
                    </a>
                    <ul class="collapse list-unstyled" id="adminMenu">
                        <li>
                            <a href="Admin.php"><i class="fas fa-users-cog"></i>User Admin</a>
                        </li>
                         <li>
                            <a href="#"><i class="far fa-plus-square"></i>Aplikasi</a>
                        </li>
                    </ul>
                </li>
                
                
            </ul>    
        </nav>

        <!-- Page Content  -->
        <div id="content">


            <div class="container">                   
                    <?php  if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert']; 
                    }
                    ?>
                    <!-- Judul -->
                    <h5>Tambah Pasien</h5>


                     <div class="card">


                        <div class="card-body">
                             <form action="Tambah_pasien.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                  <label for="namapasien">Nama Pasien : </label>
                                  <input type="text" class="form-control" id="namapasien" name="nama_pasien" placeholder="Masukkan nama pasien" required>
                                </div>

                                <div class="form-group">
                                  <label for="umurpasien">Umur Pasien : </label>
                                  <input type="number" class="form-control" id="umurpasien" name="umur_pasien" placeholder="Masukkan umur pasien" required>
                                </div>

                                <div class="form-group">
                                  <label for="gender">Jenis Kelamin : </label>
                                  <select class="form-control" id="gender" name="jenis_kelamin" required>
                                    <option>Laki -laki </option>
                                    <option>Perempuan </option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="notlppasien">Nomor Telepon / Handphone : </label>
                                    <input type="number" name="no_telepon" id="notlppasien" class="form-control" placeholder="Masukkan Nomer Telepon / Handphone Pasien" required>
                                </div>

                                <div class="form-group">
                                    <label for="alamatpasien">Alamat : </label>
                                    <textarea type="text" name="alamat" id="alamatpasien" class="form-control" placeholder="Alamat" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo : </label>
                                    <input type="file" name="photo" id="photo" class="form-control" placeholder=" Masukkan Photo Anda" required></textarea>
                                </div>

                                <button type="submit" name="submit" class="btn btn-success float-right"><i class="fas fa-save mr-2"> </i>Simpan</button>
                              </form>
                        </div>


                     </div>

                </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>