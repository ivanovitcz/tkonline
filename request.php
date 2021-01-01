<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Request Saya</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">
			
			<?php 
			include 'customer_sidebar.php'; 
			?>

			<div id="main" class="col-md-9">
				
				<h4>Request Pesanan</h4>

				<div id="store">
					<div class="row">

						<div class="col-lg-12">

							<?php 
							if(isset($_GET['alert'])){
								if($_GET['alert'] == "gagal"){
									echo "<div class='alert alert-danger'>Gambar gagal diupload!</div>";
								}elseif($_GET['alert'] == "sukses"){
									echo "<div class='alert alert-success'>Pesanan berhasil dibuat, silahkan melakukan pembayaran!</div>";
								}elseif($_GET['alert'] == "upload"){
									echo "<div class='alert alert-success'>Konfirmasi pembayaran berhasil tersimpan, silahkan menunggu konfirmasi dari admin!</div>";
								}
							}
							?>

							<div class="row">
								<div class="col-lg-6">
									<small class="text-muted">
										Semua data request design anda
									</small>
								</div>
								<div class="col-lg-6 text-right">
									<a class="btn btn-success" href="request_create.php">Request Design</a>
								</div>
							</div>
							

							<br/>
							<br/>


							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>ID REQUEST</th>
											<th>Jenis Produk</th>
											<th>Gambar</th>
											<th>Total Bayar</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										error_reporting(E_ALL);
										$id = $_SESSION['customer_id'];
										$request = mysqli_query($koneksi,"select * from request where request_customer='$id' order by request_id desc");
										while($i = mysqli_fetch_array($request)){
											?>
											<tr>
												<td><?php echo $i['request_id'] ?></td>
												<td><?php echo $i['request_kategori'] ?></td>
												<td><img src="gambar/request/<?php echo $i['request_gambar']?>" class="img-fluid rounded shadow" style="max-height: 50px" alt=""></td>
												<td><?php echo $i['request_harga'] ?></td>
												<td class="text-center">
													<?php 
													if($i['request_status'] == 'Tunggu'){
														echo "<span class='label label-warning'>Tunggu Konfirmasi</span>";
													}elseif($i['request_status'] == 'Tidak Disetujui'){
														echo "<span class='label label-danger'>Tidak Disetujui</span>";
													}elseif($i['request_status'] == 'Disetujui'){
														echo "<span class='label label-success'>Disetujui</span>";
														echo "&nbsp; <a class='label label-info' href='request_checkout.php?id=".$i['request_id']."'>Isi Invoice</a>";
													}
													?>
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
				</div>

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>