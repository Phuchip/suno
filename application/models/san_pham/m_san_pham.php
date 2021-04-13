<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_san_pham extends CI_Model {
	function __construct() {
        $this->proTable = 'tbl_san_pham';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }
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
    public function getOrder($id){
        $this->db->select('o.*, c.ten, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.anh_san_pham, p.ten_san_pham, p.gia_moi');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.id_san_pham', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }
}

/* End of file m_san_pham.php */
/* Location: ./application/models/san_pham/m_san_pham.php */