
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<style media="screen">
  #mytable tbody{
    font-size: 13px;
  }

</style>
<div class='box'>
  <div class='box-header with-border'>
    <h3 class='box-title'>Modul <?=ucfirst($layout_title)?></h3>
      <div class='box-tools pull-right'>
        <!-- <a href="#" id="scanqr">scan barcode</a> -->
        <a href='<?=site_url(config_item("cpanel")."trans_rekam_medis/tambah")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
      </div>
  </div>

    <div class='box-body'>
      <div id='alert'></div>

          <table class="table table-bordered" id="mytable" style="width: 100%;">
              <thead>
                  <tr>
                    <th></th>
                    <th > DATA</th>
                    <th > </th>
              		    <th></th>
                      <th></th>
                      <th width="0"></th>
              		    <th width="0"></th>
              		    <th width="0"></th>
              		    <th width="0"></th>
                      <th width="0"></th>
                      <th width="0"></th>
                      <th width="0"></th>
                      <th></th>
                  </tr>
              </thead>
          </table>

        </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": '<?=base_url(config_item("cpanel")."trans_rekam_medis/json")?>', "type": "POST"},
                    columns: [
                      {
                        "data": "id",
                        "visible":false
                      },
                        {"data": "id_tahanan",
                          "orderable":false,
                          render : function(data,type,row,meta)
                          {
                            var str = '<div class="row">'+
                                      '<div class="col-lg-12">'+
                                      '<table class="table-trans no-bordered">'+
                                      '<tr><th>Nik</th><td>: '+row.nik+'</td></tr>'+
                                      '<tr><th>Nama Tahanan</th><td>: <a target="_blank" href="mst_tahanan/detail/'+row.id_tahanan+'">'+row.tahanan+'</a></td></tr>'+
                                      '<tr><th>Nama Pemeriksa</th><td>: <a id="detail_dokter" href="mst_dokter/detail/'+row.id_dokter+'">'+row.dokter+'</a></td></tr>'+
                                      '<tr><th>Waktu Pemeriksaan</th><td>: '+row.tgl_pemeriksaan+'</td></tr>'+
                                      '</table>'+
                                      '</div>'+
                                      '</div>';
                            return str;
                          }
                        },
                        {
                          "data": "id_dokter",
                          "orderable":false,
                          render : function(data,type,row,meta)
                          {
                            var str = '<div class="row">'+
                                      '<div class="col-lg-12">'+
                                      '<table class="table-trans no-bordered" >'+
                                      '<tr><th>Kode-RM</th><td>: '+row.kode+'</td></tr>'+
                                      '<tr><th>Rutan Polres/Polsek</th><td>: <a href="ref_polres/detail/'+row.rutan+'.html" id="detail_polres">'+row.nama_rutan+'</a></td></tr>'+
                                      '<tr><th>Perkara/Pasal</th><td>: '+row.perkara+'</td></tr>'+
                                      '<tr><th>Tanggal Masuk Rutan</th><td>: '+row.tgl_masuk+'</td></tr>'+
                                      '<tr><th></th><td></td></tr>'+
                                      '</table>'+
                                      '</div>'+
                                      '</div>';
                            return str;
                          }
                        },
                        {
                          "data": "kode",
                          "visible":false
                        },
                        {
                          "data": "tahanan",
                          "visible":false
                        },
                        {
                          "data": "nik",
                          "visible":false
                        },
                        {
                          "data": "dokter",
                          "visible":false
                        },
                        {
                          "data": "tgl_pemeriksaan",
                          "visible":false
                        },
                        {
                          "data": "perkara",
                          "visible":false
                        },
                        {
                          "data": "tgl_masuk",
                          "visible":false
                        },
                        {
                          "data": "nama_rutan",
                          "visible":false
                        },
                        {
                          "data": "rutan",
                          "visible":false
                        },
                        {
                            "data" : "action",
                            "orderable":false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'DESC']],
                });
            });

            $(document).on('click', '#hapus', function(e){
             e.preventDefault();
             var Link = $(this).attr('href');
             testAnim("zoomIn");
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').addClass('modal-sm');
             $('#ModalHeader').html('Konfirmasi');
             $('#ModalContent').html('Apakah anda yakin ingin Menghapus?');
             $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='ya-hapus'  data-url='"+Link+"'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
             $('#ModalGue').modal('show');
           });

           $(document).on('click', '#ya-hapus', function(e){
             e.preventDefault();

             $.ajax({
               url: $(this).data('url'),
               type: "POST",
               cache: false,
               dataType:'json',
               success: function(data){
                 $('.alert-success').remove();
                 $("#ModalGue").modal('hide');
                 $('#alert').append('<div id="alert" class="alert alert-success">'+
                                   data.alert+
                                   '<div>');
                  $('#mytable').DataTable().ajax.reload();
                 $('.alert-success').delay(500).show(10, function(){
                   $('.alert-success').delay(5000).hide(10, function(){
                     $('.alert-success').remove();

                   });
                 })
               }
             });
           });

           $(document).on('click', '#detail_dokter', function(e){
               e.preventDefault();
               testAnim("zoomIn");
               $('.modal-dialog').removeClass('modal-lg');
               $('.modal-dialog').removeClass('modal-sm');
               $('.modal-dialog').addClass('modal-md');
               $('#ModalHeader').html('Detail Data Pemeriksa');
               $('#ModalContent').load($(this).attr('href'));
               $('#ModalGue').modal('show');
             });

             $(document).on('click', '#detail_polres', function(e){
                 e.preventDefault();
                 testAnim("zoomIn");
                 $('.modal-dialog').removeClass('modal-lg');
                 $('.modal-dialog').removeClass('modal-sm');
                 $('.modal-dialog').addClass('modal-md');
                 $('#ModalHeader').html('Detail Data Polres/Polsek');
                 $('#ModalContent').load($(this).attr('href'));
                 $('#ModalGue').modal('show');
               });

           // MODAL TAMBAH
           // $(document).on('click', '#scanqr', function(e){
           //     e.preventDefault();
           //     $('.modal-dialog').removeClass('modal-sm');
           //     $('.modal-dialog').removeClass('modal-md');
           //     $('.modal-dialog').addClass('modal-lg');
           //     $('#ModalHeader').html('Data tahanan');
           //     $('#ModalContent').load("<?=base_url()?>administrator/trans_rekam_medis/scanqr");
           //     $('#ModalGue').modal('show');
           //   });
           //
           //   MODAL EDIT
           //   $(document).on('click', '#edit', function(e){
           //       e.preventDefault();
           //       testAnim("zoomIn");
           //       $('.modal-dialog').removeClass('modal-lg');
           //       $('.modal-dialog').removeClass('modal-sm');
           //       $('.modal-dialog').addClass('modal-md');
           //       $('#ModalHeader').html('');
           //       $('#ModalContent').load($(this).attr('href'));
           //       $('#ModalGue').modal('show');
           //     });
           //
           //   MODAL DETAIL
           //   $(document).on('click', '#detail', function(e){
           //       e.preventDefault();
           //       testAnim("zoomIn");
           //       $('.modal-dialog').removeClass('modal-lg');
           //       $('.modal-dialog').removeClass('modal-sm');
           //       $('.modal-dialog').addClass('modal-md');
           //       $('#ModalHeader').html('');
           //       $('#ModalContent').load($(this).attr('href'));
           //       $('#ModalGue').modal('show');
           //     });

        </script>
