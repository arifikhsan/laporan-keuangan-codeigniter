<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<h1>Laporan Keuangan</h1>
<div class="d-flex justify-content-between">
    <p></p>
    <a href="/reports/new" class="btn btn-primary">Tambah Laporan</a>
</div>
<?php if (session()->getFlashdata('message')) : ?>
    <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
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
    <?php if (count($reports) <= 0) : ?>
        <tr>
            <td colspan="8" class="text-center">Tidak ada laporan</td>
        </tr>
    <?php endif; ?>
    <?php foreach ($reports as $index => $report) : ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $report->cash ?></td>
            <td><?= date('d M Y', strtotime($report->datetime)) ?></td>
            <td><?= $report->credit ?></td>
            <td><?= $report->debit ?></td>
            <td><?= $report->detail ?></td>
            <td><?= $report->balance ?></td>
            <td>
                <a href="/reports/show/<?= $report->id ?>" class="link-primary">Lihat</a>
                <?php if (count($reports) == $index + 1) : ?>
                    <a href="/reports/edit/<?= $report->id ?>" class="link-info">Edit</a>
                    <a href="/reports/delete/<?= $report->id ?>" class="link-danger">Hapus</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection('content') ?>
