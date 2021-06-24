<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main class="container">

<div class="starter-template text-center py-5 px-3">
    <h1>Hai ! <?= session()->get('name'); ?></h1>
    <p class="lead">Selamat Datang di Panel Admin,, Silahkan Bekerja :)</p>
</div>

</main><!-- /.container -->

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <?= $this->renderSection('content') ?>
    </main>

    
<?= $this->endSection('content'); ?>