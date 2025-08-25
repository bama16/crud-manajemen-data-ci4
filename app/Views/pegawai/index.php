<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Data Pegawai</h3>
        <a href="/pegawai/create" class="btn btn-dark">Tambah Data</a>
    </div>
    <div class="pt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <th>No.</th>
                <th>Nama Pegawai</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th>Jabatan</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pegawais) && count($pegawais) > 0) : ?>
                    <?php $no = 1; foreach ($pegawais as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td><?= $row->telepon; ?></td>
                            <td><?= $row->nama_jabatan; ?></td>
                            <td>
                                <a href="/pegawai/edit/<?= $row->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/pegawai/delete/<?= $row->id; ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus pegawai ini?');">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Tidak ada data pegawai.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
