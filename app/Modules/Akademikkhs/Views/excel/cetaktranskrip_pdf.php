<!DOCTYPE html>
<html>
<head>
	<title><?=$nama_file?></title>
</head>
<body>
	<style type="text/css">
		body {
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}


		.img-logo {
	        text-align: center;
	      }
	    .img-logo-atas {
	    	width: 50px;
	    }

	    .tb-aspek td {
			padding: 10px;
	    }
	</style>

	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >KARTU HASIL STUDI (KHS) KENAIKAN TINGKAT ANGKATAN 53</h4>
		</div>
		<div class="">
			<table>
				<tr>
					<td width="120px">NAMA</td>
					<td> : </td>
					<td> <?=$datataruna['namataruna']?></td>
				</tr>
				<tr>
					<td>NO. AK / KLS</td>
					<td> : </td>
					<td> <?=$datataruna['noaklong']?> / <?=$datataruna['kelompok']?></td>
				</tr>
				<tr>
					<td>KENAIKAN</td>
					<td> : </td>
					<td> Dari TK III KE TK IV</td>
				</tr>
			</table>
		</div>
	</div>

	<table width="100%" border="1" class="tb-aspek">
		<thead>
			<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2">ASPEK</th>
				<th colspan="2">SEMESTER</th>
				<th rowspan="2">KUMULATIF</th>
			</tr>
			<tr>
				<th>V</th>
				<th>VI</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">1.</td>
				<td>KARAKTER</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">2.</td>
				<td>PENGETAHUAN</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">3.</td>
				<td>KETERAMPILAN</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">4.</td>
				<td>JASMANI</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center">5.</td>
				<td>KESEHATAN</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>

	<div style="height: 25px;"></div>

	<table width="100%" border="1" class="tb-aspek">
		<thead>
			<tr>
				<th colspan="2">NILAI AKHIR PRESTASI (NAP) SEMESTER</th>
				<th rowspan="2">NILAI PRESTASI (NAPK) SEMESTER KUMULATIF</th>
				<th rowspan="2">RANKING KENAIKAN</th>
			</tr>
			<tr>
				<th>V</th>
				<th>VI</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="height: 40px;"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<div style="height: 30px;"></div>
	<div style="width: 60%; margin-left: auto;  margin-right: 0;">
		<table width="100%" style="font-size: 12px">
			<tr>
				<td align="center">Semarang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Juli 2021</td>
			</tr>
			<tr>
				<td align="center">a.n. GUBERNUR AKADEMI KEPOLISIAN</td>
			</tr>
			<tr>
				<td align="center">WAGUB</td>
			</tr>
			<tr>
				<td align="center">U.b.</td>
			</tr>
			<tr>
				<td align="center">DIREKTUR AKADEMIK</td>
			</tr>
			<tr>
				<td height="50px"></td>
			</tr>
			<tr>
				<td align="center" style="text-decoration: underline;">Drs. DADIK SOESETYO SOELISTIJONO</td>
			</tr>
			<tr>
				<td align="center">KOMBES POL NRP 66080562</td>
			</tr>
		</table>
	</div>
</body>
</html>
