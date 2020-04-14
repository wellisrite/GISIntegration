<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aplikasi Perhitungan Ongkos Kirim Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="dist/jquery.addressPickerByGiro.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7SEthUYg--FI-dskVJKbQU-zja6pbVeI&sensor=false&language=en"></script>
      <link rel="stylesheet"  href="css/well.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="dist/jquery.addressPickerByGiro.css" rel="stylesheet" media="screen">
    <style type="text/css">
      .sidebar-nav {
        padding: 9px 0;
      }
      .map {
        height: 300px;
      }
      .map img {
        max-width: none;
      }
      @media (max-width: 767px) {
        .affix {
          position: static;
        }
      }
      @media (min-width: 768px) and (max-width: 979px) {
        .form-horizontal .control-label {
          width: 80px;
        }
        .form-horizontal .controls {
          margin-left: 100px;
        }
      }

	.typeahead.dropdown-menu {
		z-index: 1002;
	}

	/* fix gmap */
	.gm-style img {
		max-width: none;
	}
    </style>
</head>
<body>
  <?php require_once('header.php'); ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="row-fluid">
			<h1>Aplikasi Perhitungan Ongkos Kirim</h1>
			<form autocomplete="off" class="form-horizontal">
			<div class="row-fluid">
			  <div class="span12">
				<div class="row-fluid">
					<label class="control-label" for="inputAddress">Address</label>
					<div class="controls">
					  <input type="text" class="inputAddress input-xxlarge" value="Jl. Pawiyatan Luhur IV/1, Bendan Dhuwur, Tinjomoyo, Banyumanik, Kota Semarang, Jawa Tengah 50235, Indonesia" autocomplete="off" placeholder="Type in your address">
					</div>
				</div>

			  <div class="control-group">
				<label class="control-label">Formatted address</label>
				<div class="controls">
				  <input type="text" class="formatted_address input-xxlarge" disabled="disabled">
				</div>
			</div>

			  <div class="control-group">
				<label class="control-label">Region</label>
				<div class="controls">
				  <input type="text" class="region" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">City</label>
				<div class="controls">
				  <input type="text" class="county" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">street</label>
				<div class="controls">
				  <input type="text" class="street" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">street number</label>
				<div class="controls">
				  <input type="text" class="street_number" disabled="disabled">
				  <input type="hidden" class="latitude" id="latitude">
				  <input type="hidden" class="longitude" id="longitude">
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label">Cek Ongkos Kirim</label>
				<div class="controls">
				  <a id="calculate" class="btn btn-primary" name="calculate" >Calculate Shipping</a>
				</div>
			  </div>

			  <div class="control-group">
				<label class="control-label">Hasil Perhitungan Ongkos Kirim</label>
				<div class="controls">
			<table>
			<tr>
                    		<td class="th border">Jarak Kirim</td>
                    		<td class="align-r border" id="distance"> KM</td>
                  	</tr>
                  	<tr>
                    		<td class="th border">Ongkos Kirim</td>
                    		<td class="align-r border" id="shipping_c">Rp. (Rp.500 / KM)</td>
                  	</tr>
                  	</table>
				</div>
			  </div>

			  </div>
			</div>
			</form>
          </div><!--/span-->
        <script>
            $('.inputAddress').addressPickerByGiro({
				distanceWidget: true,
                boundElements: {
                    'region': '.region',
                    'county': '.county',
                    'street': '.street',
                    'street_number': '.street_number',
                    'latitude': '.latitude',
                    'longitude': '.longitude',
                    'formatted_address': '.formatted_address'
                }
            });
        </script>
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<script>

      	$("#calculate").click(function(){
        var lat = $("#latitude").val();
        var long = $("#longitude").val();
        $.ajax({
            url: "http://localhost/gis/ongkir.php",
            data: 'lat=' + lat + '&long=' + long,
            cache: false,
            dataType: 'json',
            success: function(data){
              var d = data.distance;
              var s = data.shipping;
              $("#shipping_c").html(s);
              $("#distance").html(d);
            }
        });
      	});

</script>
<?php require_once('footer.php');?>
</body>
</html>
