<?php 

class Model_Slots extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSlotData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM venues WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM venues";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('venues', $data);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('venues', $data);
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('venues');
		return ($delete == true) ? true : false;
	}

	public function updateSlotAvailability($data, $id)
	{
		if($id) {
			$this->db->where('id', $id);
			$update = $this->db->update('venues', $data);
			return ($update == true) ? true : false;
		}
	}

	public function getAvailableSlotData()
	{
		$sql = "SELECT * FROM venues WHERE availability_status = ? AND active = ?";
		$query = $this->db->query($sql, array(1, 1));
		return $query->result_array();
	}

	public function countTotalSlots()
	{
		$sql = "SELECT * FROM venues";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countTotalAvailableSlots(){
		$sql = "SELECT * FROM venues WHERE availability_status = 1";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
