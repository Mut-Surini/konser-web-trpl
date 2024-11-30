<?php 

    include 'connection.php';

    if($_GET['p'] == "tambahKonser"){
        $namaKonser = $_POST['namaKonser'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
        $genre = $_POST['genre'];
        $penyanyi = implode('<br>', $_POST['penyanyi']);
        $pekerja = implode('<br>', $_POST['pekerja']);

        $query = "INSERT INTO konser VALUES('','$namaKonser','$tanggal','$genre','$penyanyi','$pekerja')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=konser");
        }else{
            header("location:index.php?p=konser");
        }
    }

    if($_GET['p'] == "editKonser"){
        $idKonser = $_GET['idKonser'];
        $namaKonser = $_POST['namaKonser'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
        $genre = $_POST['genre'];
        $penyanyi = implode('<br>', $_POST['penyanyi']);
        $pekerja = implode('<br>', $_POST['pekerja']);

        $query = "UPDATE konser SET namaKonser = '$namaKonser', tanggalKonser = '$tanggal', genreKonser = '$genre', daftarPenyanyi = '$penyanyi', daftarPekerja = '$pekerja' WHERE idKonser = '$idKonser'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=konser");
        }else{
            header("location:index.php?p=konser");
        }
    }

    if($_GET['p'] == "hapusKonser"){
        $idKonser = $_GET['idKonser'];

        $query = "DELETE from konser WHERE idKonser = '$idKonser'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=konser");
        }else{
            header("location:index.php?p=konser");
        }

    }

   
    function generateString($length = 8) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString; 
   
    }
    
    if ($_GET['p'] == "tambahTiket") {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idKonser = mysqli_real_escape_string($conn, $_POST['idKonser']);
    
            do {
                $nomorTiket = generateString();
                $stmt = mysqli_prepare($conn, "SELECT * FROM tiket WHERE nomorTiket = ?");
                mysqli_stmt_bind_param($stmt, "s", $nomorTiket);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            } while (mysqli_num_rows($result) > 0);
    
            $stmt = mysqli_prepare($conn, "INSERT INTO tiket (nomorTiket, idKonser, statusTiket) VALUES (?, ?, 'Unused')");
            mysqli_stmt_bind_param($stmt, "si", $nomorTiket, $idKonser);
            mysqli_stmt_execute($stmt);
    
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("Location: index.php?p=tiket");
            } else {
                echo "Terjadi kesalahan saat menambahkan tiket.";
            }
        } else {
            ?>
            <form method="POST" action="">
                <label for="idKonser">Pilih Konser:</label>
                <select name="idKonser" id="idKonser">
                    </select>
                <button type="submit">Tambah Tiket</button>
            </form>
            <?php
        }
    }

    if($_GET['p'] == "tambahPenyanyi"){
        $namaPenyanyi = $_POST['namaPenyanyi'];
        $namaPanggung = $_POST['namaPanggung'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
        
        $query = "INSERT INTO penyanyi VALUES('','$namaPenyanyi','$namaPanggung','$tanggal')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=penyanyi");
        }else{
            header("location:index.php?p=penyanyi");
        }
    }

    if($_GET['p'] == "editPenyanyi"){
        $idPenyanyi = $_GET['idPenyanyi'];
        $namaPenyanyi = $_POST['namaPenyanyi'];
        $namaPanggung = $_POST['namaPanggung'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
       

        $query = "UPDATE penyanyi SET namaPenyanyi = '$namaPenyanyi',namaPanggung = '$namaPanggung', tanggalLahir = '$tanggal' WHERE idPenyanyi = '$idPenyanyi'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=penyanyi");
        }else{
            header("location:index.php?p=penyanyi");
        }
    }

    if($_GET['p'] == "hapusPenyanyi"){
        $idPenyanyi = $_GET['idPenyanyi'];

        $query = "DELETE from penyanyi WHERE idPenyanyi = '$idPenyanyi'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=penyanyi");
        }else{
            header("location:index.php?p=penyanyi");
        }

    }

    if($_GET['p'] == "tambahPengunjung"){
        $namaPengunjung = $_POST['namaPengunjung'];
        $nomorTiket = $_POST['nomorTiket'];

        $dataTiket = mysqli_query($conn, "SELECT * FROM tiket WHERE nomorTiket = '$nomorTiket'");

        if(mysqli_num_rows($dataTiket) == 0){
            header("location:index.php?p=tambahPengunjung&alert=invalid");
        }

        $dataTiket = mysqli_fetch_array($dataTiket);

        if($dataTiket['statusTiket'] == "Used"){
            header("location:index.php?p=tambahPengunjung&alert=used");
            return;
        }

        $query = "INSERT INTO pengunjung VALUES('','$namaPengunjung','$nomorTiket')";
        $sql = mysqli_query($conn, $query);
        $updateTiket = mysqli_query($conn, "UPDATE tiket SET statusTiket = 'Used' WHERE nomorTiket = '$nomorTiket'");

        if($updateTiket && $sql){
            header("location:index.php?p=pengunjung");
        }
    }

    if($_GET['p'] == "editPengunjung"){
    
        $idPengunjung = $_GET['idPengunjung'];
        $namaPengunjung = $_POST['namaPengunjung'];
        $nomorTiket = $_POST['nomorTiket'];
        $nomorTiketLama = $_GET['nomorTiketLama'];

        $dataTiket = mysqli_query($conn, "SELECT * FROM tiket WHERE nomorTiket = '$nomorTiket'");

        if(mysqli_num_rows($dataTiket) == 0){
            header("location:index.php?p=editPengunjung&alert=invalid");
            return;
        }

        $dataTiket = mysqli_fetch_array($dataTiket);

        if($dataTiket['statusTiket'] == "Used"){
            if($nomorTiketLama != $nomorTiket){
                header("location:index.php?p=editPengunjung&alert=used");
                return;
            }
        }

        $query = "UPDATE pengunjung SET namaPengunjung = '$namaPengunjung', nomorTiket = '$nomorTiket' WHERE idPengunjung = '$idPengunjung'";
        $sql = mysqli_query($conn, $query);
        $updateTiketLama = mysqli_query($conn, "UPDATE tiket SET statusTiket = 'Unused' WHERE nomorTiket = '$nomorTiketLama'");
        $updateTiket = mysqli_query($conn, "UPDATE tiket SET statusTiket = 'Used' WHERE nomorTiket = '$nomorTiket'");
        
        if($updateTiket && $sql){
            header("location:index.php?p=pengunjung");
        }
    
    }

    if($_GET['p'] == "hapusPengunjung"){
        $idPengunjung = $_GET['idPengunjung'];

        $query = "DELETE from pengunjung WHERE idPengunjung = '$idPengunjung'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=pengunjung");
        }else{  
            header("location:index.php?p=pengunjung");
        }
    }

    if($_GET['p'] == "tambahPekerja"){
        $namaPekerja = $_POST['namaPekerja'];
        $jabatanPekerja = $_POST['jabatanPekerja'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
        
        $query = "INSERT INTO pekerja VALUES('','$namaPekerja','$jabatanPekerja','$tanggal')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=pekerja");
        }else{
            header("location:index.php?p=pekerja");
        }
    }

    if($_GET['p'] == "editPekerja"){
        $idPekerja = $_GET['idPekerja'];
        $namaPekerja = $_POST['namaPekerja'];
        $jabatanPekerja = $_POST['jabatanPekerja'];
        $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
       

        $query = "UPDATE pekerja SET namaPekerja = '$namaPekerja',jabatanPekerja = '$jabatanPekerja', tanggalLahir = '$tanggal' WHERE idPekerja = '$idPekerja'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=pekerja");
        }else{
            header("location:index.php?p=pekerja");
        }
    }

    if($_GET['p'] == "hapusPekerja"){
        $idPekerja = $_GET['idPekerja'];

        $query = "DELETE from pekerja WHERE idPekerja = '$idPekerja'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=pekerja");
        }else{
            header("location:index.php?p=pekerja");
        }

    }

    if($_GET['p'] == "tambahSponsor"){
        $namaSponsor = $_POST['namaSponsor'];
        $namaPemilik = $_POST['namaPemilik'];
        $biayaPerKonser = $_POST['biayaPerKonser'];
        
        $query = "INSERT INTO sponsor VALUES('','$namaSponsor','$namaPemilik','$biayaPerKonser')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=sponsor");
        }else{
            header("location:index.php?p=sponsor");
        }
    }

    if($_GET['p'] == "editSponsor"){
        $idSponsor = $_GET['idSponsor'];
        $namaSponsor = $_POST['namaSponsor'];
        $namaPemilik = $_POST['namaPemilik'];
        $biayaPerKonser = $_POST['biayaPerKonser'];
       

        $query = "UPDATE sponsor SET namaSponsor = '$namaSponsor',namaPemilik = '$namaPemilik', biayaPerKonser = '$biayaPerKonser' WHERE idSponsor = '$idSponsor'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=sponsor");
        }else{
            header("location:index.php?p=sponsor");
        }
    }

    if($_GET['p'] == "hapusSponsor"){
        $idSponsor = $_GET['idSponsor'];

        $query = "DELETE from sponsor WHERE idSponsor = '$idSponsor'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location:index.php?p=sponsor");
        }else{
            header("location:index.php?p=sponsor");
        }

    }
?>