<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Security');
    $this->Security->getsecurity();
    $this->load->library(array("Cl","Layouts"));
    $this->load->helper(array('menus','mpampam'));
  }

  function error_404()
  {
    $this->layouts->set_title('Error 404 Not Found');
    $this->layouts->view(config_item("cpanel").'/404');
  }

  public function _cekfile($str,$name)
  {
    $allowed_mime_type_arr = array('image/jpeg','image/png','image/x-png');
    $mime = get_mime_by_extension($_FILES['userfile']['name']);
    if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
        if(in_array($mime, $allowed_mime_type_arr)){
          if ($_FILES['userfile']['size']>1000000) {
            $this->form_validation->set_message('_cekfile', "Ukuran File Maximal 1mb ");
            return FALSE;
          }else {
            $config['upload_path']   = 'temp/upload/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']      = 1024;
            $config['overwrite']     = TRUE;
            $config['file_name']     = $name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $this->form_validation->set_message('_cekfile', "Ukuran File maximal 1mb dan format file jpg/png");
                return FALSE;
            }else {
                $data_upload = $this->upload->data();
                $config2['image_library']   = 'gd2';
                $config2['source_image']    = 'temp/upload/img/'.$data_upload['file_name'];
                $config2['new_image']       =  'temp/upload/thumbs/'.$data_upload['file_name'];
                $config2['maintain_ratio']  = true;
                $config2['create_thumb']    = false;
                $config2['quality']         = 50;
                $config2['width']           = 300;
                $config2['height']          = 300;
                $this->load->library('image_lib', $config2);
               if(!$this->image_lib->resize())
              {
                $this->form_validation->set_message('_cekfile', 'Terjadi Kesalahan.');
                return false;
              }else {
                return true;
              }

            }
          }
        }else{
            $this->form_validation->set_message('_cekfile', 'format file harus jpg/png.');
            return false;
        }
    }else{
        return true;
    }
 }


}
