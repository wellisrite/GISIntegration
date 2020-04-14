<?php
      $lat = $_GET["lat"];
      $long = $_GET["long"];
      $lat2 = -7.0238178;
      $long2 = 110.4032927;

      $latFrom = deg2rad($lat2);
      $lonFrom = deg2rad($long2);
      $latTo = deg2rad($lat);
      $lonTo = deg2rad($long);

      $lonDelta = $lonTo - $lonFrom;
      $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
      $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

      $angle = atan2(sqrt($a), $b);
      $jarak = $angle * 6371000;
      $km = ceil($jarak / 1000);
      $ongkirs = ceil($km * 500);
      $ongkir = number_format(ceil($km * 500));

$data = array();
$data['distance'] = "<strong>".$km." KM</strong>";
$data['shipping'] = "Rp.".$ongkir;

echo json_encode($data);
exit();


?>
