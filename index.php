<?php
    include 'koneksi.php';
    
    session_start();

    // Tambahkan pemeriksaan sesi
      if (!isset($_SESSION['username'])) {
          header("Location: register.php"); // Redirect ke halaman register
          exit();
      }


    $query = "SELECT * FROM tb_reservasi;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
   
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap--->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!---Font Awsome--->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <!---Data Tables--->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript"src="datatables/datatables.js"></script>

    <title> CRUD_Reservasi</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      Reservasi Cafe
    </a>

  </div>
</nav>
     
             <!---spiner start--->
             <div id="loading-spinner" class="text-center" style="display: none;">
               <div class="spinner-border text-primary" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>
               <p>Memuat data...</p>
             </div>



           <script>
             // Simulasi proses loading
             document.addEventListener("DOMContentLoaded", function() {
               const spinner = document.getElementById('loading-spinner');
               const dataTable = document.getElementById('data-table');

               // Tampilkan spinner
               spinner.style.display = 'block';

               // Simulasi waktu load (misalnya 2 detik)
               setTimeout(function() {
                 // Sembunyikan spinner, tampilkan tabel
                 spinner.style.display = 'none';
                 dataTable.style.display = 'block';
               }, 1000); // 300 ms 
             });
           </script>

            <!---spiner end--->
             <!--- Judul--->
            <div class="container">
               <h1 class="mt-3 row">
                 <span class="align middle badge text-bg-warning d-inline">Data Reservasi Ngopi <i class="fa fa-coffee" aria-hidden="true"></i> </span>
               </h1>
        <figure>
          <blockquote class="blockquote">
            <p> Data yang telah di simpan di database.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
             CRUD Reservasi <cite title="Source Title">Cread Read Update Delete</cite>
          </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            Tambah Data
            <i class="fa fa-plus"></i>
        </a>
<!---ALER ADD--->
            <?php
                if(isset($_SESSION['eksekusi'])):
            ?>
           <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
             <symbol id="check-circle-fill" viewBox="0 0 16 16">
               <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
             </symbol>
           </svg>

           <div class="alert alert-success d-flex align-items-center small-alert" role="alert">
             <svg class="bi flex-shrink-0 me-2 small-icon" role="img" aria-label="Success:">
               <use xlink:href="#check-circle-fill"/>
             </svg>
             <div>
            <?php
                echo $_SESSION['eksekusi'];
            ?>
             </div>
           </div>

           <style>
             /* Atur ukuran alert */
             .small-alert {
               font-size: 0.875rem; /* Sesuaikan ukuran font (14px) */
               padding: 0.5rem 1rem; /* Kurangi padding */
             }

             /* Atur ukuran ikon */
             .small-icon {
               width: 1rem; /* Ukuran ikon lebih kecil (16px) */
               height: 1rem; 
             }
           </style>
            <?php
                session_destroy();
                endif;
            ?>
<!---ALER EDIT--->
         <?php
             if(isset($_SESSION['eksekusi1'])):
         ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
          <!-- Simbol icon info-fill -->
          <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </symbol>
        </svg>

        <div class="alert alert-primary d-flex align-items-center small-alert" role="alert">
          <svg class="bi flex-shrink-0 me-2 small-icon" role="img" aria-label="Info:">
            <use xlink:href="#info-fill"/>
          </svg>
          <div>
            <?php
                echo $_SESSION['eksekusi1'];
            ?>
          </div>
        </div>

        <style>
          /* Atur ukuran alert */
          .small-alert {
            font-size: 0.875rem; /* Sesuaikan ukuran font (14px) */
            padding: 0.5rem 1rem; /* Kurangi padding */
          }

          /* Atur ukuran ikon */
          .small-icon {
            width: 1rem; /* Ukuran ikon lebih kecil (16px) */
            height: 1rem; 
          }
        </style>

         <?php
             session_destroy();
             endif;
         ?>
<!---ALER DELETE--->
        <?php
            if(isset($_SESSION['eksekusi2'])):
        ?>
         <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
           <!-- Simbol icon exclamation-triangle-fill -->
           <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
             <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
           </symbol>
         </svg>

         <div class="alert alert-danger d-flex align-items-center small-alert" role="alert">
           <svg class="bi flex-shrink-0 me-2 small-icon" role="img" aria-label="Warning:">
             <use xlink:href="#exclamation-triangle-fill"/>
           </svg>
           <div>
             <?php
                echo $_SESSION['eksekusi2'];
            ?>
           </div>
         </div>

         <style>
           /* Atur ukuran alert */
           .small-alert {
             font-size: 0.875rem; /* Sesuaikan ukuran font (14px) */
             padding: 0.5rem 1rem; /* Kurangi padding */
           }

           /* Atur ukuran ikon */
           .small-icon {
             width: 1rem; /* Ukuran ikon lebih kecil (16px) */
             height: 1rem; 
           }
         </style>
         <?php
             session_destroy();
             endif;
         ?>

          

            <div class="table-responsive">
              <table class="table align-middle table-bordered table-hover table-hover">
               <thead>
                   <tr>
                    <th><center>No.</center></th>
                    <th><center>Costumer</center></th>
                    <th><center>Tanggal Reservasi</center></th>
                    <th><center>Waktu Reservasi</center></th>
                    <th><center>Catatan</center></th>
                    <th><center>Alamat</center></th>
                    <th><center>Aksi</center></th>

                    </tr>
               </thead> 
                 <tbody>
                    <?php
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                   <tr>
                       <td><center>
                            <?php echo ++$no; ?>.</center></td>
                       <td><center>
                            <?php echo $result ['costumer_id']; ?></center></td>
                       <td><center>
                        <?php echo $result ['reservation_date']; ?></center></td>
                       <td><center>
                        <?php echo $result ['reservation_time']; ?></center></td>
                       <td><center>
                        <?php echo $result ['notes']; ?></center></td>
                       <td><center>
                        <?php echo $result ['alamat']; ?></center></td>
                        <td class="text-center">
                            <a href="kelola.php?ubah=<?php echo $result['id']; ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i> Ubah
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                   </tr>
                    <?php
                        }
                    ?>
                 </tbody>
              </table>
            </div>
       </div>
</body>
</html>
