<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* Trans_rekam_medis.php */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Location: ./application/controllers/Trans_rekam_medis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-06 20:16:44 */
/* http://harviacode.com */

 class Trans_rekam_medis extends MY_Controller{
  function __construct(){
      parent::__construct();
      $this->load->model('Trans_rekam_medis_model','model');
      $this->load->library("Cl");
      if ($this->cl->acl(config_item("cpanel")."trans_rekam_medis")==false) {
        redirect("errors/er403");
      }
  }

 function _rules(){
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_rules('kode', 'kode', 'trim|xss_clean|required');
    $this->form_validation->set_rules('rutan', 'rutan', 'trim|xss_clean|required');
    $this->form_validation->set_rules('perkara', 'perkara', 'trim|xss_clean|required');
    $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk rutan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_tahanan', 'tahanan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('id_dokter', 'dokter', 'trim|xss_clean|required');
		$this->form_validation->set_rules('tgl_pemeriksaan', 'tgl pemeriksaan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('suhu_badan', 'suhu badan', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('tensi_darah', 'tensi darah', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('denyut_nadi', 'denyut nadi', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('pernapasan', 'pernapasan', 'trim|xss_clean|required|numeric');
		$this->form_validation->set_rules('riwayat_penyakit', 'riwayat penyakit', 'trim|xss_clean');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|xss_clean');
		$this->form_validation->set_rules('pemeriksaan_tubuh', 'pemeriksaan tubuh', 'trim|xss_clean|required');
		$this->form_validation->set_rules('therapi', 'therapi', 'trim|xss_clean');
		$this->form_validation->set_rules('usulan', 'usulan', 'trim|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }


 function index(){
    $this->layouts->set_title('Data Rekam Medis');
    $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/index');
  }

function json() {
    header('Content-Type: application/json');
    echo $this->model->json();
}


 function detail($id){
    if($row=$this->model->get_where_join($id)){
      $this->layouts->set_title('Data Rekam Medis');
        $data=array('layout_title' => 'Data Rekam Medis',
										'id_rekam_medis' => $row->id,
										'kode' => $row->kode,
										'id_tahanan' => $row->id_tahanan,
                    'nik_tahanan'   => $row->nik_tahanan,
                    'tahanan'   => $row->tahanan,
                    'lahir'   =>  $row->tempat_lahir,
                    'tgl_lahir' => $row->tgl_lahir,
                    'jenis_kelamin'=>$row->jenis_kelamin,
                    'pekerjaan'   =>strtolower($row->nama_pekerjaan),
                    'agama'       =>$row->agama,
                    'kebangsaan'  =>$row->kebangsaan,
                    'alamat'      =>$row->alamat,
                    'foto'  => $row->foto,
                    'rutan' =>$row->rutan,
                    'nama_rutan' =>$row->nama_rutan,
                    'perkara'=> $row->perkara,
                    'tgl_masuk' =>$row->tgl_masuk,
										'id_dokter' => $row->id_dokter,
                    'dokter' => $row->dokter,
										'tgl_pemeriksaan' => $row->tgl_pemeriksaan,
										'tinggi_badan' => $row->tinggi_badan,
										'berat_badan' => $row->berat_badan,
										'suhu_badan' => $row->suhu_badan,
										'tensi_darah' => $row->tensi_darah,
										'denyut_nadi' => $row->denyut_nadi,
										'pernapasan' => $row->pernapasan,
										'riwayat_penyakit' => $row->riwayat_penyakit,
										'keluhan' => $row->keluhan,
										'pemeriksaan_tubuh' => $row->pemeriksaan_tubuh,
										'therapi' => $row->therapi,
										'usulan' => $row->usulan,
										'created_at' => $row->created_at,
										'update_at' => $row->update_at,
										'created_by' => $row->created_by,
										'update_by' => $row->update_by,
									);
				 $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/details',array(),$data);
//MODAL DETAIL
//$this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/detail',array(),$data,false);
    }else {
        $this->error_404();
    }
  }

 function tambah($status=''){
    if ($status=='aksi') {
        $json = array('success'=>false ,'alert'=>array());
        if ($this->input->is_ajax_request()) {
            $this->_rules();
            if ($this->form_validation->run()) {
                $insert = array(
																'kode' => $this->input->post('kode',TRUE),
																'id_tahanan' => $this->input->post('id_tahanan',TRUE),
																'id_dokter' => $this->input->post('id_dokter',TRUE),
                                'perkara' => $this->input->post('perkara',TRUE),
                                'rutan' => $this->input->post('rutan',TRUE),
                                'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
																'tgl_pemeriksaan' => $this->input->post('tgl_pemeriksaan',TRUE),
																'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
																'berat_badan' => $this->input->post('berat_badan',TRUE),
																'suhu_badan' => $this->input->post('suhu_badan',TRUE),
																'tensi_darah' => $this->input->post('tensi_darah',TRUE),
																'denyut_nadi' => $this->input->post('denyut_nadi',TRUE),
																'pernapasan' => $this->input->post('pernapasan',TRUE),
																'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
																'keluhan' => $this->input->post('keluhan',TRUE),
																'pemeriksaan_tubuh' => $this->input->post('pemeriksaan_tubuh',TRUE),
																'therapi' => $this->input->post('therapi',TRUE),
																'usulan' => $this->input->post('usulan',TRUE),
                                'created_at' => date('Y-m-d h:i:s'),
																'created_by' => sess('id_auth')
															);
                $this->load->library('ciqrcode'); //pemanggilan library QR CODE

                $config['cacheable']    = true; //boolean, the default is true
                $config['cachedir']     = './temp/'; //string, the default is application/cache/
                $config['errorlog']     = './temp/'; //string, the default is application/logs/
                $config['imagedir']     = './temp/barcode/'; //direktori penyimpanan qr code
                $config['quality']      = true; //boolean, the default is true
                $config['size']         = '524'; //interger, the default is 1024
                $config['black']        = array(224,255,255); // array, default is array(255,255,255)
                $config['white']        = array(70,130,180); // array, default is array(0,0,0)
                $this->ciqrcode->initialize($config);

                $image_name=$this->input->post('kode',TRUE).'.png'; //buat name dari qr code sesuai dengan nim

                $params['data'] = $this->input->post('kode',TRUE); //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 5;
                $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
                $this->model->get_insert($insert);
                $json['alert']   = 'Berhasil Menyimpan!';
                $json['success'] = true;
                $json['id_rekam_medis'] = $this->db->insert_id();
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      $this->layouts->set_title('Data Rekam Medis');
      $data = array('layout_title' => 'Data Rekam Medis',
                      'button'=>'tambah',
                      'aksi' =>site_url(config_item("cpanel").'trans_rekam_medis/tambah/aksi'),
											'id' => set_value('id'),
											'kode' => set_value('kode',date("dmYhis")),
											'id_tahanan' => set_value('id_tahanan'),
                      'tahanan'   => set_value('tahanan'),
											'id_dokter' => set_value('id_dokter'),
                      'dokter'   => set_value('dokter'),
                      'perkara' => set_value('perkara'),
                      'rutan' => set_value('rutan'),
                      'tgl_masuk' => set_value('tgl_masuk'),
											'tgl_pemeriksaan' => set_value('tgl_pemeriksaan',date("Y-m-d")),
											'tinggi_badan' => set_value('tinggi_badan'),
											'berat_badan' => set_value('berat_badan'),
											'suhu_badan' => set_value('suhu_badan'),
											'tensi_darah' => set_value('tensi_darah'),
											'denyut_nadi' => set_value('denyut_nadi'),
											'pernapasan' => set_value('pernapasan'),
											'riwayat_penyakit' => set_value('riwayat_penyakit'),
											'keluhan' => set_value('keluhan'),
											'pemeriksaan_tubuh' => set_value('pemeriksaan_tubuh'),
											'therapi' => set_value('therapi'),
											'usulan' => set_value('usulan')
											);
			 $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data);
  //MODAL TAMBAH
  //$this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data,false);
     }
  }

 function edit($id,$status=''){
      if ($status=='aksi') {
          $json = array('success'=>false ,'alert'=>array());
          if ($this->input->is_ajax_request()) {
              $this->_rules();
              if ($this->form_validation->run()) {
                  $update = array(
																'kode' => $this->input->post('kode',TRUE),
																'id_tahanan' => $this->input->post('id_tahanan',TRUE),
																'id_dokter' => $this->input->post('id_dokter',TRUE),
                                'perkara' => $this->input->post('perkara',TRUE),
                                'rutan' => $this->input->post('rutan',TRUE),
                                'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
																'tgl_pemeriksaan' => $this->input->post('tgl_pemeriksaan',TRUE),
																'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
																'berat_badan' => $this->input->post('berat_badan',TRUE),
																'suhu_badan' => $this->input->post('suhu_badan',TRUE),
																'tensi_darah' => $this->input->post('tensi_darah',TRUE),
																'denyut_nadi' => $this->input->post('denyut_nadi',TRUE),
																'pernapasan' => $this->input->post('pernapasan',TRUE),
																'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
																'keluhan' => $this->input->post('keluhan',TRUE),
																'pemeriksaan_tubuh' => $this->input->post('pemeriksaan_tubuh',TRUE),
																'therapi' => $this->input->post('therapi',TRUE),
																'usulan' => $this->input->post('usulan',TRUE),
                                'update_at' => date('Y-m-d h:i:s'),
																'update_by' => sess('id_auth')
															);
                $this->model->get_update($id,$update);
                $json['alert']   = 'Berhasil Mengedit!';
                $json['success'] = true;
                $json['id_rekam_medis'] = $id;
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      if($row=$this->model->get_where($id)){
        $this->layouts->set_title('Data Rekam Medis');
        $data = array('layout_title' => 'Data Rekam Medis',
                      'button'=>'edit',
                      'aksi' =>site_url(config_item("cpanel").'trans_rekam_medis/edit/'.$id.'/aksi'),
											'id' => set_value('id', $row->id),
											'kode' => set_value('kode', $row->kode),
											'id_tahanan' => set_value('id_tahanan', $row->id_tahanan),
                      'tahanan'   => set_value('tahanan', form_medis("mst_tahanan","id_tahanan",$row->id_tahanan)),
											'id_dokter' => set_value('id_dokter', $row->id_dokter),
                      'dokter'   => set_value('dokter', form_medis("mst_dokter","id_pemeriksa",$row->id_dokter)),
                      'perkara' => set_value('perkara',$row->perkara),
                      'rutan' => set_value('rutan',$row->rutan),
                      'tgl_masuk' => set_value('tgl_masuk',$row->tgl_pemeriksaan),
											'tgl_pemeriksaan' => set_value('tgl_pemeriksaan', $row->tgl_pemeriksaan),
											'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
											'berat_badan' => set_value('berat_badan', $row->berat_badan),
											'suhu_badan' => set_value('suhu_badan', $row->suhu_badan),
											'tensi_darah' => set_value('tensi_darah', $row->tensi_darah),
											'denyut_nadi' => set_value('denyut_nadi', $row->denyut_nadi),
											'pernapasan' => set_value('pernapasan', $row->pernapasan),
											'riwayat_penyakit' => set_value('riwayat_penyakit', $row->riwayat_penyakit),
											'keluhan' => set_value('keluhan', $row->keluhan),
											'pemeriksaan_tubuh' => set_value('pemeriksaan_tubuh', $row->pemeriksaan_tubuh),
											'therapi' => set_value('therapi', $row->therapi),
											'usulan' => set_value('usulan', $row->usulan)
											);
			 $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data);
  //MODAL EDIT
  //$this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data,false);
			}else{
      $this->error_404();
    }
  }
}

 function hapus($id){
  if ($this->input->is_ajax_request()) {
      $this->model->get_delete($id);
      $data['alert'] = 'Berhasil menghapus!';
      echo json_encode($data);
    }
}


// modal add tahanan/Dokter

function cetak($id="")
{

  if($row=$this->model->get_where_join($id)){
    $this->load->helper('tanggal');
      $query = $this->db->get_where('trans_luka',array('id_rekam_medik'=>$row->id));
      $data=array('layout_title' => 'BIDDOKKES-POLDA-SULSEL-RM-TAHANAN-'.$row->kode,
                  'id' => $row->id,
                  'kode' => $row->kode,
                  'id_tahanan' => $row->id_tahanan,
                  'nik_tahanan'   => $row->nik_tahanan,
                  'tahanan'   => $row->tahanan,
                  'lahir'   =>  $row->tempat_lahir.", ".date("d-m-Y",strtotime($row->tgl_lahir))." (".hitung_umur($row->tgl_lahir)." tahun)",
                  'jenis_kelamin'=>$row->jenis_kelamin,
                  'pekerjaan'   =>strtolower($row->nama_pekerjaan),
                  'agama'       =>$row->agama,
                  'kebangsaan'  =>$row->kebangsaan,
                  'alamat'      =>$row->alamat,
                  'foto'  => $row->foto,
                  'rutan' =>$row->rutan,
                  'nama_rutan' =>$row->nama_rutan,
                  'perkara'=> $row->perkara,
                  'tgl_masuk' =>$row->tgl_masuk,
                  'id_dokter' => $row->id_dokter,
                  'dokter' => $row->dokter,
                  'tgl_pemeriksaan' => $row->tgl_pemeriksaan,
                  'tinggi_badan' => $row->tinggi_badan,
                  'berat_badan' => $row->berat_badan,
                  'suhu_badan' => $row->suhu_badan,
                  'tensi_darah' => $row->tensi_darah,
                  'denyut_nadi' => $row->denyut_nadi,
                  'pernapasan' => $row->pernapasan,
                  'riwayat_penyakit' => $row->riwayat_penyakit,
                  'keluhan' => $row->keluhan,
                  'pemeriksaan_tubuh' => $row->pemeriksaan_tubuh,
                  'therapi' => $row->therapi,
                  'usulan' => $row->usulan,
                  'created_at' => $row->created_at,
                  'update_at' => $row->update_at,
                  'created_by' => $row->created_by,
                  'update_by' => $row->update_by,
                  'luka'  => $query->result()
                );
                ini_set('memory_limit', '256M');
                        // load library
                        $this->load->library('pdf');
                        $pdf = $this->pdf->load();
                        // retrieve data from model
                        $html=$this->load->view('content/trans_rekam_medis/cetak',$data,true);
                        $pdf->WriteHTML($html);
                        // $pdf->AddPage();
                        //write the HTML into the PDF
                        $output = 'BIDDOKKES-POLDA-SULSEL-RM-TAHANAN-'.$row->kode.'.pdf';
                        $pdf->Output("$output", 'I');
//MODAL DETAIL
//$this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/detail',array(),$data,false);
  }else {
      echo "Gagal Mencetak";
  }


}

function luka_json($id) {
    header('Content-Type: application/json');
    echo $this->model->luka_json($id);
}

function modal_tambah_luka($id,$status=''){
   if ($status=='aksi') {
       $json = array('success'=>false ,'alert'=>array());
       if ($this->input->is_ajax_request()) {
          $this->form_validation->set_rules('jenis', 'Jenis Luka', 'trim|xss_clean|required');
          $this->form_validation->set_rules('posisi', 'Posisi Luka', 'trim|xss_clean|required');
          $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|xss_clean');

          if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
              $file_name = substr($_FILES['userfile']['name'],-4);
              $image_name = $this->input->post('userfile',true)."".$file_name;
            }else {
              $image_name = null;
            }
            $this->form_validation->set_rules('userfile', 'Foto Dokumentasi', 'trim|xss_clean|callback__cekfile['.$image_name.']');

          $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

           if ($this->form_validation->run()) {
               $insert = array(
                               'id_rekam_medik' => $id,
                               'jenis_luka' => $this->input->post('jenis',TRUE),
                               'posisi_luka' => $this->input->post('posisi',TRUE),
                               'foto' => $image_name,
                               'keterangan' => $this->input->post('keterangan',TRUE),
                               'created_at' => date('Y-m-d h:i:s'),
                               'created_by' => sess('id_auth')
                             );

               $this->db->insert('trans_luka',$insert);
               $json['alert']   = 'Berhasil Menyimpan!';
               $json['success'] = true;

           }else{
               foreach ($_POST as $key => $value) {
                 $json['alert'][$key] = form_error($key);
               }
           }
           echo json_encode($json);
       }
   }else{
     $this->layouts->set_title('Tambah Dokumentasi Rekam Medis');
     $data = array('layout_title' => 'Tambah Dokumentasi Rekam Medis',
                     'button'=>'tambah',
                     'aksi' =>site_url(config_item("cpanel").'trans_rekam_medis/modal_tambah_luka/'.$id.'/aksi'),
                     'id' => set_value('id'),
                     'userfile' => set_value('userfile',date("dmYhis")),
                     'jenis' => set_value('jenis'),
                     'posisi' => set_value('posisi'),
                     'keterangan'   => set_value('keterangan'),
                     );
      // $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data);
      $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form_luka',array(),$data,false);
 //MODAL TAMBAH
 //$this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data,false);
    }
 }

 function modal_edit_luka($id,$status=''){
    if ($status=='aksi') {
        $json = array('success'=>false ,'alert'=>array());
        if ($this->input->is_ajax_request()) {
           $this->form_validation->set_rules('jenis', 'Jenis Luka', 'trim|xss_clean|required');
           $this->form_validation->set_rules('posisi', 'Posisi Luka', 'trim|xss_clean|required');
           $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|xss_clean');

           if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
                if ($this->input->post('userfile',true)=="") {
                  $file_name = substr($_FILES['userfile']['name'],-4);
                  $image_name = date('dmYhis')."".$file_name;
                }else {
                  $image_name = $this->input->post('userfile',true);
                }
              }else {
                $image_name = $this->input->post('userfile',true);
              }
                $this->form_validation->set_rules('userfile', 'Foto', 'trim|xss_clean|callback__cekfile['.$image_name.']');

           $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

            if ($this->form_validation->run()) {
                $insert = array(
                                'jenis_luka' => $this->input->post('jenis',TRUE),
                                'posisi_luka' => $this->input->post('posisi',TRUE),
                                'foto' => $image_name,
                                'keterangan' => $this->input->post('keterangan',TRUE),
                                'update_at' => date('Y-m-d h:i:s'),
                                'update_by' => sess('id_auth')
                              );


                $this->db
                        ->where('id',$id)
                        ->update('trans_luka',$insert);

                $json['alert']   = 'Berhasil Megubah!';
                $json['success'] = true;

            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      $row = $this->db->get_where("trans_luka",array('id'=>$id))->row();
      if ($row) {
        $this->layouts->set_title('Edit Dokumentasi Rekam Medis');
        $data = array('layout_title' => 'Edit Dokumentasi Rekam Medis',
                        'button'=>'edit',
                        'aksi' =>site_url(config_item("cpanel").'trans_rekam_medis/modal_edit_luka/'.$id.'/aksi'),
                        // 'id' => set_value('id'),
                        'userfile' => set_value('userfile',$row->foto),
                        'jenis' => set_value('jenis',$row->jenis_luka),
                        'posisi' => set_value('posisi',$row->posisi_luka),
                        'keterangan'   => set_value('keterangan',$row->keterangan),
                        );
         // $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form',array(),$data);
         $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/form_luka',array(),$data,false);
      }else {
        $this->error_404();
      }

     }
  }


  function hapus_luka($id){
   if ($this->input->is_ajax_request()) {
     $this->db->where(array('id'=>$id))
              ->delete('trans_luka');
       $data['alert'] = 'Berhasil menghapus!';
       echo json_encode($data);
     }
  }


function modal_tahanan()
{
  $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/modal_tahanan',array(),array(),false);
}

function modal_dokter()
{
  $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/modal_dokter',array(),array(),false);
}

function scanqr()
{
  $this->layouts->view(config_item("cpanel").'content/trans_rekam_medis/scand_qr',array(),array(),false);
}

}
/* End Controller */
