<div class="row">
  <div class="col-lg-12">
    <div id="pesan"></div>
    <form id="form" action="<?=$aksi?>">
      <div class="form-group">
        <label for="">Foto Dokumentasi
          <?php if ($button=="edit"): ?>
            <?php if ($userfile!=""): ?>
              <a href="<?=base_url()?>temp/upload/img/<?=$userfile?>" target="_blank"> (Foto sebelumnya)</a>
            <?php endif; ?>
          <?php endif; ?>
        </label>
        <input type="file" class="form-control"name="userfile" >
        <input type="hidden" name="userfile" value="<?=$userfile?>">
        <div id="userfile"></div>
      </div>

      <div class="form-group">
        <label for="">Jenis Luka</label>
        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Luka" value="<?=$jenis?>">
      </div>

      <div class="form-group">
        <label for="">Posisi Luka</label>
        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi Luka" value="<?=$posisi?>">
      </div>

      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="5" class="form-control" placeholder="Keterangan"><?=$keterangan?></textarea>
      </div>

      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label="Close">tutup</button>
      <button type="submit" class="btn btn-sm btn-success" name="submit" id="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..."> <?=$button?></button>
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
               // $('body,html').animate({ scrollTop: 0 }, 'slow');
              $('.alert-success').delay(500).show(10, function(){
                $('.alert-success').delay(2000).hide(10, function(){
                    $("#ModalGue").modal('hide');
                    $('#mytables').DataTable().ajax.reload();
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
