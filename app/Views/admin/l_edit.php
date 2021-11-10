<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Layanan</h3>
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
            <?php endif; ?><form method="post" action="<?php echo base_url('layanan/edit/');?>" enctype="multipart/form-data" accept-charset="utf-8">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $layanan->id_layanan; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $layanan->desc; ?>">
                </div>
                <div class="col-md-12">
                    <label>Gambar</label><br/>
                    <?php
                        if (!empty($layanan->gambar)) {
                            echo '<img src="'.base_url("/uploads/layanan/$layanan->gambar").'" width="150">';
                        }
                    ?>
                </div>
                
                    <div class="form-group">
                         <input type="file" id="gambar" name="gambar" class="form-control"> 
                    </div>  
                
                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <input type="text" class="form-control" id="desc" name="desc" value="<?= $layanan->desc; ?>">
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