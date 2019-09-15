<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           Detail Data Rekam Medis Tahanan
          <small class="pull-right">Kode: <?=$kode?></small>
        </h2>
      </div>
      <!-- /.col -->

      <div class="col-xs-12" style="margin-bottom:3px;">
        <a href="<?=base_url()?>administrator/trans_rekam_medis/cetak/<?=$id_rekam_medis?>" target="_blank" class="pull-right btn btn-info btn-xs"> <i class="fa fa-print"></i> Cetak</a>
      </div>

    </div>

    <!-- info row -->
    <div class="row invoice-info">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-sm-2 invoice-col">
              <a href="<?=base_url()?>temp/upload/img/<?php echo $foto; ?>" target="_blank"><img class="img img-responsive img-thumbnail" width="100%" style="max-height:200px" src="<?=base_url()?>temp/upload/img/<?php echo $foto; ?>" alt="<?php echo $foto; ?>"></a>
          </div>

          <div class="col-sm-4 invoice-col">
            <table>
              <tr>
                <th>Nik/No.identitas</th>
                <td>: <?=$nik_tahanan?></td>
              </tr>

              <tr>
                <th>Nama</th>
                <td>: <?=$tahanan?></td>
              </tr>

              <tr>
                <th>Tempat, Tgl lahir</th>
                <td>: <?=$lahir?>, &nbsp;<?=date("d-m-Y", strtotime($tgl_lahir))?> </td>
              </tr>

              <tr>
                <th>Umur</th>
                <td>: <?=hitung_umur($tgl_lahir)?> Tahun</td>
              </tr>

              <tr>
                <th>Jenis kelamin</th>
                <td>: <?=$jenis_kelamin?></td>
              </tr>

              <tr>
                <th>Pekerjaan</th>
                <td>: <?=$pekerjaan?></td>
              </tr>

              <tr>
                <th>Agama</th>
                <td>: <?=$agama?></td>
              </tr>

              <tr>
                <th>Alamat</th>
                <td>: <?=$alamat?></td>
              </tr>

              <tr>
                <th>Kebangsaan</th>
                <td>: <?=$kebangsaan?></td>
              </tr>

            </table>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <table>
              <tr>
                <th> Di periksa pada tanggal</th>
                <td>: <?=date("d-m-Y", strtotime($tgl_pemeriksaan))?></td>
              </tr>

              <tr>
                <th> Di periksa oleh</th>
                <td>: <a id="detail_dokter" href="<?=site_url('administrator/mst_dokter/detail/'.$id_dokter)?>"><?=$dokter?></a></td>
              </tr>

              <tr>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>

              <tr>
                <th> Rutan Polres/Polsek</th>
                <td>: <a href="<?=site_url('administrator/ref_polres/detail/'.$rutan)?>" id="detail_polres"><?=$nama_rutan?></a></td>
              </tr>

              <tr>
                <th> Perkara (Pasal)</th>
                <td>: <?=$perkara?></td>
              </tr>

              <tr>
                <th> Tanggal Masuk Rutan</th>
                <td>: <?=date("d-m-Y", strtotime($tgl_masuk))?></td>
              </tr>

            </table>

          </div>
          <!-- /.col -->
          <div class="col-sm-2 invoice-col">
            <img src="<?=base_url()?>temp/barcode/<?=$kode?>.png" alt="kode">
          </div>

        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-bordered">
          <tbody>
          <tr>
            <th style="width:200px;">Tinggi Badan (Cm)</th>
            <td>: <?=$tinggi_badan?> Cm</td>
          </tr>

          <tr>
            <th>Berat Badan (Kg)</th>
            <td>: <?=$berat_badan?> Kg</td>
          </tr>

          <tr>
            <th>Suhu Badan (&#8451;)</th>
            <td>: <?=$suhu_badan?> &#8451;</td>
          </tr>

          <tr>
            <th>Tensi Darah (MnHg)</th>
            <td>: <?=$tensi_darah?> MnHg</td>
          </tr>

          <tr>
            <th>Denyut Nadi (x/Menit)</th>
            <td>: <?=$denyut_nadi?> /menit</td>
          </tr>

          <tr>
            <th>Pernapasan (x/Menit)</th>
            <td>: <?=$pernapasan?> /menit</td>
          </tr>

          <tr>
            <th>Riwayat Penyakit</th>
            <td>: <?=$riwayat_penyakit?></td>
          </tr>

          <tr>
            <th>Keluhan</th>
            <td>: <?=$keluhan?></td>
          </tr>

          <tr>
            <th>Therapi</th>
            <td>: <?=$therapi?></td>
          </tr>

          <tr>
            <th>Pemeriksaan Tubuh</th>
            <td>: <?=$pemeriksaan_tubuh?></td>
          </tr>

          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <?php if ($pemeriksaan_tubuh=="ada luka"): ?>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="col-sm-12" style="padding:10px;border-bottom:1px solid #e0e0e0">
              <div class="pull-left">
                <h3 class="panel-title">Dokumentasi Pemeriksaan Tubuh</h3>
              </div>

              <div class="pull-right">
                <a href="<?=site_url("administrator/trans_rekam_medis/modal_tambah_luka/$id_rekam_medis")?>" id="tambah_luka" class="btn btn-success btn-xs"> Tambah </a>
              </div>

            </div>
            <div class="panel-body">
              <div class="col-lg-12" style="margin-top:30px;">
                <div id="alert"></div>
                <table class="table table-bordered" style="width:100%;" id="mytables">
                  <thead>
                    <th></th>
                    <th>Foto</th>
                    <th>Jenis Luka</th>
                    <th>Posisi</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- /.row -->
  </section>


<script type="text/javascript">

$(document).ready(function() {

    var t = $("#mytables").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#mytables_filter input')
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
        ajax: {"url": '<?=base_url(config_item("cpanel")."trans_rekam_medis/luka_json/$id_rekam_medis")?>', "type": "POST"},
        columns: [
          {
            "data": "id",
            "visible":false
          },
              {"data": "foto",
                render:function(data)
                {
                  if (data==null || data=="") {
                    return 'Tidak Ada Foto';
                  }else {
                    return '<a href="<?=base_url()?>temp/upload/img/'+data+'" target="_blank">'+data+'</a>';
                  }
                }
              },
              {"data": "jenis_luka"},
              {"data": "posisi_luka"},
              {"data": "keterangan"},
            {
                "data" : "action",
                "orderable":false,
                "className" : "text-center"
            }
        ],
        order: [[0, 'DESC']],
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

    $(document).on('click', '#tambah_luka', function(e){
        e.preventDefault();
        testAnim("zoomIn");
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
        $('#ModalHeader').html('Tambah Dokumentasi Pemeriksaan Tubuh');
        $('#ModalContent').load($(this).attr('href'));
        $('#ModalGue').modal('show');
      });

      $(document).on('click', '#edit_luka', function(e){
          e.preventDefault();
          testAnim("zoomIn");
          $('.modal-dialog').removeClass('modal-lg');
          $('.modal-dialog').removeClass('modal-sm');
          $('.modal-dialog').addClass('modal-md');
          $('#ModalHeader').html('Edit Dokumentasi Pemeriksaan Tubuh');
          $('#ModalContent').load($(this).attr('href'));
          $('#ModalGue').modal('show');
        });

        $(document).on('click', '#hapus_luka', function(e){
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
              $('#mytables').DataTable().ajax.reload();
             $('.alert-success').delay(500).show(10, function(){
               $('.alert-success').delay(5000).hide(10, function(){
                 $('.alert-success').remove();

               });
             })
           }
         });
       });

</script>
