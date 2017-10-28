<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=export.xls");
?>
<table border="1">
	<tr>
		<th>Nama</th>
		<th>Nomor WhatsApp</th>
	</tr>
  <?php foreach ($pengirim as $key) { ?>
  <tr>
    <td><?php echo $key->nama;?></td>
    <td>'<?php echo $key->no_wa;?></td>
  </tr>
<?php } ?>
</table>
