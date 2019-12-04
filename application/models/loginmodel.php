<?php 
class Loginmodel extends CI_Model
{
	public function validateLogin($username,$password)
	{
		$temp=$this->db->get_where('users',array('uname'=>$username,'pass'=>$password));
		$q= $temp->result();
		//print_r($temp);
		//print_r($q);die;
		if($temp->num_rows()==1)
		{
			return $temp->row()->id;
		}else{
			return FALSE;
		}
	}
	public function register($array)
	{
		return $this->db->insert('users',$array);
	}
}