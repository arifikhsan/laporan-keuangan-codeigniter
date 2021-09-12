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
        <th scope="col">Aksi</th>
    </tr>
    <?php foreach ($reports as $index => $report) : ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $report->cash ?></td>
            <td><?= date('d M Y', strtotime($report->datetime)) ?></td>
            <td><?= $report->credit ?></td>
            <td><?= $report->debit ?></td>
            <td><?= $report->detail ?></td>
            <td><?= $report->balance ?></td>
            <td><a href="/reports/delete/<?= $report->id ?>" class="link-danger">Hapus</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection('content') ?>
