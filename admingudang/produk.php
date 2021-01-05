<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Bahan Baku
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Bahan Baku</h3>
            <a href="produk_tambah.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Input Bahan Baku Baru</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA BAHAN BAKU</th>
                    <th>SUPPLIER</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>PANJANG</th>
                    <th>LEBAR</th>
                    <th width="15%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM bahanbaku,kategori2 where kategori_id=bahanbaku_kategori order by bahanbaku_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['bahanbaku_nama']; ?></td>
                      <td><?php echo $d['bahanbaku_suplier']; ?></td>
                      <td><?php echo $d['kategori_nama']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['bahanbaku_harga']).",-"; ?></td>
                      <td><?php echo number_format($d['bahanbaku_jumlah']); ?></td>
                      <td><?php echo number_format($d['bahanbaku_panjang']); ?> cm</td>
                      <td><?php echo number_format($d['bahanbaku_lebar']); ?> cm</td>
                      <td>                        
                        <a class="btn btn-info btn-sm m-0" href="produk_tambah_stok.php?id=<?php echo $d['bahanbaku_id'] ?>"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-warning btn-sm" href="produk_edit.php?id=<?php echo $d['bahanbaku_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="produk_hapus.php?id=<?php echo $d['bahanbaku_id'] ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>