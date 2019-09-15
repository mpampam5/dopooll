<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<p>
  <button type="button" class="btn btn-info" name="button" id="refresh-tahanan"><i class="fa fa-refresh"></i> Refresh</button>
  <a href="<?=site_url(config_item("cpanel").'mst_tahanan/tambah')?>" target="_blank" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
</p>
    <table class="table table-bordered table-striped" id="table_tahanan">
        <thead>
            <tr>
                <th>Nik</th>
                <th>Nama</th>
                <th>Tempat tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kebangsaan</th>
                <th></th>
                <th></th>
                <th width="80px">Action</th>
            </tr>
        </thead>
    </table>

<script type="text/javascript">
$(document).ready(function() {
    var t = $("#table_tahanan").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#table_tahanan_filter input')
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
        ajax: {"url": '<?=base_url(config_item("cpanel")."mst_tahanan/json")?>', "type": "POST"},
        columns: [
              {"data": "nik",
               render : function(data,type,row,meta)
               {
                 var str = '<a target="_blank" href="<?=base_url()?>administrator/mst_tahanan/detail/'+row.id_tahanan+'">'+data+'</a>';
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
              {"data": "jenis_kelamin"},
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
                "className" : "text-center",
                render : function(data,type,row,meta)
                {
                  var str = '<button  class="btn btn-sm btn-success btn-block" id="pilih-tahanan" data-url="'+row.id_tahanan+'*'+row.nama+'">Pilih</button>';
                  return str;
                }
            }
        ],
        order: [[6, 'desc']],
    });
});


$(document).on('click', '#pilih-tahanan', function(){
  var str = $(this).data('url');
  var strs = str.split("*");
  $("#ModalGue").modal('hide');
  $("#tahanan").val(strs[1]);
  $("#id_tahanan").val(strs[0]);
});

$(document).on('click', '#refresh-tahanan', function(){
  $('#table_tahanan').DataTable().ajax.reload();
});
</script>
