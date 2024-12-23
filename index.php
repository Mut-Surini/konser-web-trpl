<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Utama Manajemen Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            color: #526E48;
            /* background-image: url('./assets/background.jpg'); */
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('./assets/background.jpg');
            background-size: cover;
        }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand" style="background-color: rgba(158, 223, 156, 0.6);">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-light" style="" href="#">Konser-In</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-light fw-bold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    List Menu
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?p=konser">Konser</a></li>
                    <li><a class="dropdown-item" href="index.php?p=pengunjung">Pengunjung</a></li>
                    <li><a class="dropdown-item" href="index.php?p=tiket">Tiket</a></li>
                    <li><a class="dropdown-item" href="index.php?p=pekerja">Pekerja</a></li>
                    <li><a class="dropdown-item" href="index.php?p=penyanyi">Penyanyi</a></li>
                    <li><a class="dropdown-item" href="index.php?p=sponsor">Sponsor</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
      </nav>

      <?php include "ui.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>