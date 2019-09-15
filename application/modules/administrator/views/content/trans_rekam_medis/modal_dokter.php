
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<p><button type="button" class="btn btn-info" name="button" id="refresh-dokter"><i class="fa fa-refresh"></i> Refresh</button> <a href="<?=site_url(config_item("cpanel").'mst_dokter/tambah')?>" target="_blank" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a></p>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th></th>
            		    <th>Nik</th>
            		    <th>Nama</th>
            		    <th>Pilih</th>
                </tr>
            </thead>

        </table>

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
                    ajax: {"url": '<?=base_url(config_item("cpanel")."mst_dokter/json")?>', "type": "POST"},
                    columns: [
                        {
                            "data": "id_pemeriksa",
                            "visible": false
                        },{"data": "nik"},{"data": "nama"},
                        {
                            "data" : "action",
                            "orderable": false,
                            render : function(data,type,row)
                            {
                              var str = '<button  class="btn btn-sm btn-success btn-block" id="pilih-dokter" data-url="'+row.id_pemeriksa+'*'+row.nama+'">Pilih</button>';
                              return str;
                            }
                        }
                    ],
                    order: [[0, 'desc']],
                });
            });


            $(document).on('click', '#pilih-dokter', function(e){
              var str = $(this).data('url');
              var strs = str.split("*");
              $("#ModalGue").modal('hide');
              $("#dokter").val(strs[1]);
              $("#id_dokter").val(strs[0]);
            });


            $(document).on('click', '#refresh-dokter', function(e){
              $('#mytable').DataTable().ajax.reload();
            });

        </script>
