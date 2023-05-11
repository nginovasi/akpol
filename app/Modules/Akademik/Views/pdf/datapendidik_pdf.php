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
			<h4 align="center" style="text-decoration: underline;" >DATA PENDIDIK</h4>
		</div>
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th><span>#</span></th>
                        <th><span>NRP</span></th>
                        <th><span>NIK</span></th>
                        <th><span>NAMA</span></th>

					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['nrp']?></td>
								<td><?=$item['nik']?></td>
								<td><?=$item['namagadik']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
