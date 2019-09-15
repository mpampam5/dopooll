

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." data ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form" autocomplete="off">

        <div class="col-md-6">
          <div class="form-group">
             <label for="varchar">Nik</label>
             <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
             <?php if ($button=="edit"): ?>
               <input type="hidden" name="nik_hidden" value="<?php echo $nik; ?>">
             <?php endif; ?>
         </div>

          <div class="form-group">
             <label for="varchar">Nama</label>
             <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
         </div>

          <div class="form-group">
             <label for="varchar">Tempat Lahir</label>
             <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
         </div>

          <div class="form-group">
             <label for="date">Tanggal Lahir</label>
             <input type="text" class="form-control datepicker" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
         </div>

          <div class="form-group">
             <label for="enum">Jenis Kelamin</label>
             <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
               <?php if ($button=="tambah"): ?>
                 <option value="">--Pilih--</option>
               <?php endif; ?>
               <option value="pria" <?=($jenis_kelamin=="pria")?"selected":"" ?> >Pria</option>
               <option value="wanita" <?=($jenis_kelamin=="wanita")?"selected":"" ?> >Wanita</option>
             </select>
          </div>

          <div class="form-group">
              <label for="varchar">Pekerjaan</label>
              <?=cmb_dinamis("pekerjaan","pekerjaan","ref_pekerjaan","pekerjaan","id_perkerjaan",$pekerjaan)?>
          </div>





        </div><!-- col-md-6 -->

        <div class="col-md-6">
          <div class="form-group">
             <label for="enum">Kebangsaan</label>
             <select class="form-control" name="kebangsaan" id="kebangsaan">
               <?php if ($button=="tambah"): ?>
                 <option value="">--Pilih--</option>
               <?php endif; ?>
               <option value="WNI" <?=($kebangsaan=="WNI")?"selected":"" ?> >WNI</option>
               <option value="WNA" <?=($kebangsaan=="WNA")?"selected":"" ?> >WNA</option>
             </select>

         </div>

          <div class="form-group">
             <label for="int">Agama</label>
             <?=cmb_dinamis("id_agama","id_agama","ref_agama","agama","id_agama",$id_agama)?> <!-- $id,$name,$table,$field,$pk,$selected -->

         </div>

          <div class="form-group">
             <label for="alamat">Alamat</label>
             <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
         </div>

         <div class="form-group">
             <label>Gambar</label>
             <div class="input-group">
                 <div class="input-group-btn">
                   <a  id="browse" class="btn btn-primary fancy" href="<?=directory('admin_dir')?>plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=ok&lang=en_EN&akey=mpampamkeys" data-fancybox-type="iframe">Browse</a>
                 </div>
               <input type="text" class="form-control" name="foto" id="foto" placeholder="foto" value="<?php echo $foto; ?>">
               <input type="hidden" name="ok" id="ok">
             </div>
          </div>
        </div>







        <div class="col-lg-12" style="border-top:2px solid #b3aeae;padding:20px;">
            <div class="col-md-6" style="padding:10px;">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'mst_tahanan')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6" style="padding:10px;">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">

function responsive_filemanager_callback(field_id){
    var image = $('#'+field_id).val();
    var string = image;
    var str = string.replace("<?=base_url()?>temp/upload/img/","");
    $('#foto').attr('value',str);
  }


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
                    window.location.href="<?=site_url(config_item("cpanel").'mst_tahanan')?>";
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
