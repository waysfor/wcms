<?php
class Manage_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function login() {
		$sql = "SELECT * FROM `manage` WHERE `username` = ? AND `password` = ?";
		$query = $this -> db -> query($sql, array($username,md5($password)));
		$rs = $query -> result_array();
		return isset($rs[0]) ? $rs[0] : array();
	}
}
?>