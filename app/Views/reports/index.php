<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
    <h1>Laporan Keuangan</h1>
    <div class="d-flex justify-content-between">
        <p></p>
        <a href="/reports/new" class="btn btn-info">Tambah Laporan</a>
    </div>
    <table class="mt-4 table table-stripped">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kas</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Kredit</th>
            <th scope="col">Debit</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Saldo</th>
        </tr>
        <tr>
            <td>1</td>
            <td>10000</td>
            <td>7 September 2021</td>
            <td>-</td>
            <td>10000</td>
            <td>Bensin</td>
            <td>10000</td>
        </tr>
        <tr>
            <td>1</td>
            <td>10000</td>
            <td>7 September 2021</td>
            <td>10000</td>
            <td>-</td>
            <td>Bensin</td>
            <td>10000</td>
        </tr>
    </table>
<?= $this->endSection('content') ?>
