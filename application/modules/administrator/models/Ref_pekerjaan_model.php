<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');



/* */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-31 20:51:55 */
/* http://harviacode.com */

 class Ref_pekerjaan_model extends CI_Model{
  var $table = 'ref_pekerjaan';
  var $id    = 'id_perkerjaan';

    // datatables
      function json() {
          $this->datatables->select('id_perkerjaan,pekerjaan');
          $this->datatables->from('ref_pekerjaan');
          //add this line for join
          //$this->datatables->join('table2', 'ref_pekerjaan.field = table2.field');
          $this->datatables->add_column('action',
          // '<a href="'.site_url(config_item("cpanel")."ref_pekerjaan/detail/$1").'" id="detail" class="btn btn-sm btn-primary">detail</a>
           '<a href="'.site_url(config_item("cpanel")."ref_pekerjaan/edit/$1").'" id="edit" class="btn btn-sm btn-warning">edit</a>
           <a href="'.site_url(config_item("cpanel")."ref_pekerjaan/hapus/$1").'" id="hapus" class="btn btn-sm btn-danger">hapus</a>',
           'id_perkerjaan');
          return $this->datatables->generate();
      }


     function get_data()
      {
        return $this->db->query("SELECT * FROM $this->table ORDER BY $this->id DESC");
      }


      function get_insert($data)
        {
          return $this->db->insert($this->table,$data);
        }


      function get_where($where)
        {
          return $this->db->where($this->id,$where)
                          ->get($this->table)
                          ->row();
        }


      function get_update($where,$data)
        {
          return $this->db
                ->where($this->id,$where)
                ->update($this->table,$data);
        }


      function get_delete($where)
        {
          $query = $this->db->where($this->id,$where)
                          ->delete($this->table);
          if (!$query) {
            return false;
          }else {
            return true;
          }
        }

}
  /* End Model */
