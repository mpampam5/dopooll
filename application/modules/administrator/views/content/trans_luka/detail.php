
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Id Rekam Medik</td><td><?php echo $id_rekam_medik; ?></td></tr>
	    <tr><td>Jenis Luka</td><td><?php echo $jenis_luka; ?></td></tr>
	    <tr><td>Posisi Luka</td><td><?php echo $posisi_luka; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Update By</td><td><?php echo $update_by; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url(config_item("cpanel").'trans_luka')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
