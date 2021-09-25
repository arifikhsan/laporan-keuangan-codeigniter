<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center align-self-center">
    <h1>Detail Laporan</h1>
    <a href="/reports" class="btn btn-secondary">Kembali</a>
</div>
<table class="table table-stripped mt-4">
    <tr>
        <th>Id</th>
        <td><?= $report->id ?></td>
    </tr>
    <tr>
        <th>Kas</th>
        <td><?= $report->cash ?></td>
    </tr>
    <tr>
        <th>Debit</th>
        <td><?= $report->debit ?></td>
    </tr>
    <tr>
        <th>Kredit</th>
        <td><?= $report->credit ?></td>
    </tr>
    <tr>
        <th>Saldo</th>
        <td><?= $report->balance ?></td>
    </tr>
    <tr>
        <th>Keterangan</th>
        <td><?= $report->detail ?></td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td><?= date('d M Y', strtotime($report->datetime)) ?></td>
    </tr>
</table>
<a href="/reports/edit/<?= $report->id ?>" class="btn btn-primary">Edit</a>
<a href="/reports/delete/<?= $report->id ?>" class="btn btn-danger">Hapus</a>
<?= $this->endSection('content') ?>
