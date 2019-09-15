

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form" autocomplete="off">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
             <label for="varchar">Nama Polres/Polsek</label>
             <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Polres/Polsek" value="<?php echo $nama; ?>" />
         </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
             <label for="varchar">Telepon</label>
             <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
         </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
             <label for="alamat">Alamat</label>
             <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
         </div>
        </div>
      </div>






<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'ref_polres')?>" class="btn btn-sm btn-default btn-block"> batal</a>
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
                    window.location.href="<?=site_url(config_item("cpanel").'ref_polres')?>";
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
