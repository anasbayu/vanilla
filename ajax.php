<?php
	include "include/koneksi.php";
	include "include/fungsi.php";

	// Menampilkan info catalog

		$value = $_GET['id'];
		$syarat = $_GET['syarat'];

		$tabel = "";

		if($syarat == 1)	// Info catalog pada index.php (client)
		{
			$tabel = "id_jenis";
		}
		else if($syarat == 2)
		{
			$tabel = "id_merek";
		}
			// Mengetahui jumlah seluruh barang
			$totalItem = jumlah($value, 'jenis', 'none');
			$itemPerPage = 6;
			$offset = $_GET['offset'];

			$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis
						JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.$tabel = '$value'
						ORDER BY id_barang LIMIT $itemPerPage OFFSET $offset";

			if($value === "all")
			{
				$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis
				JOIN merek ON barang.id_merek = merek.id_merek
				ORDER BY id_barang LIMIT $itemPerPage OFFSET $offset";
			}
			$exe2 = mysql_query($queryGambar);

			while($hasilGambar = mysql_fetch_array($exe2))
			{
				$src = $hasilGambar['path'];
				$nama = $hasilGambar['nama_barang'];
				$jenis = $hasilGambar['nama_jenis'];
				$merek = $hasilGambar['nama_merek'];
				$deskripsi = $hasilGambar['deskripsi'];
				$harga = $hasilGambar['harga'];
?>

				<li class="item-container">
					<a href="<?=$src?>">
						<div class="item-content">
							<img src="<?=$src?>">
							<div class="item-summary">
								<p class="data-nama all-show">
									<span class="span-mobile-show">Nama</span>
									:&nbsp;<?=$nama?>
								</p>
								<p class="data-harga all-show">
									<span class="span-mobile-show">Harga</span>
									:&nbsp;rp <?=$harga?>,00
								</p>
								<p class="data-src none-show">
									<?=$src?>
								</p>
								<p class="data-jenis mobile-show">
									<span class="span-mobile-show">Jenis</span>
									:&nbsp;<?=$jenis?>
								</p>
								<p class="data-merek mobile-show">
									<span class="span-mobile-show">Merek</span>
									:&nbsp;<?=$merek?>
								</p>
								<p class="data-deskripsi mobile-show">
									<span class="span-mobile-show">Deskripsi</span>
									:&nbsp;<?=$deskripsi?>
								</p>
							</div>
						</div>
					</a>
				</li>

<?php
				// echo "<img src='$hasilGambar[path]'/><br>"
				// 	. "Nama : $hasilGambar[nama_barang]<br>"
				// 	. "Jenis : $hasilGambar[nama_jenis]<br>"
				// 	. "Merek : $hasilGambar[nama_merek]<br>"
				// 	. "Deskripsi : $hasilGambar[deskripsi]<br>"
				// 	. "Harga : $hasilGambar[harga]<br>";
			}

			// Menampilkan page (angka dibawah)
			$page = ceil($totalItem/$itemPerPage);
			bottomNav($page, $value, $itemPerPage);
?>

<script src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/overlay.js"></script>
<script>
	$(document).ready(function(){
		$('.a').click(function(event){
			event.preventDefault();
			var url = $(this).attr("href");
			$('#ajax').load(url);
		});
	});
</script>
