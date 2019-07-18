<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokdb extends CI_Model {
	public function GetData($where='') { 
        $query = $this->db->query('select * from brg'.$where); 
        return $query->result_array(); 
    }
 
    public function InsertData($tabel,$data) 
    {
        $query = $this->db->insert($tabel,$data); 
        return $query;
    }
 
    public function UpdateData($tabel,$data,$where) 
    {
        $query = $this->db->update($tabel,$data,$where);
        return $query;
    }
 
    public function DeleteData($tabel,$where) 
    {
        $query = $this->db->delete($tabel,$where); 
        return $query;
    }

    public function GetUser($tabel,$where)
    {
        $query = $this->db->get_where($tabel,$where);
        return $query;
    }
}