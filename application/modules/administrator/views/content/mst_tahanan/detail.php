<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail Data <?=$layout_title?></h3>
  </div>

  <div class="box-body">
    <div class="col-lg-12">
      <div class="col-md-3">
        <a href="<?=base_url()?>temp/upload/img/<?php echo $foto; ?>" target="_blank"><img class="img img-responsive img-thumbnail" width="100%" style="max-height:300px" src="<?=base_url()?>temp/upload/img/<?php echo $foto; ?>" alt="<?php echo $foto; ?>"></a>
        <table class="table" style="font-size:11px!important">
          <tr><td>waktu buat</td><td>: <?php echo $created_at; ?></td></tr>
          <tr><td>di buat oleh</td><td>: <?php echo created_update($created_by); ?></td></tr>
          <tr><td>waktu ubah</td><td>: <?php echo $update_at; ?></td></tr>
          <tr><td>di ubah oleh</td><td>: <?php echo created_update($update_by); ?></td></tr>
        </table>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Riwayat Data Tahanan</h3>
          </div>
          <div class="panel-body">
            <table class="table no-bordered">
          	    <tr><th>Nik</th><td>: <?php echo $nik; ?></td></tr>
          	    <tr><th>Nama</th><td>: <?php echo $nama; ?></td></tr>
          	    <tr><th>Tempat, Tanggal Lahir</th><td>: <?php echo $tempat_lahir; ?>, <?php echo date('d-m-Y', strtotime($tgl_lahir)); ?></td></tr>
          	    <tr><th>Jenis Kelamin</th><td>: <?php echo $jenis_kelamin; ?></td></tr>
          	    <tr><th>Kebangsaan</th><td>: <?php echo $kebangsaan; ?></td></tr>
          	    <tr><th>Id Agama</th><td>: <?php echo $id_agama; ?></td></tr>
          	    <tr><th>Pekerjaan</th><td>: <?php echo $pekerjaan; ?></td></tr>
          	    <tr><th>Alamat</th><td>: <?php echo $alamat; ?></td></tr>
          	</table>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->

    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Rekam Medis</h3>
        </div>
        <div class="panel-body">
          <div class="col-sm-12" style="padding:20px;">
            <a href="<?=base_url()?>administrator/trans_rekam_medis/tambah.html?status=ya&id_tahanan=<?=$id_tahanan?>" class="btn btn-sm btn-success"> Tambah Data Rekam Medis</a>
          </div>

          <div class="col-sm-12">
            <table class="table table-stripped table-bordered" id="mytable">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Tanggal Pemeriksaan</th>
                  <th>Di Periksa Oleh</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php $query = $this->db->get_where("trans_rekam_medis",array("id_tahanan"=>$id_tahanan)); ?>
                <?php if ($query->num_rows()>0): ?>
                  <?php foreach ($query->result() as $row): ?>
                    <tr>
                      <td><a href="<?=site_url("administrator/trans_rekam_medis/detail/$row->id")?>"><?=$row->kode?></a></td>
                      <td><?=date("d-m-Y", strtotime($row->tgl_pemeriksaan))?></td>
                      <td><?=form_medis("mst_dokter","id_pemeriksa",$row->id_dokter)?></td>
                      <td class="text-center">
                        <a href='<?=site_url("administrator/trans_rekam_medis/detail/$row->id")?>'> <i class="fa fa-file"></i></a>&nbsp;
                        <a href="<?=site_url("administrator/trans_rekam_medis/edit/$row->id")?>"> <i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="#"> <i class="fa fa-trash"></i></a>&nbsp;
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <a href="javascript:history.go(-1)" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>

<script type="text/javascript">
  $("#mytable").dataTable();
</script>
