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
                    <th>HARGA</th>
                    <th>BERAT</th>
                    <th>JUMLAH</th>
                    <th class="text-center" width="25%">OPSI</th>
                  </tr>
                </thead>
                <tbody id="request_data">
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
                        }elseif($i['request_status'] == 'Invoice Sudah Diisi'){
                          echo "<span class='label label-info'>Invoice Sudah Diisi</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php if($i['request_status'] == 'Disetujui' || $i['request_status'] == 'Invoice Sudah Diisi') { echo "Tidak Bisa Diubah"; } else { ?>
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

                      <td><?php echo "Rp. ".number_format($i['request_harga'])." ,-"; ?></td>
                      <td><?php echo $i['request_berat'];  ?></td>
                      <td><?php echo $i['request_jumlah']; ?></td>

                      
                      <?php if($i['request_status'] != 'Disetujui' ) { ?>
                      <td >    
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#request_<?php echo $i['request_id']; ?>">
                          <i class="fa fa-picture"></i> Detail Request
                        </button>

                        <div class="modal fade" id="request_<?php echo $i['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Request</h4>
                              </div>
                              <div class="modal-body">

                                <center>
                                  <img src="../gambar/request/<?php echo $i['request_gambar']; ?>" alt="" style="height: 300px">
                                  <br>
                                  <br>
                                  <p>
                                    <?php echo $i['request_keterangan']; ?>
                                  </p>
                                </center>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_<?php echo $i['request_id']; ?>">
                          <i class="fa fa-search"></i> Edit
                        </button>

                        <div class="modal fade" id="edit_<?php echo $i['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Request</h4>
                              </div>
                              <div class="modal-body">
                              <form method="POST" action="request_act.php?id=<?php echo $i['request_id']; ?>">
                                <div class="form-group">
                                  <label>Harga Satuan</label>
                                  <input type="text" class="form-control" name="harga" required="required" value="<?php echo $i['request_harga']; ?>">
                                </div>
                                &emsp;

                                <div class="form-group">
                                  <label>Berat</label>
                                  <input type="text" class="form-control" name="berat" required="required" value="<?php echo $i['request_berat']; ?>">
                                </div>
                                
                              

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="simpan" value="edit">Submit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <a class='btn btn-sm btn-danger' href="request_hapus.php?id=<?php echo $i['request_id']; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                      <?php } else { ?>
                      <td>
                        
                        <button type="button" class="btn btn-primary btn-sm" disabled>
                          <i class="fa fa-search"></i> Edit
                        </button>
                        <a class='btn btn-sm btn-danger' href="request_hapus.php?id=<?php echo $i['request_id']; ?>"><i class="fa fa-trash"></i></a>

                      </td>
                      <?php } ?>
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

<script>
  $('#request_data').editable({
    container: 'body',
    selector: 'td.berat',
    url: "request_update.php",
    title: 'Berat',
    type: "POST",
    //dataType: 'json',
    validate: function(value){
    if($.trim(value) == '')
    {
      return 'This field is required';
    }
    }
  });
</script>