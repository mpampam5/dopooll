<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* Groups.php */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Location: ./application/controllers/Groups.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-21 13:34:17 */
/* http://harviacode.com */

 class Groups extends MY_Controller{
  function __construct(){
      parent::__construct();
      $this->load->model('Groups_model','model');
      if ($this->cl->acl(config_item("cpanel")."groups")==false) {
        redirect("errors/er403");
      }
  }

 function _rules(){
		$this->form_validation->set_rules('id_level', 'id_level', 'trim');
		$this->form_validation->set_rules('level', 'Group', 'trim|xss_clean|required');
		$this->form_validation->set_rules('description', 'description','trim|xss_clean');
		$this->form_validation->set_rules('access[]', ' ', 'trim|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

 function index(){
    $this->layouts->set_title('Groups');
    $this->layouts->view(config_item("cpanel").'content/groups/index');
  }

function json() {
    header('Content-Type: application/json');
    echo $this->model->json();
}


 // function detail($id){
 //    if($row=$this->model->get_where($id)){
 //      $this->layouts->set_title('Groups');
 //        $data=array('layout_title' => 'Groups',
	// 									'id_level' => $row->id_level,
	// 									'level' => $row->level,
	// 									'description' => $row->description,
	// 									'roles' => $row->roles,
	// 									'created_by' => $row->created_by,
	// 									'update_by' => $row->update_by,
	// 									'created_at' => $row->created_at,
	// 									'update_at' => $row->update_at,
	// 								);
	// 			 $this->layouts->view(config_item("cpanel").'content/groups/detail',array(),$data);
//MODAL DETAIL
//$this->layouts->view(config_item("cpanel").'content/groups/detail',array(),$data,false);
  //   }else {
  //       $this->error_404();
  //   }
  // }

 function tambah($status=''){
    if ($status=='aksi') {
        $json = array('success'=>false ,'alert'=>array());
        if ($this->input->is_ajax_request()) {
            $this->_rules();
            if ($this->form_validation->run()) {
                $akses= $this->input->post('access');
                if ($akses!="") {
                  foreach ($akses as $entry) {
                    $m[] = $entry;
                  }

                  $accesss = json_encode($m);
                }else {
                  $accesss = null;
                }

                $insert = array(
																'level' => $this->input->post('level',TRUE),
																'description' => $this->input->post('description',TRUE),
																'access' => $accesss,
                                'created_by' => $this->session->userdata("id_auth"),
																'created_at' => date('Y-m-d h:i:s'),
															);
                $this->model->get_insert($insert);
                $json['alert']   = "Berhasil Menyimpan";
                $json['success'] = true;
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      $this->layouts->set_title('Groups');
      $data = array('layout_title' => 'Groups',
                      'button'=>'tambah',
                      'aksi' =>site_url(config_item("cpanel").'groups/tambah/aksi'),
											'id_level' => set_value('id_level'),
											'level' => set_value('level'),
											'description' => set_value('description'),
											'access' => set_value('access'),
											);
			 $this->layouts->view(config_item("cpanel").'content/groups/form',array(),$data);
  //MODAL TAMBAH
  //$this->layouts->view(config_item("cpanel").'content/groups/form',array(),$data,false);
     }
  }

 function edit($id,$status=''){
      if ($status=='aksi') {
          $json = array('success'=>false ,'alert'=>array());
          if ($this->input->is_ajax_request()) {
              $this->_rules();
              if ($this->form_validation->run()) {
                $akses= $this->input->post('access');
                if ($akses!="") {
                  foreach ($akses as $entry) {
                    $m[] = $entry;
                  }

                  $accesss = json_encode($m);
                }else {
                  $accesss = null;
                }

                  $update = array(
																'level' => $this->input->post('level',TRUE),
																'description' => $this->input->post('description',TRUE),
																'access' => $accesss,
                                'update_by' => $this->session->userdata("id_auth"),
																'update_at' => date('Y-m-d h:i:s'),
															);
                $this->model->get_update($id,$update);
                $json['alert']   = 'Berhasil Mengedit!';
                $json['success'] = true;
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      if($row=$this->model->get_where($id)){
        $this->layouts->set_title('Groups');
        $data = array('layout_title' => 'Groups',
                      'button'=>'edit',
                      'aksi' =>site_url(config_item("cpanel").'groups/edit/'.$id.'/aksi'),
											'id_level' => set_value('id_level', $row->id_level),
											'level' => set_value('level', $row->level),
											'description' => set_value('description', $row->description),
											);
			 $this->layouts->view(config_item("cpanel").'content/groups/form',array(),$data);
  //MODAL EDIT
  //$this->layouts->view(config_item("cpanel").'content/groups/form',array(),$data,false);
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



}
/* End Controller */
