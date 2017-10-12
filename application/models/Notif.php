<?php
class Notif extends CI_Model {
	public function selectAll() {
    $this->db->select('*');
		$this->db->from('notif');
		$this->db->join('user', 'notif.user_comment = user.id_user');
    $this->db->join('lamaran', 'notif.lamaran_id = lamaran.id_lamaran');
		$this->db->order_by('id_notif', 'desc');
		return $this->db->get()->result();
  }
	public function update() {
		$id = $this->input->post('id_notif');
		$data1 = array('cek' => "1");
		$this->db->where('id_notif', $id);
		$this->db->update('notif', $data1);
	}
	public function update1() {
		$id = $this->input->post('user_id');
		$data1 = array('cek' => "1");
		$this->db->where('user_parent', $id);
		$this->db->update('notif', $data1);
	}
	function getRows($params = array()) {
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('notif');
		$this->db->join('user', 'notif.user_comment = user.id_user');
		$this->db->join('lamaran', 'notif.lamaran_id = lamaran.id_lamaran');
		$this->db->where('notif.user_parent', $user_id);
		$this->db->order_by('id_notif', 'desc');

        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get();

        return ($query->num_rows() > 0)?$query->result_array():FALSE;
  }
}
