<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Booking</h3>
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
            <form method="post" action="<?= base_url('booking/update/' . $booking->id_booking) ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $booking->nama; ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $booking->telepon; ?>">
                </div>
                <div class="form-group">
                  <label >Tanggal</label>
                  <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $booking->tanggal;; ?>">
              </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    
                    <select id="kategori" name="kategori"  class="form-control" value="<?= $booking->kategori; ?>">
                    <option value='Pengantaran Jenazah Dalam dan Luar Kota' <?= ($booking->kategori == "Pengantaran Jenazah Dalam dan Luar Kota" ? "selected" : ""); ?>>Pengantaran Jenazah Dalam & Luar Kota</option>
                    <option value='Antar Jemput Pasien Dalam dan Luar Kota' <?= ($booking->kategori == "Antar Jemput Pasien Dalam dan Luar Kota" ? "selected" : ""); ?>>Antar Jemput Pasien Dalam & Luar Kota</option>
                    <option value='Pengiriman Jenazah Via Cargo'<?= ($booking->kategori == "Pengiriman Jenazah Via Cargo" ? "selected" : ""); ?>>Pengiriman Jenazah Via Cargo</option>
                    <option value='Penjemputan jenazah via cargo'<?= ($booking->kategori == "Penjemputan jenazah via cargo" ? "selected" : ""); ?>>Penjemputan jenazah via cargo</option>
                    <option value='Pengawetan Jenazah (Formalin)'<?= ($booking->kategori == "Pengawetan Jenazah (Formalin)" ? "selected" : ""); ?>>Pengawetan Jenazah (Formalin)</option>
                    <option value='Pemandian Jenazah'<?= ($booking->kategori == "Pemandian Jenazah" ? "selected" : ""); ?>>Pemandian Jenazah</option>
                    <option value='Peti Jenazah'<?= ($booking->kategori == "Peti Jenazah" ? "selected" : ""); ?>>Peti Jenazah</option>
                    <option value='Standby Event'<?= ($booking->kategori == "Standby Event" ? "selected" : ""); ?>>Stand By Event</option>
                    <option value='Pelayanan Rumah Duka'<?= ($booking->kategori == "Pelayanan Rumah Duka" ? "selected" : ""); ?>>Pelayanan Rumah Duka  </option>
                    </select>
                  
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <input type="text" class="form-control" id="pesan" name="pesan" value="<?= $booking->pesan; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $booking->alamat; ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status"  class="form-control" value="<?= $booking->status; ?>">
                    <option value='Baru' <?= ($booking->status == "Baru" ? "selected" : ""); ?>>Baru</option>
                    <option value='Proses' <?= ($booking->status == "Proses" ? "selected" : ""); ?>>Proses</option>
                    <option value='Finish'<?= ($booking->status == "Finish" ? "selected" : ""); ?>>Finish</option>
                    </select>
                  
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>