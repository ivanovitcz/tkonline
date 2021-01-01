<?php include 'header.php'; ?>



<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Check Out</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			
			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Buat Pesanan</h3>
					</div>

					<div class="row">
						<form method="post" action="checkout_act.php">
							<div class="col-lg-6">

								<div class="row">
									<div class="col-lg-12">

										<br>


										<h4 class="text-center">INFORMASI PEMBELI / PENERIMA BARANG</h4>

										<div class="form-group">
											<label>Nama</label>
											<input type="text" class="input" name="nama" placeholder="Masukkan nama pemesan .." required="required">
										</div>

										<div class="form-group">
											<label>Nomor HP</label>
											<input type="number" class="input" name="hp" placeholder="Masukkan no.hp aktif .." required="required">
										</div>

										<div class="form-group">
											<label>Alamat Lengkap</label>
											<textarea name="alamat" class="form-control" style="resize: none;" rows="6" placeholder="Masukkan alamat lengkap .."></textarea>
										</div>

										<?php 


										$curl = curl_init();

										curl_setopt_array($curl, array(
											CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
											CURLOPT_RETURNTRANSFER => true,
											CURLOPT_ENCODING => "",
											CURLOPT_MAXREDIRS => 10,
											CURLOPT_TIMEOUT => 30,
											CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											CURLOPT_CUSTOMREQUEST => "GET",
											CURLOPT_HTTPHEADER => array(
												"key: 7d8f7fa91950173b7a453b207add5930"
											),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);
										$data_provinsi = json_decode($response, true);
										?>

										<div class="form-group">
											<label>Provinsi Tujuan</label>
											<select name='provinsi' id='provinsi' class="input">
												<option>Pilih Provinsi Tujuan</option>
												<?php 
												for ($i=0; $i < count($data_provinsi['rajaongkir']['results']); $i++) {
													echo "<option value='".$data_provinsi['rajaongkir']['results'][$i]['province_id']."'>".$data_provinsi['rajaongkir']['results'][$i]['province']."</option>";
												}
												?>
											</select>
										</div>

										<div class="form-group">
											<label>Kabupaten</label>
											<select id="kabupaten" name="kabupaten" class="input"></select>
										</div>

										

										 <input name="kurir" id="kurir" value="" required="required" type="hidden">
										 <input name="ongkir2" id="ongkir2" value="" required="required" type="hidden">
										 <input name="service" id="service" value="" required="required" type="hidden">

										 <input name="provinsi2" id="provinsi2" value="" required="required" type="hidden"> 
										 <input name="kabupaten2" id="kabupaten2" value="" required="required" type="hidden"> 


										<div id="ongkir"></div>

										<br>

									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="pull-right">
											<input type="submit" class="primary-btn" value="Buat Pesanan">
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-6">

				


										<table class="shopping-cart-table table">
											<thead>
												<tr>
													<th>Produk</th>
													<th class="text-center">Harga</th>
													<th class="text-center">Jumlah</th>
													<th class="text-center">Total Harga</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$id = $_GET['id'];
												$request = mysqli_query($koneksi, "select * from request where request_id='$id'");
												$i = mysqli_fetch_assoc($request);
												$total = $i['request_harga'] * $i['request_jumlah'];
													?>

													<tr>
														<td>
															Produk Custome
														</td>
														<td class="text-center">
															<?php echo "Rp. ".number_format($i['request_harga']) . " ,-"; ?>
														</td>
														<td class="qty text-center">
															<?php echo $i['request_jumlah']; ?>
														</td>
														<td class="text-center"><strong class="primary-color total_harga"><?php echo "Rp. ".number_format($total) . " ,-"; ?></strong></td>
													</tr>


											</tbody>
											<tfoot>
												<tr>
													<th class="empty" colspan="2"></th>
													<th>TOTAL BERAT</th>
													<th class="text-center"><?php echo $i['request_berat']; ?> Gram</th>
												</tr>
												<tr>
													<th class="empty" colspan="2"></th>
													<th>ONGKIR</th>
													<th class="text-center"><span id="tampil_ongkir"><?php echo "Rp. 0 ,-"; ?></span></th>
												</tr>
												<tr>
													<th class="empty" colspan="2"></th>
													<th>TOTAL BAYAR</th>
													<th class="text-center"><span id="tampil_total"><?php echo "Rp. ".number_format($total) . " ,-"; ?></span></th>
												</tr>
											</tfoot>
										</table>

										<input name="berat" id="berat2" value="<?php echo $i['request_berat']; ?>" type="hidden">

										<input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $total; ?>">

							</div>
						</form>


					</div>






				</div>

			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->



<?php include 'footer.php'; ?>