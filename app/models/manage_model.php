<?php
class Manage_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function login($username,$password) {
		$sql = "SELECT * FROM `member` WHERE `username` = ? AND `password` = ?";
		$query = $this -> db -> query($sql, array($username, md5($password)));
		$rs = $query -> result_array();
		return isset($rs[0]) ? $rs[0] : array();
	}
	
	function menu(){
		$sql = "SELECT * FROM  `wcms_c_menu` WHERE 1 order by `id` <> 0 desc , `index` asc";
		$query = $this -> db -> query($sql);
		return $query -> result_array();
	}
	
	function loginedit($id){
		$sql = "UPDATE  `member` SET  `lasttm` =  '".mktime()."' WHERE  `member`.`id` =".$id;
		$this -> db -> query($sql);
	}
}
?>