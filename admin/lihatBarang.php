<?php
  include "../include/koneksi.php";
  include "../include/fungsi.php";

  error_reporting(0);

  $anu = $_GET['offset'];
  $itemPerPage = 5;
  $pagenya = jumlah('all', '', 'none');
  if($anu ==  "")
  {
    $offset = 0;
    $no = 1;
  }
  else
  {
    $offset = $anu;
    $no = $anu + 1;
  }


  echo "
      <table border=1px>
        <thead>
          <th>No</th>
          <th>Id Barang</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Merek</th>
          <th>Deskripsi</th>
          <th>Gambar</th>
          <th>Harga</th>
        </thead>";

      $queryBarang = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis
                      Join merek ON barang.id_merek = merek.id_merek ORDER BY barang.id_barang
                       LIMIT $itemPerPage OFFSET $offset";
      $exeBarang = mysql_query($queryBarang);
      while($hasilBarang = mysql_fetch_array($exeBarang))
      {
        echo "
              <tr>
                <td>$no</td>
                <td class='idBarang $no'>$hasilBarang[id_barang]</td>
                <td>$hasilBarang[nama_barang]</td>
                <td>$hasilBarang[nama_jenis]</td>
                <td>$hasilBarang[nama_merek]</td>
                <td>$hasilBarang[deskripsi]</td>
                <td><img src='../$hasilBarang[path]' width=50px></td>
                <td>$hasilBarang[harga]</td>
              </tr>
              ";
        $no++;
      }
  echo "</table>";
  $page = ceil($pagenya/$itemPerPage);

  $offsetnya = 0;
  for($i = 1; $i <= $page; $i++)
  {
    echo "<a class='a' href='lihatBarang.php?offset=$offsetnya'>" . $i . "</a> ";
    $offsetnya += $itemPerPage;	// Ganti untuk ganti range offset
  }
?>


<script src="../js/jquery-2.1.3.min.js"></script>
<script>
  $(document).ready(function(){
    $('.a').click(function(event){
      event.preventDefault();
      var url = $(this).attr('href');
      $('#lihatBarang').load(url);
    });
  });
</script>
