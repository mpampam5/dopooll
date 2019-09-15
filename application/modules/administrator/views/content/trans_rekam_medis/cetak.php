<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$layout_title;?></title>
    <style type="text/css">
      #periksa .judul{
        width:155px;
        vertical-align: top;
      }
    </style>
  </head>
  <body style="font-family:Arial, Helvetica, sans-serif;">
    <div id="head" style="width:255px;position:absolute;top:0;left:40px;">
      <h5 style="line-height: 14px;border-bottom: 1px solid black;text-align:center;font-size:11px;">
        KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
        DAERAH SULAWESI SELATAN<br>
        BIDANG KEDOKTERAN DAN KESEHATAN
      </h5>
    </div>

    <div style="position:absolute;top:0;right:20px;font-size:9px">
      <p>kode-rm : <?=$kode?></p>
    </div>



        <div class="" style="text-align:center;width:220px;margin-left:250px;">
          <h4 style="border-bottom: 2px solid black;font-size:14px;font-family:Helvetica;padding-top:10px;">
            BERITA ACARA PEMERIKSAAN<br>
            KESEHATAN PADA TAHANAN
          </h4>
        </div>

      <div class="" style="margin-left:15px;margin-right:15px;">
        <div class="">
          <p style="text-align:justify">
            Pada hari ini <?=hari($tgl_pemeriksaan)?> tanggal <?=date_indo($tgl_pemeriksaan)?> kami sebagai
            Tim Medis/Paramedis dari Biddokkes Polda Sulsel Telah Melakukan
            pemeriksaan kesehatan seorang Tahanan yang tersebut di bawah ini :

          </p>
        </div>

        <div class="">

          <table>
            <tr>
              <td>1. Nama Lengkap</td>
              <td>: <?php echo $tahanan?></td>
            </tr>


            <tr>
              <td>2. T.Tgl.Lahir</td>
              <td>: <?=$lahir?></td>
            </tr>

            <tr>
              <td>3. Jenis kelamin</td>
              <td>: <?=$jenis_kelamin?></td>
            </tr>

            <tr>
              <td>4. Kebangsaan</td>
              <td>: <?=ucfirst($kebangsaan)?></td>
            </tr>

            <tr>
              <td>5. Agama</td>
              <td>: <?=$agama?></td>
            </tr>

            <tr>
              <td>6. Pekerjaan</td>
              <td>: <?=$pekerjaan?></td>
            </tr>

            <tr>
              <td>7. Alamat</td>
              <td>: <?=$alamat?></td>
            </tr>

            <tr>
              <td>8. Kasus/Perkara</td>
              <td>: <?=$perkara?></td>
            </tr>

            <tr>
              <td>9. Rutan Polres/Polsek</td>
              <td>: <?=$nama_rutan?></td>
            </tr>


          </table>
        </div>

        <div class="" style="width:242px;">
          <p style="border-bottom: 1px solid black;">Hasil pemeriksaan sebagai berikut :</p>
        </div>

        <div class="">
          <table id="periksa">
            <tr>
              <td class="judul">1. Tinggi Badan</td>
              <td>: <?=$tinggi_badan?> Cm, Berat Badan <?=$berat_badan?> Kg</td>
            </tr>
            <tr>
              <td class="judul">2. Tanda-tanda vital</td>
              <td style="text-align:justify">: Suhu: <?=$suhu_badan?> C, Tensi: <?=$tensi_darah?> Mmhg, Nadi: <?=$denyut_nadi?> x/menit,<br>&nbsp;&nbsp;Pernapasan: <?=$pernapasan?> x/menit</td>
            </tr>

            <tr>
              <td class="judul">3. Riwayat Penyakit</td>
              <td style="text-align:justify">: <?=$riwayat_penyakit?></td>
            </tr>

            <tr>
              <td class="judul">4. Keluhan</td>
              <td style="text-align:justify">: <?=$keluhan?></td>
            </tr>

            <tr>
              <td class="judul">5. Pemeriksaan tubuh</td>
              <td>: <?php if ($pemeriksaan_tubuh=="ada luka"): ?>
                    Ada Luka (Dokumentasi ada pada lembar berikutnya)
                    <?php else: ?>
                      Tidak ada luka
                    <?php endif; ?>

                 </td>
            </tr>


            <tr>
              <td class="judul">6. Therapy R/</td>
              <td style="text-align:justify">: <?=$therapi?></td>
            </tr>

            <tr>
              <td class="judul">7. Usulan/Saran</td>
              <td style="text-align:justify">: <?=$usulan?></td>
            </tr>

          </table>

        </div>

        <div class="" style="margin-top:30px;">
          <p>Demikianlah berita acara pemeriksaan ini dibuat dengan mengingat sumpah dan jabatan</p>
        </div>
      </div>

      <div class="" style="position:absolute;text-align:center;bottom:150px;right:130px;">

        <b style="border-bottom:2px solid black"><?=$dokter?></b> <br>
        Petugas Pemeriksa
      </div>


      <div style="position:absolute;top:20%;left:30%;">
        <img src="<?=base_url('temp/admin/dokkes.png')?>" style="width:80%;opacity: 0.1;" alt="">
      </div>





      <pagebreak />

      <!-- Dokumentasi -->
      <div id="head" style="width:255px;position:absolute;top:0;left:40px;">
        <h5 style="line-height: 14px;border-bottom: 1px solid black;text-align:center;font-size:11px;">
          KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
          DAERAH SULAWESI SELATAN<br>
          BIDANG KEDOKTERAN DAN KESEHATAN
        </h5>
      </div>

      <div style="position:absolute;top:0;right:20px;font-size:9px">
        <p>kode-rm : <?=$kode?></p>
      </div>



          <div class="" style="text-align:center;width:270px;margin-left:250px;">
            <h5 style="font-size:12px;font-family:Helvetica;padding-top:10px;">
              DOKUMENTASI PEMERIKSAAN TUBUH
            </h5>
          </div>

          <style>
            .table{
              width:100%;border:1px solid #959595;
              border-collapse: collapse;
            }
            .table thead tr th{
              font-size: 12px;
            }

            .table th, .table td {
              /* border: 1px solid #959595; */
              border: 1px solid #ddd;
              padding: 8px;
            }
          </style>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Jenis Luka</th>
                <th>Posisi Luka</th>
                <th>Keterangan</th>
              </tr>
            </thead>

            <tbody>
              <?php $no=1; ?>
              <?php foreach ($luka as $row): ?>
                <tr>
                  <td><?=$no++?></td>
                  <td>
                    <?php if ($row->foto!="" || $row->foto!=null): ?>
                        <img src="<?=base_url()?>temp/upload/thumbs/<?=$row->foto?>" alt="" style="width:150px;height:150px">
                      <?php else: ?>
                        tidak ada foto
                      <?php endif; ?>
                  </td>
                  <td><?=$row->jenis_luka?></td>
                  <td><?=$row->posisi_luka?></td>
                  <td><?=$row->keterangan?></td>
                </tr>
              <?php endforeach; ?>





            </tbody>

          </table>

          <div style="position:absolute;top:20%;left:30%;">
            <img src="<?=base_url('temp/admin/dokkes.png')?>" style="width:80%;opacity: 0.1;" alt="">
          </div>

  </body>
</html>
