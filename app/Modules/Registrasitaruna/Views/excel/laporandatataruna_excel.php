<?php

	ob_end_clean();
	header( "Content-type: application/vnd.ms-excel" );
	header('Content-Disposition: attachment; filename="'. $nama_file.'.xls"');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	ob_end_clean();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Daruna</title>
</head>
<body>

	<table>
		<tr>
			<td><img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" style="width: 30px;" ></td>
		</tr>
	</table>
	<div class="">
		<h4 align="center" style="text-decoration: underline;" >Data Taruna</h4>
		<h4 align="center" >Batalyon <?=$_GET['nama_batalyon']?> - <?=$_GET['thun_batalyon']?> </h4>
	</div>
	<br>
	<br>
	<small>Download date : <?=date("d M Y H:i:s")?></small>
	<table width="100%" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelompok</th>
				<th>Nama</th>
				<th width="500px">NO AK Short</th>
				<th>NO AK Long</th>
				<th>NIK</th>
				<th>Jenis Kelamin</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Suku</th>
				<th>Agama</th>
				<th>No Telp</th>
				<th>Email</th>
				<th>Batalyon</th>
				<th>Kompi</th>
				<th>Peleton</th>
				<th>Semester</th>
				<th>Alamat</th>
				<th>Provinsi</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Kelurahan</th>
				<th>Asal Pengiriman</th>
				<th>Prestasi</th>
				<th>Nama Asal Sekolah</th>
				<th>Tahun Lulus</th>
				<th>Jurusan</th>
			</tr>
		</thead>

			<?php
				$no = 0;
				foreach ($data as $item) { $no++; ?>
					<tr>
						<td><?=$no?></td>
						<td><?=$item['nama_kelompok']?></td>
						<td><?=$item['namataruna']?></td>
						<td>'<?=$item['noakshort']?></td>
						<td>'<?=$item['noaklong']?></td>
						<td>'<?=$item['nik']?></td>
						<td><?=$item['id_gender']==1? 'Laki Laki' : 'Perempuan'?></td>
						<td><?=$item['nama_lokasi_lahir']?></td>
						<td>'<?=$item['tglhr']?></td>
						<td><?=$item['nama_suku']?></td>
						<td><?=$item['nama_agama']?></td>
						<td>'<?=$item['telp']?></td>
						<td><?=$item['email']?></td>
						<td><?=$item['nama_batalyon']?></td>
						<td><?=$item['nama_kompi']?></td>
						<td><?=$item['nama_peleton']?></td>
						<td><?=$item['nama_semester']?></td>
						<td><?=$item['alamat_ktp']?></td>
						<td><?=$item['nama_prov_ktp']?></td>
						<td><?=$item['nama_kota_kab_ktp']?></td>
						<td><?=$item['nama_kec_ktp']?></td>
						<td><?=$item['nama_kel_ktp']?></td>
						<td><?=$item['asal_pengiriman']?></td>
						<td><?=$item['prestasi']?></td>
						<td><?=$item['nama_slta']?></td>
						<td><?=$item['thn_lulus']?></td>
						<td><?=$item['jurusan_slta']?></td>
					</tr>
				<?php }
			?>

	
	</table>



	
</body>
</html>