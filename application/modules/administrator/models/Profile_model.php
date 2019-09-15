<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');



/* */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-20 22:35:55 */
/* http://harviacode.com */

 class Profile_model extends CI_Model{
  var $table = 'profile';
  var $id    = 'id_profile';


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
  