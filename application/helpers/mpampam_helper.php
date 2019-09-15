<?php
function me($value)
{
  return config_item($value);
}

function directory($value)
{
  return config_item($value);
}
function sess($str)
{
  $ci = get_instance();
   return $ci->session->userdata("$str");
}

function slug($str)
{
  return url_title($str,'dash',true);
}

function profile($str)
{
  $ci = get_instance();
  $data = $ci->db->where("id_profile",1)
                  ->get("profile")
                  ->row();
  return $data->$str;
}

function row_table($str)
{
  $ci = get_instance();
  $data = $ci->db->get($str)->num_rows();
  return $data;
}

function query_table($str)
{
  $ci = get_instance();
  $data = $ci->db->query($str);
  return $data;
}


function cmb_dinamis($id,$name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get($table)->result();
    if ($selected==null) {
      $cmb .="<option value=''>--pilih--</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".ucwords($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_dinamis_custom_polsek($id,$name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control select2'>";
    $data = $ci->db->get($table)->result();
    if ($selected==null) {
      $cmb .="<option value=''>-- Pilih --</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".ucwords($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_dinamis_pmenu($id,$name,$table,$field,$pk,$array,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get_where($table,$array)->result();
    if ($selected==null) {
      $cmb .="<option value='0'>Ya</option>";
    }else {
      $cmb .="<option value='0'";
      $cmb .= $selected==0?" selected='selected'":'';
      $cmb .=">YA</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_query($query,$id,$name,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->query($query)->result();
    if ($selected==null) {
      $cmb .="<option value=''>--pilih--</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_menu($id,$name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get($table)->result();
    if ($selected==null) {
      $cmb .="<option value='0'>Ya</option>";
    }else {
      $cmb .="<option value='0'";
      $cmb .= $selected==0?" selected='selected'":'';
      $cmb .=">YA</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}


function groups($table,$id_level,$id_menus)
{
  $ci = get_instance();
  $query = $ci->db->where(array("id_level"=>$id_level))->get($table);

  if ($query->num_rows()>0) {
    $menu = $query->row();
    if ($menu->access!=null) {
      $menus=json_decode($menu->access,true);
      if (in_array($id_menus,$menus)) {
        return true;
      }else {
        return false;
      }
    }else {
      return false;
    }

  }
}

function created_update($id_sess)
{
  $ci = get_instance();
  $query = $ci->db->where(array("id_auth"=>$id_sess))->get("auth");

  if ($query->num_rows() > 0 ) {
    $str = "<a href='#'>".$query->row()->name."</a>";
  }else {
    $str = "";
  }
  return $str;
}

function form_medis($table,$field,$value)
{
  $ci = get_instance();
  $data = $ci->db->where("$field",$value)
                  ->get("$table");
  if ($data->num_rows()>0) {
    return $data->row()->nama;
  }else {
    return false;
  }
}

function hitung_umur($tanggal_lahir) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}
//Tampilkan Umur dengan Tanggal Lahir 1990-Oktober-25
