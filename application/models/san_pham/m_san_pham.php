<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_san_pham extends CI_Model {

	function dispsp()
	{
	$query=$this->db->query("SELECT * FROM `tbl_san_pham`");
	return $query->result();
	}
	function dispsp1()
	{
	$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_loai_san_pham` = 1");
	return $query->result();
	}
	public function dispsp2($value='')
	{
		$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_loai_san_pham` = 2");
		return $query->result();
	}
	public function dispsp3($value='')
	{
		$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_loai_san_pham` = 4");
		return $query->result();
	}
	function displayrecordsById($id)
	{
	$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_san_pham`='".$id."'");
	$result = $query->result_array();
		return $result;
	}
	function addcartbyid($id)
	{
		$this->db->WHERE('id_san_pham', $id);
		return $this->db->get('tbl_san_pham') ->row();
	// $query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_san_pham`='".$id."'");
	// $result = $query->result_array();
	// 	return $result;
	}
	function displayrecordsBysx($sx)
	{
	$query=$this->db->query("SELECT * FROM `tbl_ncc` WHERE `id_ncc`='".$sx."'");
	$result = $query->result_array();
		return $result;
	}
	function displayrecordsBylq($pl)
	{
	$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `id_loai_san_pham`='".$pl."' limit 4");
	$result = $query->row_array();
	}
	function displaynccById($ncc)
	{
	$query=$this->db->query("SELECT * FROM `tbl_ncc` WHERE `id_ncc`='".$ncc."'");
	$result = $query->result_array();
		return $result;
	}
	public function searchbykey($key)
	{
		$query=$this->db->query("SELECT * FROM `tbl_san_pham` WHERE `ten_san_pham` Like '%".$key."%' ");
		$result = $query->result_array();
		return $result;
	}
	public function countsearchbykey($key)
	{
		$query=$this->db->query("SELECT COUNT(ten_san_pham) FROM `tbl_san_pham` WHERE `ten_san_pham` Like '%".$key."%' ");
		$result = $query->result_array();
		return $result;
	}
	public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
}

/* End of file m_san_pham.php */
/* Location: ./application/models/san_pham/m_san_pham.php */