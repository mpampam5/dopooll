<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/select2/select2.min.css">
<script src="<?=directory('admin_dir')?>plugins/select2/select2.full.min.js"></script>

<style media="screen">
  .datepicker{border-radius: 0!important}
  .select2-container--default .select2-selection--single{
    border-radius: 0!important;
    height: 34px!important;
  }
</style>
<!-- tambahkan riwayat dari data tahanan -->
<?php if (!empty($_GET)): ?>
  <?php if ($_GET['status'] == 'ya'): ?>
    <?php $id_tahanan = $_GET['id_tahanan'];
          $tahanan = form_medis("mst_tahanan","id_tahanan",$_GET['id_tahanan']) ?>
  <?php endif; ?>
<?php endif; ?>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <p><b>Kode </b>: <?php echo $kode; ?></p>
      <form action="<?=$aksi?>" id="form" autocomplete="off">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default" style="background-color:#d2d6de;">
              <div class="panel-body">
                <div class="col-md-6">
                  <input type="hidden" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                 <div class="form-group">
                    <label for="datetime">Tanggal Pemeriksaan *</label>
                    <input type="text" class="form-control datepicker" name="tgl_pemeriksaan" id="tgl_pemeriksaan" placeholder="Tanggal Pemeriksaan" value="<?php echo $tgl_pemeriksaan; ?>" />
                </div>


                 <div class="form-group">
                   <label for="">Tahanan *</label>
                   <div class="input-group">
                    <input type="text" class="form-control" name="tahanan" id="tahanan" placeholder="Tahanan" disabled value="<?php echo $tahanan; ?>" />
                    <span class="input-group-btn">
                      <button class="btn btn-info" id="modal_tahanan" type="button">Tambahkan</button>
                    </span>
                  </div><!-- /input-group -->
                  <input type="hidden" class="form-control" name="id_tahanan" id="id_tahanan" placeholder="Tahanan" value="<?php echo $id_tahanan; ?>" />
                 </div>



                <div class="form-group">
                  <label for="">Dokter/Pemeriksa *</label>
                  <div class="input-group">
                   <input type="text" class="form-control" name="dokter" id="dokter" placeholder="Dokter/Pemeriksa" disabled value="<?php echo $dokter; ?>" />
                   <span class="input-group-btn">
                     <button class="btn btn-info" id="modal_dokter" type="button">Tambahkan</button>
                   </span>
                 </div><!-- /input-group -->
                 <input type="hidden" class="form-control" name="id_dokter" id="id_dokter" placeholder="Dokter/Pemeriksa" value="<?php echo $id_dokter; ?>" />
                </div>
              </div>

                <div class="col-md-6">

                <div class="form-group">
                  <label for="">Rutan Polsek/Polres*</label>
                  <?=cmb_dinamis_custom_polsek("rutan","rutan","ref_polres","nama","id_pol",$rutan)?>
                  </div>

                <div class="form-group">
                  <label for="">Tanggal Masuk Rutan *</label>
                  <input type="text" class="form-control datepicker" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Masuk Rutan" value="<?php echo $tgl_masuk; ?>">
                </div>

                <div class="form-group">
                  <label for="">Perkara (Pasal) *</label>
                  <input type="text" class="form-control" id="perkara" name="perkara" placeholder="Pasal" value="<?php echo $perkara; ?>">
                </div>

                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
               <label for="int">Tinggi Badan (Cm) *</label>
               <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
           </div>

            <div class="form-group">
               <label for="int">Berat Badan (Kg) *</label>
               <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
           </div>

            <div class="form-group">
               <label for="float">Suhu Badan (&#8451;) *</label>
               <input type="text" class="form-control" name="suhu_badan" id="suhu_badan" placeholder="Suhu Badan" value="<?php echo $suhu_badan; ?>" />
           </div>

            <div class="form-group">
               <label for="int">Tensi Darah (MnHg) *</label>
               <input type="text" class="form-control" name="tensi_darah" id="tensi_darah" placeholder="Tensi Darah" value="<?php echo $tensi_darah; ?>" />
           </div>

            <div class="form-group">
               <label for="int">Denyut Nadi (x/Menit) *</label>
               <input type="text" class="form-control" name="denyut_nadi" id="denyut_nadi" placeholder="Denyut Nadi" value="<?php echo $denyut_nadi; ?>" />
           </div>

            <div class="form-group">
               <label for="int">Pernapasan (x/Menit) *</label>
               <input type="text" class="form-control" name="pernapasan" id="pernapasan" placeholder="Pernapasan" value="<?php echo $pernapasan; ?>" />
           </div>

           <div class="form-group">
              <label for="enum">Pemeriksaan Tubuh *</label>
              <select class="form-control" name="pemeriksaan_tubuh" id="pemeriksaan_tubuh" >
                <?php if ($button=="tambah"): ?>
                  <option value="">--Pilihan--</option>
                <?php endif; ?>

                  <option value="ada luka" <?=($pemeriksaan_tubuh=="ada luka")?"selected":""?>>Ada luka</option>
                  <option value="tidak ada luka" <?=($pemeriksaan_tubuh=="tidak ada luka")?"selected":""?> >Tidak ada luka</option>
              </select>
          </div>
          </div>



          <div class="col-lg-6">
            <div class="form-group">
               <label for="riwayat_penyakit">Riwayat Penyakit</label>
               <textarea class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" placeholder="Riwayat Penyakit"><?php echo $riwayat_penyakit; ?></textarea>
           </div>

            <div class="form-group">
               <label for="keluhan">Keluhan</label>
               <textarea class="form-control" rows="4" name="keluhan" id="keluhan" placeholder="Keluhan"><?php echo $keluhan; ?></textarea>
           </div>

            <div class="form-group">
               <label for="therapi">Therapi</label>
               <textarea class="form-control" rows="3" name="therapi" id="therapi" placeholder="Therapi"><?php echo $therapi; ?></textarea>
           </div>

            <div class="form-group">
               <label for="usulan">Usulan</label>
               <textarea class="form-control" rows="5" name="usulan" id="usulan" placeholder="Usulan"><?php echo $usulan; ?></textarea>
           </div>
          </div>
        </div>



<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="javascript:history.go(-1)" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">

  $(function(){
    $('.select2').select2();
  });



  $("#form").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled',true)
                .button('loading');

    $.ajax({
          url             : me.attr('action'),
          type            : 'post',
          data            :  new FormData(this),
          contentType     : false,
          cache           : false,
          dataType        : 'JSON',
          processData     :false,
          success:function(json){
            if (json.success==true) {
              $('#pesan').append('<div class="alert alert-success">'+
                                  '<span class="fa fa-envelope-o"></span> '+
                                  json.alert+
                                  '<div>');
                $('.form-group').removeClass('.has-error')
                                .removeClass('.has-success');
                $('.text-danger').remove();
                 $('body,html').animate({ scrollTop: 0 }, 'slow');
                $('.alert-success').delay(500).show(10, function(){
                  $('.alert-success').delay(5000).hide(10, function(){
                    $('.alert-success').remove();
                      // history.back();
                      window.location.href="detail/"+json.id_rekam_medis;
                  });
                })
            }else {
              $.each(json.alert, function(key, value) {
                var element = $('#' + key);
                $('#submit').button('reset');
                $(element)
                .closest('.form-group')
                .find('.text-danger').remove();
                $(element).after(value);
              });
            }
          }
    });
  });

  $(document).on('click', '#modal_tahanan', function(e){
      e.preventDefault();
      $('.modal-dialog').removeClass('modal-sm');
      $('.modal-dialog').removeClass('modal-md');
      $('.modal-dialog').addClass('modal-lg');
      $('#ModalHeader').html('Data tahanan');
      $('#ModalContent').load("<?=base_url()?>administrator/trans_rekam_medis/modal_tahanan");
      $('#ModalGue').modal('show');
    });


    $(document).on('click', '#modal_dokter', function(e){
        e.preventDefault();
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').removeClass('modal-md');
        $('.modal-dialog').addClass('modal-lg');
        $('#ModalHeader').html('Data Pemeriksa');
        $('#ModalContent').load("<?=base_url()?>administrator/trans_rekam_medis/modal_dokter");
        $('#ModalGue').modal('show');
      });
  </script>
