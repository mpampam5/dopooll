

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						 <div class="form-group">
                <label for="int">Id Rekam Medik</label>
                <input type="text" class="form-control" name="id_rekam_medik" id="id_rekam_medik" placeholder="Id Rekam Medik" value="<?php echo $id_rekam_medik; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Jenis Luka</label>
                <input type="text" class="form-control" name="jenis_luka" id="jenis_luka" placeholder="Jenis Luka" value="<?php echo $jenis_luka; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Posisi Luka</label>
                <input type="text" class="form-control" name="posisi_luka" id="posisi_luka" placeholder="Posisi Luka" value="<?php echo $posisi_luka; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Foto</label>
                <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
            </div>

						 <div class="form-group">
                <label for="datetime">Created At</label>
                <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
            </div>

						 <div class="form-group">
                <label for="datetime">Update At</label>
                <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
            </div>

						 <div class="form-group">
                <label for="int">Created By</label>
                <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
            </div>

						 <div class="form-group">
                <label for="int">Update By</label>
                <input type="text" class="form-control" name="update_by" id="update_by" placeholder="Update By" value="<?php echo $update_by; ?>" />
            </div>
<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'trans_luka')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">
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
                    window.location.href="<?=site_url(config_item("cpanel").'trans_luka')?>";
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
  </script>