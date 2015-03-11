var $overlayDataToolbar = $("<div class='overlay-data-toolbar'></div>");
var $image = $("<img>");
var $overlayDataDetails = $("<div class='overlay-data-details'></div>");
var $overlayData = $("<div class='overlay-data'></div>");
var $overlayDataContainer = $("<div class='overlay-data-container'></div>");
var $overlay = $("<div id='overlay'></div>");
var $deskripsiMobile = $("<div class='deskripsi'></div>");

$overlayDataContainer.append($overlayDataToolbar);
$overlayDataContainer.append($overlayData);
$overlay.append($overlayDataContainer);
$("body").append($overlay);
// $(".item-content").append($deskripsiMobile);

if ($("html").width() > 768) {
	$(".item-container a").click(function(event) {
		event.preventDefault();
		// var src = $(this).attr("href");

		var $src = $(this).children(".item-content").children(".item-summary").children(".data-src").text();
		var $nama = $(this).children(".item-content").children(".item-summary").children(".data-nama").text();
		var $jenis = $(this).children(".item-content").children(".item-summary").children(".data-jenis").text();
		var $merek = $(this).children(".item-content").children(".item-summary").children(".data-merek").text();
		var $deskripsi = $(this).children(".item-content").children(".item-summary").children(".data-deskripsi").text();
		var $harga = $(this).children(".item-content").children(".item-summary").children(".data-harga").text();

		$overlayData.append($image);
		$overlayData.append($overlayDataDetails);

		$overlayDataDetails.append("<h4>nama barang</h4>" + $nama + "<br>");
		$overlayDataDetails.append("<h4>harga</h4>" + $harga + "<br>");
		$overlayDataDetails.append("<h4>merek</h4>" + $merek + "<br>");
		$overlayDataDetails.append("<h4>jenis</h4>" + $jenis + "<br>");
		$overlayDataDetails.append("<h4>deskripsi</h4>" + $deskripsi + "<br>");

		$image.attr("src", $src);
		$overlay.show();
	});
} else {
	// $(".item-container a").click(function(event) {
	// 	event.preventDefault();
	// });

	// $(".item-content").each(function() {
	// 	// var $dataDeskripsi = $(this).children(".item-summary").children(".data-deskripsi");

	// 	$deskripsiMobile.append($(this).children(".item-summary").children(".data-deskripsi"));
	// 	$(this).append($deskripsiMobile);
	// 	// $dataDeskripsi.remove();
	// });
}

$(".overlay-data-toolbar").click(function() {
	$overlayDataDetails.empty();
	$overlay.hide();
});