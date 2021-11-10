<?= $this->extend('layout/page_layout') ?>
<head>
  <!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="/path/to/bootstrap.min.css" />
<!-- Bootstrap JS -->
<script src="/path/to/jquery.min.js"></script>
<script src="/path/to/bootstrap.min.js"></script>
<!-- <a href="https://www.jqueryscript.net/tags.php?/Carousel/">Carousel</a> Extension -->
<script src="carousel.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
</head>
<?= $this->section('content') ?>   
 <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/ambulance1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Galeri</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Galeri<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-12 text-center heading-section ftco-animate">
          	<span class="subheading">Galeri</span>
            <h2 class="mb-4">Images</h2>
          </div>
        </div>	
        <div class="row">
					<?php foreach($galeri as $row){ ?>
             
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
			<div id="myImg" class="img" style="background-image: url('<?php echo base_url('/uploads/galeri/'.$row->gambar);?>');"></div>
							<div class="text pt-4">
              <h3 class="heading"><a><?= $row->nama; ?></a></h3>
              <p style="color: #000000"><?= $row->deskripsi; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
</div>
			</div>
<!-- The Modal -->
<div id="myModal" class="modal">
<span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-12 text-center heading-section ftco-animate">
          	<span class="subheading">Kegiatan</span>
            <h2 class="mb-4">Videos</h2>
          </div>
        </div>	
        <div class="row">
					<?php foreach($kegiatan as $row){ ?> 
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
          <div class="staff">
          <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?= $row->video; ?>" allowfullscreen></iframe>
</div>
</div>
            <div class="text pt-3 pb-4 px-4">
              <h3 class="heading"><a><?= $row->nama; ?></a></h3>
              <p style="color: #000000"><?= $row->deskripsi; ?></p>
            </div>
          </div>
        </div>
        <?php
            } ?>
</div>
		</section>
 <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

</script>

	<?= $this->endSection() ?>