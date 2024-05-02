<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/11/2018
 * Time: 9:27 AM
 */

class GlobalModel extends CI_Model
{

    
    public function excute_query_result($query_str)
    {
        $result_arr = array();
        try {
            $query = $this->db->query($query_str);
            $result = $query->result();
            if($result) {
                foreach ($result as $rows) {
                    array_push($result_arr, $rows);
                }
            }
        }catch (Exception $ex){}
        return $result_arr;
    }

    public function excute_query_row($query_str)
    {
        try {
            $query = $this->db->query($query_str);
//            $result = $query->row_array();
            $result = $query->row();
            if($result) return $result;
        }catch (Exception $ex){}
    }

    public function excute_query($query_str)
    {
        try{
            $result = $this->db->query($query_str);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_insert($tablename, $sets)
    {
        try{
            $result = $this->db->insert($tablename, $sets);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_update($tablename, $updates, $wheres)
    {
        try{
            $result = $this->db->update($tablename, $updates, $wheres);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function excute_delete($tablename, $wheres)
    {
        try{
            $result = $this->db->delete($tablename, $wheres);
            if($result)
                return true;
            else
                return false;
        }catch (Exception $ex){
            return false;
        }
    }

    public function get_max($tablename, $fldname, $where_query=null)
    {
        $query = $this->db->query("select max(ceil(".$fldname.")) as maxval from ".$tablename.$where_query);
        if($query){
            $rows = $query->row();
            return $rows->maxval + 1;
        }
    }

    public function get_fields_list($tablename)
    {
        return $this->db->list_fields($tablename);
    }

    public function get_field_data($tablename)
    {
        return $this->db->field_data($tablename);
    }

    public function get_field_exist($tablename, $fldname)
    {
        return $this->db->field_exists($fldname, $tablename);
    }
}