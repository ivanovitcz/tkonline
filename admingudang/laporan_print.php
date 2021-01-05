<!DOCTYPE html>
<html>
<head>
  <title>Laporan Penjualan</title>
</head>
<body>

  <style type="text/css">
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

    
  <center>
    <h2>Laporan Penjualan Toko Online Pakaian Tenun</h2>
  </center>

  <?php 
  include '../koneksi.php';
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    ?>
    <br/>

    <table class="">
      <tr>
        <td width="20%">DARI TANGGAL</td>
        <td width="1%">:</td>
        <td><?php echo $tgl_dari; ?></td>
      </tr>
      <tr>
        <td>SAMPAI TANGGAL</td>
        <td>:</td>
        <td><?php echo $tgl_sampai; ?></td>
      </tr>
    </table>

    <br/>

    <table class="table table-bordered table-striped" id="table-datatable">
      <thead>
        <tr>
          <th width="1%">NO</th>
          <th>NAMA</th>
          <th>KATEGORI</th>
          <th>SUPPLIER</th>
          <th>JUMLAH</th>
          <th>HARGA</th>
          <th>TANGGAL</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,"SELECT * FROM transaksi_bahanbaku,kategori2 WHERE transaksi_bahanbaku.kategori_id=kategori2.kategori_id AND date(tanggal_input) >= '$tgl_dari' AND date(tanggal_input) <= '$tgl_sampai'");
        while($i = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $i['nama'] ?></td>
            <td><?php echo $i['kategori_nama'] ?></td>
            <td><?php echo $i['suplier'] ?></td>
            <td><?php echo number_format($i['jumlah']); ?></td>
            <td><?php echo "Rp. ".number_format($i['harga'])." ,-" ?></td>
            <td><?php echo $i['tanggal_input'] ?></td>
          </tr>
          <?php 
        }
        ?>
      </tbody>
    </table>

    <?php 
  }else{
    ?>

    <div class="alert alert-info text-center">
      Silahkan Filter Laporan Terlebih Dulu.
    </div>

    <?php
  }
  ?>
</body>

<script>
  window.print();
</script>
</html>