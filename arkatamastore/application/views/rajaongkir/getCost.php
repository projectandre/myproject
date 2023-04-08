<?php 

if($courier == ''){
	return;
}
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: bd56c82a0878156ec33a8d914e80885c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response, true);

}
?>

<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
?>
	 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
		 <table class="table table-striped">
			 <?php
			 for ($l=0; $l < 1; $l++) {		 
			 ?>
			 <tr>
				 <td>Biaya Ongkir</td>
				 <td>
					 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
					 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
				 </td>
				 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
				 <td align="right"><h5 class="text-brand text-end">Rp. <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></h5></td>
			 </tr>
			 <?php
			 $ongkir = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
			 $jenis_ongkir = $data['rajaongkir']['results'][$k]['costs'][$l]['service'].' '.$data['rajaongkir']['results'][$k]['costs'][$l]['description'];
			 }
			 $subtotal = $sub_total;
			 $grandtotal = $ongkir + $subtotal;
			 ?>
			 <tr>
				 <td colspan="3">Total Belanja</td>
				 <td><h5 class="text-brand text-end">Rp. <?= number_format($subtotal,0,",",".") ?></h5></td>
			 </tr>

			 <tr>
				 <th colspan="3">Grand Total</th>
				 <th align="right"><h5 class="text-brand text-end"><b>Rp. <?= number_format($grandtotal,0,",",".") ?></b></h5></th>
			 </tr>

			 <input type="hidden" id="jenis_ongkir" name="jenis_ongkir" value="<?= $jenis_ongkir ?>">
			 <input type="hidden" id="subtotal" name="subtotal" value="<?= $subtotal ?>">
			 <input type="hidden" id="ongkir" name="ongkir" value="<?= $ongkir ?>">
		 </table>
	 </div>
 <?php
 }
 ?>