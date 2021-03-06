<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Kegiatan</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('kegiatan/update/' . $kegiatan->id_kegiatan) ?>" enctype="multipart/form-data" accept-charset="utf-8">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $kegiatan->id_kegiatan; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $kegiatan->nama; ?>">
                </div>
                <div class="form-group">
                    <label for="video">Detail Video</label>
                    <br><br>
  <iframe class="embed-responsive-item" src="<?= $kegiatan->video; ?>" allowfullscreen></iframe>
                </div>
                <div class="form-group">
                    <label for="video">Link Video</label>
                    <input type="text" class="form-control" id="video" name="video" >
                </div>
                
                    <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $kegiatan->deskripsi; ?>">
                </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Update" />
                    </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    $( function() {
      flatpickr("#date", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
      });
    });
</script>
<?= $this->endSection('content'); ?>