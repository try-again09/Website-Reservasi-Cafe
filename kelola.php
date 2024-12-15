<!DOCTYPE html>

<?php
    include 'koneksi.php';

    session_start();


    // Inisialisasi variabel dengan nilai default
    $id = '';
    $costumer_id = '';
    $reservation_date = '';
    $reservation_time = '';
    $notes = '';
    $alamat = '';

    if (isset($_GET['ubah'])) {
        $id = $_GET['ubah'];

        $query = "SELECT * FROM tb_reservasi WHERE id = '$id';";
        $sql = mysqli_query($conn, $query);

        if ($sql && mysqli_num_rows($sql) > 0) {
            $result = mysqli_fetch_assoc($sql);

            $costumer_id = $result['costumer_id'] ?? ''; // Isi dengan string kosong jika null
            $reservation_date = $result['reservation_date'] ?? '';
            $reservation_time = $result['reservation_time'] ?? '';
            $notes = $result['notes'] ?? '';
            $alamat = $result['alamat'] ?? '';
        }
    }
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>CRUD_Reservasi</title>
</head>
<body>
    <nav class="navbar navbar-light bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD - BS5</a>
        </div>
    </nav>   

     <!--- Judul--->
    <div class="container">
       <h1 class="mt-3 row">
         <span class="align middle badge text-bg-warning d-inline">Data Reservasi Ngopi <i class="fa fa-coffee" aria-hidden="true"></i> </span>
       </h1>

    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="mb-3 row">
                <label for="Costumer" class="col-sm-2 col-form-label">Costumer</label>
                <div class="col-sm-10">
                    <input required type="text" name="costumer_id" class="form-control" id="Costumer" placeholder="Ex: 112233" value="<?php echo htmlspecialchars($costumer_id); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Reservation Date" class="col-sm-2 col-form-label">Reservation Date</label>
                <div class="col-sm-10">
                    <input type="date" name="reservation_date" class="form-control" id="Reservation Date" value="<?php echo htmlspecialchars($reservation_date); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Reservation Time" class="col-sm-2 col-form-label">Reservation Time</label>
                <div class="col-sm-10">
                    <input type="time" name="reservation_time" class="form-control" id="Reservation Time" step="1" value="<?php echo htmlspecialchars($reservation_time); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Notes" class="col-sm-2 col-form-label">Notes</label>
                <div class="col-sm-10">
                    <input type="text" name="notes" class="form-control" id="Notes" placeholder="Ex: kursi panjang" value="<?php echo htmlspecialchars($notes); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input required type="text" name="alamat" class="form-control" id="Alamat" placeholder="Ex: jl.rawui" value="<?php echo htmlspecialchars($alamat); ?>">
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col">
                    <?php if (isset($_GET['ubah'])) { ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-check" aria-hidden="true"></i> Simpan Perubahan
                        </button>
                    <?php } else { ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-check" aria-hidden="true"></i> Tambahkan
                        </button>
                    <?php } ?>

                    <a href="index.php" class="btn btn-danger">
                        <i class="fa fa-undo" aria-hidden="true"></i> Batal
                    </a>   
                </div>
            </div>
        </form>
    </div>

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
                            }, 600); 
                          });
                        </script>

</body>
</html>
