<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Data Jabatan</h3>
        <a href="/jabatan/create" class="btn btn-dark">Tambah Jabatan</a>

    </div>
    <div class="pt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Jabatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jabatans) && count($jabatans) > 0) : ?>
                    <?php $no = 1; foreach ($jabatans as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row->nama_jabatan; ?></td>
                            <td><?= $row->descripsi_jabatan; ?></td>
                            <td>
                                <a href="/jabatan/edit/<?= $row->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/jabatan/delete/<?= $row->id; ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?');">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">Tidak ada data jabatan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?= $this->endSection(); ?>
