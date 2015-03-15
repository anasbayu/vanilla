<?php
	include "fungsi.php";
?>

<h3>Statistik</h3><hr>
		Daftar merek
		<table border=1>
			<thead>
				<th>No</th>
				<th>Merek</th>
				<th>Kuantitas</th>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$queryMerek = "SELECT * FROM merek";
					$exe = mysql_query($queryMerek);
					while($hasilMerek = mysql_fetch_array($exe))
					{
						echo "<tr>
								<td>$no</td>
								<td>$hasilMerek[nama_merek]</td>
								<td>" . jumlah($hasilMerek['id_merek'], 'merek', 'none') . "</td>
							  </tr>
							 ";
						$no++;
					}
				?>
			</tbody>
		</table>
		<hr>
		Daftar jenis
		<table border=1>
			<thead>
				<th>No</th>
				<th>Jenis</th>
				<th>Kuantitas</th>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$queryJenis = "SELECT * FROM jenis";
					$exeJenis = mysql_query($queryJenis);
					while($hasilJenis = mysql_fetch_array($exeJenis))
					{
						echo "<tr>
								<td>$no</td>
								<td>$hasilJenis[nama_jenis]</td>
								<td>" . jumlah($hasilJenis['id_jenis'], 'jenis', 'none') . "</td>
							  </tr>
							 ";
						$no++;
					}
				?>
			</tbody>
		</table>
		<hr>
		Daftar Barang
		<div id="lihatBarang"></div>

<script src="../js/jquery-2.1.3.min.js"></script>
<script>
	$('#lihatBarang').load('../admin/lihatBarang.php');
</script>
