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
?>