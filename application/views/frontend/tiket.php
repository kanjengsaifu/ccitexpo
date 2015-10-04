<html>
<head></head>
<body style="margin:0px; padding:0px; border: 0 none; font-size: 9px; font-family: verdana, sans-serif; background-color: #efefef;">
  <?php foreach($tiket->result() as $a) { ?>
  <table style="width: 700px; margin: 50px auto 50px auto; border: 1px #ccc solid; background: #fff; font-size: 11px; font-family: verdana, sans-serif;" align="center">
    <tbody>
	<?php foreach($jenis as $b) { ?>
      <tr>
        <td colspan="2" style="word-wrap: break-word; border:0px;padding: 9px; color: #fff; background: <?php if($b==1) echo "#04AB36"; else if($b==2) echo "#F32727"; else if($b==3) echo "#8627F3";?>;">
          <h1 style="margin-bottom:0px;">Tiket <?php if($b==1) echo "Seminar"; else if($b==2) echo "Game"; else if($b==3) echo "Project Competition";?> CCIT EXPO</h1>
          <h4 style="color: #ccc;margin-top:0px;margin-bottom:0px;font-style: italic;"><?php echo $a->judul ?></h4>
        </td>
      </tr>
	<?php } ?>
      <tr style="padding: 10px;">
        <td style="width: 240px; vertical-align: top; padding: 10px 18px 10px 6px">
          <div style="margin:15px 8px 0px 10px;padding: 9px; border: 1px #ccc solid; font-size: 10px;">
            <table>
			<tr>
				<td rowspan="2">
					<img src="<?php echo $this->config->item('uploads')?>barcode/<?php echo $a->qrcode ?>"/>
				</td>
				<td valign="top">
				<strong>Nama Lengkap:</strong> <?php echo $a->firstname ?> <?php echo $a->lastname ?><br />
				<?php if(($b==1)||($b==2)){ ?>
					<strong>Jadwal Acara:</strong> <?php echo $a->tanggal ?>, <?php echo $a->jam_mulai ?> - <?php echo $a->jam_selesai ?><br />
					<strong>Tempat Acara:</strong> <?php echo $a->tempat ?><br />
				<?php }?>
				<?php if($b==3) { ?>
					<strong>Judul:</strong> <?php echo $a->judul ?><br />
					<strong>Nama Ketua :</strong> <?php echo $a->nama_ketua ?><br />
					<strong>Anggota-1  :</strong> <?php echo $a->anggota_1 ?><br />
					<strong>Anggota-2  :</strong> <?php echo $a->anggota_2 ?><br />
					<strong>Desainer   :</strong> <?php echo $a->anggota_3 ?><br />
				<?php } ?>
				<br />
				</td>
			</tr>
			</table>
            <hr style="height: 1px; color: #ccc;" />

            <p style="margin-top:5px;">Tunjukan Tiket ini ketika datang ke acara. Tiket ini dapat anda cetak atau simpan di device anda
            </p>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <?php } ?>
</body>
</html>