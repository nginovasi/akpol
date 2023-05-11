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

	    .tb-aspek th {
			padding: 5px;
	    }

	    .tb-aspek td {
			padding: 5px;
	    }

	</style>

	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >Data Kelompok Mata Kuliah</h4>
		</div>
		<div class="">
			<table>
				<?php
					if($batalyon!='') { ?>
						<tr>
							<td width="120px">BATALYON</td>
							<td> : </td>
							<td> <?=$batalyon?></td>
						</tr>
				<?php }
				?>
				<?php
					if($semester!='') { ?>
						<tr>
							<td width="120px">SEMESTER</td>
							<td> : </td>
							<td> <?=$semester?></td>
						</tr>
				<?php }
				?>
				<?php
					if($aspek!='') { ?>
						<tr>
							<td width="120px">ASPEK</td>
							<td> : </td>
							<td> <?=$aspek?></td>
						</tr>
				<?php }
				?>
				
			</table>
		</div>
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th><span>#</span></th>
                        <th><span>Kode Mata Pelajaran</span></th>
                        <th><span>Mata Kuliah</span></th>
                        <th><span>Semester</span></th>
                        <th><span>Aspek</span></th>
                        <th><span>SKS</span></th>

					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['kode_mk']?></td>
								<td><?=$item['mata_pelajaran']?></td>
								<td><?=$item['semester']?></td>
								<td><?=$item['aspek']?></td>
								<td><?=$item['sks']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
