<?php

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';
require_once '../models/task.class.php';
$mpdf = new Mpdf(['mode' => 'utf-8', 
				'format' => 'A4',
				]);

$obj = new task();
$data = $obj->fetchHairColorData();

foreach($data as $values) {
	$front = $values['front'];
	$top = $values['top'];
	$left_temp = $values['left_temp'];
	$right_temp = $values['right_temp'];
	$left_side = $values['left_side'];
	$right_side = $values['right_side'];
	$crown = $values['crown'];
	$back = $values['back'];
}


$mpdf->WriteHTML('
	
	<table width="100%" border="1" style="border-collapse:collapse;">
		<tr>
			<td><strong>Customer Name:</strong></td>
			<td><strong>Order Date:</strong></td>
			<td><strong>Ship Date:</strong></td>
		</tr>
		<tr>
			<td><strong>Serial Number:</strong></td>
			<td><strong>Customer Name:</strong></td>
			<td><strong>Worker Id:</strong></td>
		</tr>
	</table>

	<table width="100%" border="1" style="border-collapse:collapse;margin-top:12px">
		<tr>
			<td width="5px">#1</td>
			<td>Hairstyle: Full back comb and fluffy</td>
		</tr>
		<tr>
			<td></td>
			<td>QTY:5</td>
		</tr>
	</table>

	<table width="100%" border="1" style="border-collapse:collapse;text-align:center">
		<tr>
			<td width="5px">#2</td>
			<td>Section</td>
			<td>Front</td>
			<td>Top</td>
			<td>Temple</td>
			<td>Side</td>
			<td>Crown</td>
			<td>Back</td>
		</tr>
		<tr>
			<td width="5px"></td>
			<td>Wave/Curl</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
	</table>

	<table width="100%" border="1" style="border-collapse:collapse;margin-top:12px">
		<tr>
			<td width="5px">#3</td>
			<td width="100px">Hair Type: </td>
			<td></td>
		</tr>
	</table>

	<table width="" border="1" style="border-collapse:collapse;margin-top:12px;text-align:center">
		<tr>
			<td width="25px"></td>
			<td width="70px">Section</td>
			<td width="55px">Front</td>
			<td width="55px">Top</td>
			<td width="55px">Temple</td>
			<td width="55px">Side</td>
			<td width="55px">Crown</td>
			<td width="55px">Back</td>
		</tr>
		<tr>
			<td width="25px">#4</td>
			<td>4.5</td>
			<td>4.5</td>
			<td>4.5</td>
			<td>4.5</td>
			<td>4.5</td>
			<td>4.5</td>
			<td>4.5</td>
		</tr>
		<tr>
			<td width="25px">#5</td>
			<td>Density</td>
			<td>700</td>
			<td>700</td>
			<td>700</td>
			<td>700</td>
			<td>700</td>
			<td>700</td>
		</tr>
	</table>

	<table border="1" style="border-collapse:collapse;text-align:center">
		<tr>
			<td style="border-bottom:none"><img src="1.png" height="50px" ></td>
			<td style="border-bottom:none"><img src="2.png" height="50px"></td>
			<td style="border-bottom:none"><img src="3.png" height="50px"></td>
			<td style="border-bottom:none"><img src="4.png" height="50px"></td>
		</tr>
		<tr>
			<td style="border-top:none" width="110px">Circumference: <br>A</td>
			<td style="border-top:none" width="110px">Circumference: <br>B</td>
			<td style="border-top:none" width="110px">Front to Back: <br>C</td>
			<td style="border-top:none" width="95px">Ear to Ear: <br>D</td>
		</tr>
	</table>
	<div style="position: fixed; right: 22mm; bottom: 208mm; ">
		<p >'. $top .'</p>
	</div>
	<div style="position: fixed; right: 50mm; bottom: 178mm; ">
		<p >'. $left_temp .'</p>
	</div>
	<div style="position: fixed; right: 23mm; bottom: 188mm; ">
		<p>'.$crown.'</p>
	</div>
	<div style="position: fixed; right: -5mm; bottom: 178mm; ">
		<p>'. $right_temp .'</p>
	</div>
	<div style="position: fixed; right: 23mm; bottom: 155mm; ">
		<p>'. $front .'</p>
	</div>
	<div style="position: fixed; right: -5mm; bottom: 155mm; ">
		<p>'. $right_side .'</p>
	</div>
	<div style="position: fixed; right: 52mm; bottom: 155mm; ">
		<p>'. $left_side .'</p>
	</div>
	<div style="position: fixed; right: 23mm; bottom: 125mm; ">
		<p >'. $back .'</p>
	</div>

  <div style="position: fixed; right: -12mm; bottom: 114mm; ">
  	<img src="ss-removebg-preview.png" >
  </div>

  <table border="1" style="border-collapse:collapse;text-align:left;margin-top:12px;">
  	<tr>
		<td width="25px">#6</td>
		<td colspan="3" width="400" >Template</td>
  	</tr>
  	<tr>
		<td></td>
		<td width="5">Size:</td>
		<td>L:W</td>
		<td width="100"></td>
  	</tr>
  </table>

  <table border="1" style="border-collapse:collapse;text-align:left;margin-top:12px;">
  	<tr>
		<td width="25px">#7</td>
		<td width="140px">Base</td>
		<td  width="260" >14A</td>
  	</tr>
  	<tr>
		<td></td>
		<td width="5">Base Material</td>
		<td>L:W</td>
  	</tr>
  </table>

  <table border="1" width="100%" style="border-collapse:collapse;text-align:left;margin-top:100px;">
  	<tr>
		<td width="25px">#8</td>
		<td width="100px"></td>
		<td width="100px">Front</td>
		<td width="100px">Top</td>
		<td width="100px">Side</td>
		<td width="100px">Crown</td>
		<td width="100px">Back</td>
  	</tr>
  	<tr>
		<td></td>
		<td>P/U Width</td>
		<td>STA</td>
		<td></td>
		<td>1 1/4</td>
		<td></td>
		<td>1 1/4</td>
  	</tr>
  	<tr>
		<td></td>
		<td>P/U Width</td>
		<td>Thin NP/U</td>
		<td></td>
		<td>Med NP/U</td>
		<td></td>
		<td>Med NP/U</td>
  	</tr>
  	<tr>
		<td></td>
		<td>Ribbon</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  	</tr>
  	<tr>
		<td></td>
		<td>Lace Front Dist.</td>
		<td ></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
  	</tr>
  	
  </table>

  <table width="100%" border="1" style="border-collapse:collapse;text-align:left;margin-top:12px;">
  	<tr>
		<td width="25px">#9</td>
		<td width="200px">Back Side</td>
		<td></td>
  	</tr>
  </table>

  <table width="100%" border="1" style="border-collapse:collapse;text-align:left;margin-top:12px;">
  	<tr>
		<td width="25px">#10</td>
		<td width="200px">Light Col sample</td>
		<td></td>
  	</tr>
  </table>

  <table border="1" width="100%" style="border-collapse:collapse;text-align:left;margin-top:12px;text-align:center">
  	<tr>
  		<td width="10">Position</td>
  		<td width="50"> Front [1]</td>
  		<td width="50">Top [3]</td>
  		<td width="50">Left Temp [2]</td>
  		<td width="50">Right Temp [2]</td>
  		<td width="50">Left Side [4]</td>
  		<td width="50">Right Side [4]</td>
  		<td width="50">Crown [5]</td>
  		<td width="50">Back [6]</td>
  	</tr>
  	<tr>
  		<td width="10">By color swatch</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  	</tr>
  	<tr>
  		<td width="10">Light Hair</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  		<td width="50">%</td>
  	</tr>
  	<tr>
  		<td width="10">Base Color</td>
  		<td width="50">'. $front .'</td>
  		<td width="50">'. $top .'</td>
  		<td width="50">'. $left_temp .'</td>
  		<td width="50">'. $right_temp .'</td>
  		<td width="50">'. $left_side .'</td>
  		<td width="50">'. $right_side .'</td>
  		<td width="50">'. $crown .'</td>
  		<td width="50">'. $back .'</td>
  	</tr>
  	<tr>
  		<td>dfd</td>
  		<td colspan="8">df</td>
  	</tr>
  </table>
  <table border="1" width="100%" style="border-collapse:collapse;text-align:left;text-align:center">
	<tr>
		<td height="30px">Special Notes</td>
	</tr>
  </table>
  <table border="1" width="100%" style="border-collapse:collapse;text-align:left;text-align:center">
	<tr >
		<td height="100px">freestyle</td>
	</tr>
  </table>

		




');
$mpdf->Output($pdf);