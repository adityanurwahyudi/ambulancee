<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Data Galeri
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <a href="<?= base_url(); ?>/galeri/create" class="btn btn-primary">Upload</a>
                <hr />
                <input id="myInput" type="text" onkeyup="myFunction()" placeholder="Search..">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $no  = 1;
                        foreach ($galeri as $row) {
                        ?>
                            <tr>
                                <td><?=  $nomor++; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><img width="150px" class="img-thumbnail" src="<?php echo base_url('/uploads/galeri/'.$row->gambar);?>"/></td>
                                <td><?= $row->deskripsi; ?></td>
                                <td><?= $row->created_at; ?></td>
                                <td>
                            <a title="Edit" href="<?= base_url("galeri/g_edit/$row->id_galeri"); ?>" class="btn btn-info">Edit</a>
                            <a title="Delete" href="<?= base_url("galeri/delete/$row->id_galeri") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                        </td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?= $pager->links('galeri', 'bootstrap_pagination'); ?>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection('content'); ?>