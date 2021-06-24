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
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Admin</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <hr />
            <input id="myInput" type="text" onkeyup="myFunction()" placeholder="Search..">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Created_At</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $no = 1;
                foreach ($users as $row) {
                ?>
                    <tr>
                    <td><?=  $nomor++;; ?></td>
                        <td><?= $row->username; ?></td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->password; ?></td>
                        <td><?= $row->created_at; ?></td>
                        
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <?= $pager->links('users', 'bootstrap_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>