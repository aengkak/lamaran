<?php
class User extends CI_Model {
	public function selectAll() {
		return $this->db->get('user')->result();
	}
	public function add() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array('username' => $username,'password' => md5($password));
		$this->db->insert('user', $data);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->delete('user', array('id' => $id));
	}
	public function edit($id){
		$this->db->where('id', $id);
		return $this->db->get('user')->row();
	}
	public function update(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array('username' => $username,'password' => md5($password));
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
}