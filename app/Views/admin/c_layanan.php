<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Uplod Layanan
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url(); ?>/layanan/save" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <textarea class="form-control" id="nama" name="nama" rows="3"><?= old('nama'); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"><?= old('desc'); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="Upload" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection('content'); ?>