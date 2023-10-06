<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand" href="#" style="color: white; font-weight: bold;">Tukar Tambah Elektronik</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item <?php if($this->uri->segment(1)=="produk"){echo "active";}?>">
        <a class="nav-link" href="<?= base_url('produk'); ?>" style="color: white;">Produk</a>
     </li>
     <li class="nav-item <?php if($this->uri->segment(1)=="tukar"){echo "active";}?>">
        <a class="nav-link" href="<?= base_url('tukar'); ?>" style="color: white;">Tukar Tambah</a>
     </li>
    </ul>
    <span class="navbar-text">
      <a class="nav-link" style="color: white;" href="<?= base_url('login/logout'); ?>">Logout</a>
    </span>
  </div>
</nav>