<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>
<body class="bg-light">

    <!-- Login Form Container -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form action="proses_login.php" method="POST">
                <!-- Username Field -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username Anda" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <!-- Additional Links -->
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="register.php" class="text-primary">Daftar di sini</a></p>
            </div>
        </div>
    </div>

</body>
</html>
