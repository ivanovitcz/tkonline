<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="request.php">Request Desain</a></li>
			<li class="active">Request Baru</li>
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
				
				<h4>Buat Request Desain Baru</h4>

				<div id="store">

					<div class="row">

						<div class="col-lg-12">
							

							<table class="table table-bordered">
								<form action="request_save.php" method="POST" enctype="multipart/form-data">
									<tbody>
										<tr>
											<th width="20%"><label for="jenisproduk">Kategori</label></th>	
											<td>
												<div class="form-group">
													<select class="form-control" id="kategori" name="kategori">
														<?php 
															$kategori = mysqli_query($koneksi,"select kategori_id,kategori_nama from kategori");
															while($i = mysqli_fetch_array($kategori)){
														?>
														<option value="<?php echo $i['kategori_id'] ?>"><?php echo $i['kategori_nama'] ?></option>
														<?php } ?>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<th width="20%">Jumlah</th>	
											<td>
												<input type="text" class="form-control"  name="jumlah">
											</td>
										</tr>
										<tr>
											<th width="20%">Gambar</th>	
											<td>
												<input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
											</td>
										</tr>
										<tr>
											<th width="20%">Preview Gambar</th>
											<td>
												<img src="#" id="gambar-preview" class="img-fluid rounded shadow" style="max-height: 100px" alt="">
											</td>
										</tr>
										<tr>
											<th><label for="keterangan">Keterangan</label></th>	
											<td>
												<div class="form-group">
													<textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="2" class="text-right">
												<button type="submit" class="btn btn-success" name="simpan" value="create">Kirim</button>
											</td>
										</tr>
									
									</tbody>
								</form>
								
							</table>
						</div>


					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>

<script>
/* image preview sebelum upload */
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar-preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
	$("#gambar").change(function(){
			readURL(this);
	});
</script>