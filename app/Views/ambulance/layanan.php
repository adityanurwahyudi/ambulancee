<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/ambulance1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Layanan</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index">Home<i class="ion-ios-arrow-forward"></i></a></span> <span>Layanan<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
			<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-2">
        <div class="col-md-12 text-center heading-section ftco-animate">
          <span class="subheading">Layanan</span>
          <h2 class="mb-4">Layanan Kami</h2>
        </div>
      </div>
      <div class="row">
      <?php
            foreach ($layanan as $row){
              ?>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
          <div class="block-20" style="background-image: url('<?php echo base_url('/uploads/layanan/'.$row->gambar);?>');">
          </div>
            <div class="text pt-3 pb-4 px-4">
              <h3 class="heading"><a><?= $row->nama; ?></a></h3>
              <p style="color: #000000"><?= $row->desc; ?></p>
            </div>
          </div>
        </div>
        <?php
            } ?>
</div>
        </section>
	<?= $this->endSection() ?>