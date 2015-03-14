<?php
  include "include/koneksi.php";
  include "include/fungsi.php";

  $itemPerPage = 6;
  $totalItem = 0;
  $offset = 0;
  $value = $_GET['value'];
  $queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis
  JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.nama_barang LIKE CONCAT('%', '$value', '%')
  ORDER BY id_barang LIMIT $itemPerPage OFFSET $offset";

  $exe = mysql_query($queryGambar);
  while($hasilGambar = mysql_fetch_array($exe))
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
    $totalItem++;
  } // End of while loop
  $page = ceil($totalItem/$itemPerPage);
  bottomNav($page, $value, $itemPerPage);
?>
