<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<body class="bg-light">

    <!-- Register Form Container -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h2 class="text-center mb-4">Register</h2>
            <form action="proses_register.php" method="POST">
                <!-- Username Field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi password Anda" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Register</button>

                <!-- Jika sudah punya akun -->
                <div class="text-center mt-3">
                    <p>Sudah punya akun? <a href="login.php" class="text-primary">Login di sini</a></p>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
