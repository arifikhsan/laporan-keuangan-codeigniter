<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Tambah Laporan</title>
</head>

<body class="p-4">
    <div class="d-flex justify-content-between align-items-center align-self-center">
        <h1>Tambah Laporan</h1>
        <a href="/reports" class="btn btn-info">Kembali</a>
    </div>
    <div class="mt-4">
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('message'); ?>
                <button type="button" class="btn btn-danger" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/reports/create') ?>" method="post">
            <?= csrf_field() ?>
            <div class="">
                <label for="cash" class="form-label">Kas</label>
                <input type="number" class="form-control" id="cash" name="cash" value="12" />
            </div>
            <div class="mt-3">
                <label for="debit" class="form-label">Uang Masuk (Debit)</label>
                <input type="number" class="form-control" id="debit" name="debit" value="132" />
            </div>
            <div class="mt-3">
                <label for="kredit" class="form-label">Uang Keluar (Kredit)</label>
                <input type="number" class="form-control" id="credit" name="credit" value="142" />
            </div>
            <div class="mt-3">
                <label for="detail" class="form-label">Keterangan</label>
                <input class="form-control" id="detail" name="detail" value="asfsdf" />
            </div>
            <button type="submit" class="mt-4 btn btn-primary">Tambah Laporan</button>
        </form>
    </div>
</body>

</html>
