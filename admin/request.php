<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Request
      <small>Data Request Desain Pembeli</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Request Desain</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>KATEGORI</th>
                    <th>CUSTOMER</th>
                    <th>STATUS</th>
                    <th class="text-center">UPDATE STATUS</th>
                    <th>TOTAL HARGA</th>
                    <th>TOTAL BERAT</th>
                    <th>TOTAL JUMLAH</th>
                    <th class="text-center" width="25%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $invoice = mysqli_query($koneksi,"select * from request,customer,kategori where customer_id=request_customer and request_kategori =kategori_id order by request_id desc");
                  while($i = mysqli_fetch_array($invoice)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $i['kategori_nama'] ?></td>
                      <td><?php echo $i['customer_nama'] ?></td>
                      <td class="text-center">
                        <?php 
                        if($i['request_status'] == 'Tunggu'){
                          echo "<span class='label label-warning'>Menunggu Konfirmasi</span>";
                        }elseif($i['request_status'] == 'Tidak Disetujui'){
                          echo "<span class='label label-danger'>Tidak Disetujui</span>";
                        }elseif($i['request_status'] == 'Disetujui'){
                          echo "<span class='label label-success'>Disetujui</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php if($i['request_status'] == 'Disetujui') { echo "Tidak Bisa Diubah"; } else { ?>
                        <form action="request_status.php" method="post">
                          <input type="hidden" value="<?php echo $i['request_id'] ?>" name="request">
                          <select name="status" id="" class="form-control" onchange="form.submit()">
                            <option <?php if($i['request_status'] == "Tunggu"){echo "selected='selected'";} ?> value="Tunggu">Menunggu Konfirmasi</option>
                            <option <?php if($i['request_status'] == "Tidak Disetujui"){echo "selected='selected'";} ?> value="Tidak Disetujui">Tidak Disetujui</option>
                            <option <?php if($i['request_status'] == "Disetujui"){echo "selected='selected'";} ?> value="Disetujui">Disetujui</option>
                          </select>
                        </form>
                        <?php } ?>
                      </td>

                      <td><?php if($i['request_status'] == 'Disetujui' ) { echo "Rp. ".number_format($i['request_harga'])." ,-"; } else { echo "-"; } ?></td>
                      <td><?php if($i['request_status'] == 'Disetujui' ) { echo $i['request_berat']; } else { echo "-"; } ?></td>
                      <td><?php if($i['request_status'] == 'Disetujui' ) { echo $i['request_jumlah']; } else { echo "-"; } ?></td>

                      
                      
                      <td class="text-center">    


                        <a class='btn btn-sm btn-danger' href="request_hapus.php?id=<?php echo $i['request_id']; ?>"><i class="fa fa-trash"></i></a>
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