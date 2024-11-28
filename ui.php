<?php

    include('connection.php');

    $parameter = isset($_GET['p']) ? $_GET['p'] : "home";

    if($parameter == "home"){ 
?>
    <div class="container text-center fw-bold" style="color: #9EDF9C">
        <h1 class="mt-5">Selamat Datang di Konser-In</h1>
        <h4 class="mb-5">Menyediakan Layanan Manajemen Konser Terlengkap</h4>
        <div class="row mt-5">
            <div class="col-lg-2">
              <a href="index.php?p=konser" class="text-decoration-none">
              <div class="card text-light" style="width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-earbuds"></i></h1>
                <div class="card-body">
                  <p class="card-text">Daftar Konser</p>
                  <p class="card-text fw-light">List Konser yang terdaftar dalam sistem</p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="" class="text-decoration-none">
              <div class="card text-light" style="height: 14rem; width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-ticket-perforated-fill"></i></h1>
                <div class="card-body">
                  <p class="card-text">Daftar Tiket</p>
                  <p class="card-text fw-light">List tiket yang tergenerate</p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="" class="text-decoration-none">
              <div class="card text-light" style="height: 14rem; width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-music-note-beamed"></i></h1>
                <div class="card-body">
                  <p class="card-text">Daftar Penyanyi</p>
                  <p class="card-text fw-light">List penyanyi yang terdaftar</p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="index.php?p=pengunjung" class="text-decoration-none">
              <div class="card text-light" style="height: 14rem; width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-people-fill"></i></h1>
                <div class="card-body">
                  <p class="card-text">List Pengujung</p>
                  <p class="card-text fw-light">List Pengunjung yang mendaftar ke konser</p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="" class="text-decoration-none">
              <div class="card text-light" style="height: 14rem; width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-person-badge-fill"></i></h1>
                <div class="card-body">
                  <p class="card-text">Daftar Pekerja</p>
                  <p class="card-text fw-light">List Pengelola dan Pekerja Konser</p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="" class="text-decoration-none">
              <div class="card text-light" style="height: 14rem; width: 10rem; background-color: rgba(158, 223, 156, 0.4);">
                <h1 class="pt-4"><i class="bi bi-globe-asia-australia"></i></h1>
                <div class="card-body">
                  <p class="card-text">Daftar Sponsor</p>
                  <p class="card-text fw-light">List Sponsor yang bergabung</p>
                </div>
              </div>
              </a>
            </div>
        </div>
      </div>
<?php
    }

    if($parameter == "konser"){
?>
    <div class="container text-center" style="color: #9EDF9C">
        <h1 class="my-3">Tabel Konser</h1>
        <p>Daftar Konser Yang Terdaftar Kedalam Sistem</p>
        <a href="index.php?p=tambahKonser" class="btn fw-bold" style="background-color: #9EDF9C; color: black">Daftarkan Konser Baru</a>
        <table class="table mt-4">
            <tr>
                <th class="text-light" style="background-color: #62825D">No</th>
                <th class="text-light" style="background-color: #62825D">Nama Konser</th>
                <th class="text-light" style="background-color: #62825D">Tanggal Konser</th>
                <th class="text-light" style="background-color: #62825D">Genre Konser</th>
                <th class="text-light" style="background-color: #62825D">Daftar Penyanyi</th>
                <th class="text-light" style="background-color: #62825D">Daftar Pengelola</th>
                <th class="text-light" style="background-color: #62825D">Jumlah Pengunjung Terdaftar</th>
                <th class="text-light" style="background-color: #62825D">Aksi</th>
            </tr>
            <?php 
              $query = "SELECT * FROM konser";
              $sql = mysqli_query($conn,$query);
              $no = 1;
              while($data = mysqli_fetch_array($sql)){
            ?>
            <tr class="fw-bold">
                <td><?= $no ?></td>
                <td><?= $data['namaKonser']?></td>
                <td><?= $data['tanggalKonser']?></td>
                <td><?= $data['genreKonser']?></td>
                <td><?= $data['daftarPenyanyi']?></td>
                <td><?= $data['daftarPekerja']?></td>
                <td>100</td>
                <td>
                    <a class="btn fw-bold m-1" href="index.php?p=editKonser&idKonser=<?= $data['idKonser']?>" style="background-color: #9EDF9C; color: black">Edit</a>
                    <a class="btn fw-bold m-1" href="process.php?p=hapusKonser&idKonser=<?= $data['idKonser']?>"  style="background-color: #AF1740; color: white" onclick="confirm('Apakah Yakin Ingin Menghapus Data ?')">Delete</a>
                </td>
            </tr>
            <?php $no++;
          } ?>
        </table>
    </div>
    
<?php
    }

    if($parameter == "tambahKonser"){
?>

    <div class="container text-center">
        <h1 class="my-4" style="color: #9EDF9C">Form Pendaftaran Konser Baru</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="process.php?p=tambahKonser" method="post">
                    <input required class="form-control fw-bold my-3" type="text" name="namaKonser" placeholder="Nama Konser">
                    <div class="row my-3">
                        <div class="col-lg-4">
                            <select required name="tanggal" class="form-select fw-bold" id="">
                                <option value="" selected>Pilih Tanggal</option>
                                <?php for($i = 1; $i <= 30; $i++){?>
                                  <option value="<?= $i?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select required name="bulan" class="form-select fw-bold" id="">
                                <option value="" selected>Pilih Bulan</option>
                                <?php $listBulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']?>
                                <?php foreach($listBulan as $bulan => $value){ ?>
                                    <option value="<?= $bulan ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select required name="tahun" class="form-select fw-bold" id="">
                                <option value="" selected>Pilih Tahun</option>
                                <?php for($i = 2024; $i >= 1800; $i--){?>
                                  <option value="<?= $i?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <select required name="genre" class="form-select fw-bold my-3" id="">
                        <option value="" selected>Pilih Genre Konser</option>
                        <option value="Classic">Classic</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Country">Country</option>
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Blues">Blues</option>
                        <option value="Reggae">Reggae</option>
                        <option value="Hip Hop">Hip Hop</option>
                    </select>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pilih Penyanyi
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row justify-content-center">
                                  <?php 
                                    $query = "SELECT * FROM penyanyi";
                                    $sql = mysqli_query($conn,$query);
                                    $no = 1;
                                    while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <div class="col-lg-3 mt-2">
                                        <input type="checkbox" name="penyanyi[]" value="<?= $data['namaPenyanyi']?>" class="btn-check" id="btncheck<?= $no?>" autocomplete="off">
                                        <label class="fw-bold btn btn-outline-success" for="btncheck<?= $no ?>"><?= $data['namaPenyanyi'] ?></label>
                                    </div>
                                    <?php $no++;?>
                                  <?php } ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion my-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Pilih Pengelola dan Pekerja
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row justify-content-center">
                                <?php 
                                    $query = "SELECT * FROM pekerja";
                                    $sql = mysqli_query($conn,$query);
                                    while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <div class="col-lg-3 mt-2">
                                        <input type="checkbox" name="pekerja[]" value="<?= $data['namaPekerja']?>" class="btn-check" id="btncheck<?= $no?>" autocomplete="off">
                                        <label class="fw-bold btn btn-outline-success" for="btncheck<?= $no ?>"><?= $data['namaPekerja'] ?></label>
                                    </div>
                                    <?php $no++;?>
                                <?php } ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn my-3 fw-bold" style="background-color: #9EDF9C" >Daftarkan Konser</button>
                </form>
            </div>
        </div>
        
    </div>

<?php
    }

    if($parameter == "editKonser"){     

        $id = $_GET['idKonser'];
        $query = "SELECT * FROM konser WHERE idKonser = $id";
        $sql = mysqli_query($conn,$query);
        $data = mysqli_fetch_array($sql);

        $dataTanggal = explode('-', $data['tanggalKonser']);
?>
<div class="container text-center">
<h1 class="my-4" style="color: #9EDF9C">Form Pengeditan Konser</h1>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <form action="process.php?p=editKonser&idKonser=<?=$id?>" method="post">
            <input required class="form-control fw-bold my-3" type="text" name="namaKonser" value="<?= $data['namaKonser']?>" placeholder="Nama Konser">
            <div class="row my-3">
                <div class="col-lg-4">
                    <select required name="tanggal" class="form-select fw-bold" id="">
                        <option value="">Pilih Tanggal</option>
                        <?php for($i = 1; $i <= 30; $i++){?>
                          <option <?php if($dataTanggal[2] == $i) echo 'selected'; ?> value="<?= $i?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <select required name="bulan" class="form-select fw-bold" id="">
                        <option value="">Pilih Bulan</option>
                        <?php $listBulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']?>
                        <?php foreach($listBulan as $bulan => $value){ ?>
                            <option <?php if($dataTanggal[1] == $bulan) echo 'selected'; ?> value="<?= $bulan ?>"><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <select required name="tahun" class="form-select fw-bold" id="">
                        <option value="">Pilih Tahun</option>
                        <?php for($i = 2024; $i >= 1800; $i--){?>
                          <option <?php if($dataTanggal[0] == $i) echo 'selected'; ?> value="<?= $i?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <select required name="genre" class="form-select fw-bold my-3" id="">
                <option value="">Pilih Genre Konser</option>
                <?php $listGenre = ['Classic','Jazz','Country','Rock','Pop','Blues','Reggae','Hip Hop']?>
                <?php foreach($listGenre as $genre){ ?>
                  <option <?php if($genre == $data['genreKonser']) echo 'selected'; ?> value="<?= $genre?>"><?= $genre ?></option>
                <?php } ?>
            </select>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pilih Penyanyi
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row justify-content-center">
                          <?php 
                            $query = "SELECT * FROM penyanyi";
                            $sql = mysqli_query($conn,$query);
                            $no = 1;
                            $dataPenyanyi = explode('<br>', $data['daftarPenyanyi']);
                            while($dataTunggal = mysqli_fetch_array($sql)){
                          ?>
                            <div class="col-lg-3 mt-2">
                                <input type="checkbox" <?php if(in_array($dataTunggal['namaPenyanyi'], $dataPenyanyi)) echo 'checked'; ?> name="penyanyi[]" value="<?= $dataTunggal['namaPenyanyi']?>" class="btn-check" id="btncheck<?= $no?>" autocomplete="off">
                                <label class="fw-bold btn btn-outline-success" for="btncheck<?= $no ?>"><?= $dataTunggal['namaPenyanyi'] ?></label>
                            </div>
                            <?php $no++;?>
                          <?php } ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="accordion my-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Pilih Pengelola dan Pekerja
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row justify-content-center">
                        <?php 
                            $query = "SELECT * FROM pekerja";
                            $sql = mysqli_query($conn,$query);   
                            $dataPekerja = explode('<br>', $data['daftarPekerja']);
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <div class="col-lg-3 mt-2">
                                <input type="checkbox" <?php if(in_array($data['namaPekerja'], $dataPekerja)) echo 'checked'; ?> name="pekerja[]" value="<?= $data['namaPekerja']?>" class="btn-check" id="btncheck<?= $no?>" autocomplete="off">
                                <label class="fw-bold btn btn-outline-success" for="btncheck<?= $no ?>"><?= $data['namaPekerja'] ?></label>
                            </div>
                            <?php $no++;?>
                        <?php } ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn my-3 fw-bold" style="background-color: #9EDF9C" >Perbaharui Data Konser</button>
        </form>
    </div>
</div>

</div>

<?php
    }

    if($parameter == "tiket"){

    }

    if($parameter == "penyanyi"){

    }

    if($parameter == "pengunjung"){
?>
    <div class="container text-center" style="color: #9EDF9C">
        <h1 class="my-3">Tabel Pengujung</h1>
        <p>Daftar Pengujung Yang Terdaftar</p>
        <a href="index.php?p=tambahPengunjung" class="btn fw-bold" style="background-color: #9EDF9C; color: black">Daftarkan Pengujung</a>
        <table class="table mt-4">
            <tr>
                <th class="text-light" style="background-color: #62825D">No</th>
                <th class="text-light" style="background-color: #62825D">Nama Pengunjung</th>
                <th class="text-light" style="background-color: #62825D">Nomor Tiket</th>
                <th class="text-light" style="background-color: #62825D">Nama Konser</th>
                <th class="text-light" style="background-color: #62825D">Aksi</th>
            </tr>
            <?php 
              $query = "SELECT * FROM pengunjung";
              $sql = mysqli_query($conn,$query);
              $no = 1;
              while($data = mysqli_fetch_array($sql)){
            ?>
            <tr class="fw-bold">
                <td><?= $no ?></td>
                <td><?= $data['namaPengunjung']?></td>
                <td><?= $data['nomorTiket']?></td>
                <?php $queryKonser = "SELECT namaKonser from tiket join konser where tiket.idKonser = konser.idKonser"; $sqlKonser = mysqli_query($conn,$queryKonser); $dataKonser = mysqli_fetch_array($sqlKonser);?>
                <td><?= $dataKonser['namaKonser']?></td>
                <td>
                    <a class="btn fw-bold m-1" href="index.php?p=editPengunjung&idPengunjung=<?= $data['idPengunjung']?>" style="background-color: #9EDF9C; color: black">Edit</a>
                    <a class="btn fw-bold m-1" href="process.php?p=hapusPengunjung&idPengunjung=<?= $data['idPengunjung']?>"  style="background-color: #AF1740; color: white" onclick="confirm('Apakah Yakin Ingin Menghapus Data ?')">Delete</a>
                </td>
            </tr>
            <?php $no++;
          } ?>
        </table>
    </div>
<?php
    }

    if($parameter == "tambahPengunjung"){
?>
    <div class="container text-center">
        <h1 class="mb-4" style="color: #9EDF9C; margin-top: 100px">Form Pendaftaran Pengunjung</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="process.php?p=tambahPengunjung" method="post">
                    <input required class="form-control fw-bold my-3" type="text" name="namaPengunjung" placeholder="Nama Pengunjung">
                    <input required class="form-control fw-bold my-3" type="text" name="nomorTiket" placeholder="Masukkan Nomor Tiket">
                    <?php if(isset($_GET['alert'])) { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php if($_GET['alert'] == 'used') echo "Nomor Tiket Sudah Digunakan"; ?>
                        <?php if($_GET['alert'] == 'invalid') echo "Nomor Tiket Tidak Valid"; ?>
                      </div>
                    <?php } ?>
                    <button type="submit" name="submit" class="btn my-3 fw-bold" style="background-color: #9EDF9C" >Daftarkan Pengunjung</button>
                  </form>
            </div>
        </div>
        
    </div>
<?php
    }

    if($parameter == "editPengunjung"){
?>
    <div class="container text-center">
        <h1 class="mb-4" style="color: #9EDF9C; margin-top: 100px">Form Pembaharuan Data Pengunjung</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
              <?php 
                $query = "SELECT * FROM pengunjung WHERE idPengunjung = $_GET[idPengunjung]";
                $sql = mysqli_query($conn,$query);
                $data = mysqli_fetch_array($sql);
              ?>
                <form action="process.php?p=editPengunjung&idPengunjung=<?= $data['idPengunjung']?>&nomorTiketLama=<?= $data['nomorTiket']?>" method="post">
                    <input required class="form-control fw-bold my-3" type="text" value="<?= $data['namaPengunjung']?>"  name="namaPengunjung" placeholder="Nama Pengunjung">
                    <input required class="form-control fw-bold my-3" type="text" value="<?= $data['nomorTiket']?>" name="nomorTiket" placeholder="Masukkan Nomor Tiket">
                    <?php if(isset($_GET['alert'])) { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php if($_GET['alert'] == 'used') echo "Nomor Tiket Sudah Digunakan"; ?>
                        <?php if($_GET['alert'] == 'invalid') echo "Nomor Tiket Tidak Valid"; ?>
                      </div>
                    <?php } ?>
                    <button type="submit" name="submit" class="btn my-3 fw-bold" style="background-color: #9EDF9C" >Perbaharui Data</button>
                  </form>
            </div>
        </div>
        
    </div>
<?php
    }

    if($parameter == "pekerja"){

    }

    if($parameter == "sponsor"){

    }

?>