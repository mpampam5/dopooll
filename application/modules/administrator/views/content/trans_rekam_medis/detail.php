
<div class="box">
  <div class="box-header with-border">
    <div class="pull-left">
      <h3 class="box-title">Detail <?=$layout_title?></h3>
    </div>

    <div class="pull-right">
      <a href="#" class="btn btn-sm btn-info"><i class="fa fa-print"></i> Cetak</a>
    </div>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td>Tahanan</td><td><?php echo $tahanan; ?></td></tr>
	    <tr><td>Di Periksa Oleh</td><td><?php echo $dokter; ?></td></tr>
	    <tr><td>Tgl Pemeriksaan</td><td><?php echo $tgl_pemeriksaan; ?></td></tr>
	    <tr><td>Tinggi Badan</td><td><?php echo $tinggi_badan; ?></td></tr>
	    <tr><td>Berat Badan</td><td><?php echo $berat_badan; ?></td></tr>
	    <tr><td>Suhu Badan</td><td><?php echo $suhu_badan; ?></td></tr>
	    <tr><td>Tensi Darah</td><td><?php echo $tensi_darah; ?></td></tr>
	    <tr><td>Denyut Nadi</td><td><?php echo $denyut_nadi; ?></td></tr>
	    <tr><td>Pernapasan</td><td><?php echo $pernapasan; ?></td></tr>
	    <tr><td>Riwayat Penyakit</td><td><?php echo $riwayat_penyakit; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td>Pemeriksaan Tubuh</td><td><?php echo $pemeriksaan_tubuh; ?></td></tr>
	    <tr><td>Therapi</td><td><?php echo $therapi; ?></td></tr>
	    <tr><td>Usulan</td><td><?php echo $usulan; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Update By</td><td><?php echo $update_by; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="javascript:history.go(-1)" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
