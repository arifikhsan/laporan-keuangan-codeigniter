<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center align-self-center">
    <h1>Tambah Laporan</h1>
    <a href="/reports" class="btn btn-secondary">Kembali</a>
</div>
<div class="mt-4">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form action="/reports/create" method="post">
        <?= csrf_field() ?>
        <div class="">
            <label for="cash" class="form-label">Kas</label>
            <input type="number" class="form-control" id="cash" name="cash" value="<?= $report ? $report->balance : 0 ?>" disabled />
            <? if ($report) : ?>
                <input type="hidden" name="cash" value="<?= $report->balance ?>" />
            <? endif ?>
        </div>
        <div class="mt-3">
            <label for="debit" class="form-label">Uang Masuk (Debit)</label>
            <input type="number" class="form-control" id="debit" name="debit" value="0" />
        </div>
        <div class="mt-3">
            <label for="kredit" class="form-label">Uang Keluar (Kredit)</label>
            <input type="number" class="form-control" id="credit" name="credit" value="0" />
        </div>
        <div class="mt-3">
            <label for="detail" class="form-label">Keterangan</label>
            <input class="form-control" id="detail" name="detail" value="" />
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Tambah Laporan</button>
    </form>
</div>
<?= $this->endSection('content') ?>
