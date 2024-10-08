<?php 

class Model_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCategoryData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM events_category WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM events_category";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getActiveCategoryData() 
	{
		$sql = "SELECT * FROM events_category WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		
	}

	public function create($data = '')
	{
		$create = $this->db->insert('events_category', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('events_category', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('events_category');
		return ($delete == true) ? true : false;
	}
}
