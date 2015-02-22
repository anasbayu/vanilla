<?php
	include "fungsi.php";
?>

<h3>Statistik</h3><hr>
		Daftar merek
		<ol>
			<?php
				$queryMerek = "SELECT * FROM merek";
				$exe = mysql_query($queryMerek);
				while($hasilMerek = mysql_fetch_array($exe))
				{
					echo "<li>$hasilMerek[nama_merek] (" . jumlah($hasilMerek['id_merek'], 'merek', 'none') . ")</li>";
				}
			?>
		</ol>
		<hr>
		Daftar jenis
		<ol>
			<?php
				$queryJenis = "SELECT * FROM jenis";
				$exeJenis = mysql_query($queryJenis);
				while($hasilJenis = mysql_fetch_array($exeJenis))
				{
					echo "<li>$hasilJenis[nama_jenis] (" . jumlah($hasilJenis['id_jenis'], 'jenis', 'none') . ")</li>";
				}
			?>
		</ol>
		<hr>
		Daftar Barang
		<?php lihatSemuaBarang('tampil'); ?>