

<!-- <link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/responsive.bootstrap.min.css"> -->
<!-- <script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>  -->

<!-- <script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script> -->
<!-- <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script> -->
<!-- <script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script> -->

 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" /> -->
 <!-- <link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" /> -->

<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

<style media="screen">
#mytable tbody tr.selected {
  color: red;
  background-color: #eeeeee;
}

#mytable tbody tr.selected  a{
  color: red;
}

/* #mytable tbody tr {
  border-bottom: 1px solid #d0d0d0;
} */

/* #mytable tbody tr td a{
  color: black!important;
} */

</style>

<div class='box'>
  <div class='box-header with-border'>
    <h3 class='box-title'>Data <?=ucfirst($layout_title)?></h3>
      <div class='box-tools pull-right'>
        <a href='<?=site_url(config_item("cpanel")."mst_tahanan/tambah")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
      </div>
  </div>

    <div class='box-body'>
      <div id='alert'></div>
      <div id="btn-action"></div>
        <table class="table table-bordered nowrap" cellspacing="0" style="width:100%" id="mytable">
            <thead>
                <tr>
            		    <th>Nik</th>
            		    <th>Nama</th>
                    <th>Tempat tgl Lahir</th>
            		    <th>JK</th>
            		    <th>Kebangsaan</th>
                    <th></th>
                    <th></th>
            		    <th width="80px">Action</th>
                </tr>
            </thead>

        </table>
        </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {


                var t = $("#mytable").DataTable({
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
                    select: {
                               style: 'single'
                           },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {"url": '<?=base_url(config_item("cpanel")."mst_tahanan/json")?>', "type": "POST"},
                    columns: [
                          {"data": "nik",
                           render : function(data,type,row,meta)
                           {
                             var str = '<a href="<?=base_url()?>administrator/mst_tahanan/detail/'+row.id_tahanan+'">'+data+'</a>';
                             return str;
                           }
                          },
                          {"data": "nama"},
                          {"data": "tempat_lahir",
                          render : function(data,type,row,meta) {
                            var str = data +',&nbsp;'+row.tgl_lahir;
                            return str;
                          }
                          },
                          {"data": "jenis_kelamin",
                          render : function(data,type,row,meta) {
                            if (data=="pria") {
                              var str ='<i style="color:#ffc107" class="fa fa-male"></i>';
                            }else {
                              var str ='<i style="color:#4caf50" class="fa fa-female"></i>';
                            }

                            return str;
                          }
                          },
                          {"data": "kebangsaan"},
                          {"data": "tgl_lahir",
                           "visible":false
                          },
                          {"data": "id_tahanan",
                           "visible": false
                          },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                });

                  // $('#mytable tbody').on( 'click','tr', function () {
                  //   var data = t.row( this ).data();
                  //
                  //   var str = '<a href="'+data["nik"]+'" class="btn btn-info"> Detail</a>';
                  //
                  //   $("#btn-action").html(str);
                  //
                  //   });

              //   $('#mytable tbody').on('click', 'tr', function () {
              //
              // } );

            });





            $(document).on('click', '#hapus', function(e){
             e.preventDefault();
             var Link = $(this).attr('href');
             testAnim("zoomIn");
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').addClass('modal-sm');
             $('#ModalHeader').html('Konfirmasi');
             $('#ModalContent').html('Apakah anda yakin ingin Menghapus?');
             $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='ya-hapus' id='ya-hapus'  data-url='"+Link+"'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
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

           // MODAL TAMBAH
           // $(document).on('click', '#tambah', function(e){
           //     e.preventDefault();
           //     testAnim("zoomIn");
           //     $('.modal-dialog').removeClass('modal-lg');
           //     $('.modal-dialog').removeClass('modal-sm');
           //     $('.modal-dialog').addClass('modal-md');
           //     $('#ModalHeader').html('');
           //     $('#ModalContent').load($(this).attr('href'));
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
