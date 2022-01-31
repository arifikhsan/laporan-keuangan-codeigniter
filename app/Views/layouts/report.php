<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Laporan Keuangan</title>
</head>

<body class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">CV Apa Saja</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/reports" class="nav-link active" aria-current="page">Laporan Utama</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Keluar</a></li>
        </ul>
    </header>

    <?php $this->renderSection('content') ?>
</body>

</html>
