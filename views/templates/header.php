<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi KRS - RushB</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            padding-top: 56px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
            display: flex;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        .sidebar {
            width: 250px;
            min-height: calc(100vh - 56px);
            position: fixed;
            top: 56px;
            left: 0;
            padding-top: 20px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .sidebar-sticky {
            position: sticky;
            top: 0;
            height: calc(100vh - 76px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
        .nav-link {
            color: #333;
            font-weight: 500;
        }
        .nav-link.active {
            color: #007bff;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        .alert {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-action {
            margin-right: 5px;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-graduation-cap me-2"></i>
                Sistem Informasi KRS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">