<?php
session_start();

/* JIKA SUDAH LOGIN */
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-4">

            <div class="card shadow-lg border-0 rounded-4">

                <!-- HEADER -->
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">

                    <i class="bi bi-person-circle fs-1"></i>

                    <h3 class="mt-2">
                        Login
                    </h3>

                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- ALERT -->
                    <?php if(isset($_SESSION['gagal'])){ ?>

                        <div class="alert alert-danger alert-dismissible fade show">

                            <?= $_SESSION['gagal']; ?>

                            <button 
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>

                        </div>

                    <?php unset($_SESSION['gagal']); } ?>

                    <!-- FORM -->
                    <form method="POST" action="login_proses.php">

                        <!-- EMAIL -->
                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>

                                <input 
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    required
                                >

                            </div>

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>

                                <input 
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid">

                            <button 
                                type="submit"
                                class="btn btn-primary btn-lg"
                            >
                                <i class="bi bi-box-arrow-in-right"></i>
                                Login
                            </button>

                        </div>

                    </form>

                </div>

                <!-- FOOTER -->
                <div class="card-footer text-center bg-white border-0 pb-4">

                    <small class="text-muted">
                        © 2026 My Portfolio
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>