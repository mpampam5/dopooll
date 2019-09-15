<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered">
  	    <tr><th>Nik</th><th><?php echo $nik; ?></th></tr>
  	    <tr><th>Nama</th><th><?php echo $nama; ?></th></tr>
  	    <tr><th>Tempat, Tanggal Lahir</th><th><?php echo $tempat_lhr; ?>, <?=date('d-m-Y',strtotime($tgl_lhr))?></th></tr>
  	    <tr><th>Telepon</th><th><?php echo $telepon; ?></th></tr>
  	    <tr><th>Alamat</th><th><?php echo $alamat; ?></th></tr>
  	    <tr><th>Alumni</th><th><?php echo $alumni; ?></th></tr>
  	</table>

      <!-- MODAL ClOSE -->
      <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button>
      <!-- <a href="<?=site_url(config_item("cpanel").'mst_dokter')?>" class="btn btn-default btn-sm"> Kembali</a> -->
  </div>
</div>
