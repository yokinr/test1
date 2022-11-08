
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title><?= $title ?> | SMKN 1 PAYAKUMBUH</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/toastr.css') ?>" rel="stylesheet">
  <meta name="theme-color" content="#ddd">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/Logo1.png') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.min.css') ?>">

  <style>
    .bg-info1{
      background-color: #185d97;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/dashboard.css') ?>" rel="stylesheet">
</head>
<body data-base="<?= base_url() ?>" class="small">
  <div id="body">
    <?php 
    if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
      redirect('','refresh');
    }else{
      $folder = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str')));
    }
    ?>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow d-print-none">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><i class='fas fa-book-open'></i> SMKN 1 PAYAKUMBUH</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="form-control form-control-dark w-100"></div> -->
      <input class="form-control form-control-dark w-100" type="text" name="cari" placeholder="Search" aria-label="Search" id="pencarian" autocomplete="off">
      <div class="navbar-nav border-end border-secondary">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="<?= base_url('user/profil') ?>"><i class="fas fa-user"></i> <?= $this->session->userdata('nama'); ?></a>
        </div>
      </div>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="<?= base_url('auth/keluar') ?>"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse d-print-none">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">
                  <span class="fas fa-home"></span>
                  Dashboard
                </a>
              </li>
              <?php
              $sidebar = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str'))).'/sidebar';
              $this->load->view($sidebar);
              ?>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Sidebar Nav</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
              </h6>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('pembelajaran') ?>">
                  <span class="fas fa-table"></span>
                  Pembelajaran
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('media_penyimpanan') ?>">
                  <span class="fas fa-archive"></span>
                  Media Penyimpanan
                </a>
              </li>

              <?php
              if($this->session->userdata('akun')){
                foreach ($this->session->userdata('akun') as $key => $value) {
                  if ($value['peran_id_str']=='Operator Sekolah'){
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="<?= base_url('auth/pengguna_ganti_hak_akses') ?>">
                        <span class="fas fa-exchange-alt"></span>
                        Tukar Hak Akses Pengguna
                      </a>
                    </li>
                    <?php
                  }
                }
              }
              ?>
            </ul>

          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class='fab fa-google-wallet'></i> <?= $title ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <?php 
                if($tombol){
                  foreach ($tombol as $key => $value) {
                    echo "<button type='button' class='{$value['class']}' id='{$value['id']}' data-id='{$value['data-id']}' md-v='{$value['md_v']}'><i class='{$value['icon']}'></i> {$value['name']}</button>";
                  }
                }
                ?>
              </div>
              <?php
              if(count($this->session->userdata('akun'))>'1'){
                ?>
                <!-- <div class="form-floating"> -->
                  <select class="btn btn-sm btn-toggle btn-outline-secondary" name="data_pilih_akun" id="data_pilih_akun">
                    <?php
                    if(count($this->session->userdata('akun'))>='1'){
                      foreach ($this->session->userdata('akun') as $key => $value) {
                        $dataID = $this->encryption->encrypt(json_encode($value));
                        if($this->session->userdata('peran_id_str')==$value['peran_id_str']){
                          echo "<option value='$dataID' selected>{$value['peran_id_str']}</option>";
                        }else{
                          echo "<option value='$dataID'>{$value['peran_id_str']}</option>";
                        }
                      }
                    }
                    ?>
                  </select>
                  <!-- <label for="data_pilih_akun">Pilih Peran</label> -->
                  <!-- </div> -->
                  <?php
                }
                ?>
              </div>
            </div>
            <div id="hasil_pencarian" class="d-none"></div>
            <div id="content" data-id='<?= $load ?>'></div>
          </main>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fab fa-google-wallet"></i> SMKN 1 PAYAKUMBUH</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="p-3">
            <div class="progress mb-2 d-none text-primary fw-bold"></div>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap.bundle.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pdfobject.js') ?>"></script>
    <script src="<?= base_url('assets/toastr.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/script.js') ?>"></script>
  </body>
  </html>
