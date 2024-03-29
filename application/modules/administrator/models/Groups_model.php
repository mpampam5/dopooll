<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');



/* */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-21 13:34:17 */
/* http://harviacode.com */

 class Groups_model extends CI_Model{
  var $table = 'groups';
  var $id    = 'id_level';

    // datatables
      function json() {
          $this->datatables->select('id_level,level,description');
          $this->datatables->from('groups');
          // $this->datatables->where('id_level!=',1);
          //add this line for join
          //$this->datatables->join('table2', 'groups.field = table2.field');
          $this->datatables->add_column('action',
          // '<a href="'.site_url(config_item("cpanel")."groups/detail/$1").'" id="detail" class="btn btn-sm btn-primary">detail</a>
           '<a href="'.site_url(config_item("cpanel")."groups/edit/$1").'" id="edit" class="btn btn-sm btn-warning">edit</a>
           <a href="'.site_url(config_item("cpanel")."groups/hapus/$1").'" id="hapus" class="btn btn-sm btn-danger">hapus</a>',
           'id_level');
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
          return $this->db->where($this->id,$where)
                          ->delete($this->table);
        }

}
  /* End Model */
