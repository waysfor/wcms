<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	public $userid;
	public $username;
	public $realname;
	public $myrole;
	public $item;
	function __construct(){
		parent::__construct();
		$user = $this -> session -> userdata('user');
		$this -> userid = isset($user['id']) ? $user['id'] : 0;
		$this -> username = isset($user['name']) ? $user['name'] : 0;
		$this -> realname = isset($user['real']) ? $user['real'] : 0;
		$this -> myrole = isset($uer['role']) ? $uer['role'] : 0;
		$this -> item = $this -> uri ->segment('2','0');
		$this->config->load('manage');
		
		//判断是否验证用户身份
		if($this -> userid <= 0){
			if($this -> item != 'login' && $this -> item != 'logout') {
				header("Location: /manage/login");
				exit;
			}
		}
	}
	function index(){
		$this -> load ->view('manage/login');
	}
	function login(){
		if($this -> input -> is_post()){
			$username = $this -> input -> post('cname');
			$password = $this -> input -> post('cpwd');
			$this -> load -> model('manage_model');
			$user = $this -> manage_model -> login($username,$password);
			$role = isset($user['role']) ? $user['role'] : 0;
			$res = array();
			$res['stat'] = 0;
			$res['data'] = array();
			if($role <= 0){ //登录失败
				$res['stat'] = 1;
			} else { //登录成功
				//userid username realname写入到session
				$usersess = array();
				$usersess['id'] = $user['id'];
				$usersess['name'] = $user['username'];
				$usersess['real'] = $user['realname'];
				$this->session->set_userdata(array('user' => $usersess));	//role addtm lasttm lastip 写入到cookie
				$usercookie = array();
				$rolearray = $this->config->item('role');
				$statusarray = $this->config->item('status');
				$genderarray = $this->config->item('gender');
				$usercookie['role'] = $rolearray[$role];
				$usercookie['addtm'] = date('Y-m-d H:i:s', $user['addtm']);
				$usercookie['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
				$usercookie['lastip'] = long2ip($user['lastip']);
				//$result = $this -> user_course_model -> edit_save($data,$con);
				$usercookie = json_encode($usercookie);
				$cookie = array(
					'name'   => 'user',
					'value'  => $usercookie,
					'expire' => 60*60*24*1000 //1000天过期时间
				);
				$this->input->set_cookie($cookie);
				$res['data'] = $user;
			} 
			echo json_encode($res);
			exit;
		} else {
			$this -> load ->view('manage/login');
		}
	}
/*===========================================================
		if($this -> userid <= 0) {
			if($this -> item != 'login' && $this -> item != 'logout') {
				header("Localhost: /manage/login");
				exit;
			}
		}



	function index(){
		if($this -> input -> is_post()){
			echo '1';
		} else {
			$this -> load ->view('manage/login');
		}
	}
	function login(){
		var_dump('111');
		var_dump($this->input->is_post());
		exit;
		if($this -> input -> is_post()){
			$username = $this -> input -> post('username');
			$password = $this -> input -> post('password');
			$this -> load -> model('manage_model');
			$user = $this -> manage_model -> login($username,$password);
			$role = isset($user['role']) ? $user['role'] : 0;
			$res = array();
			$res['stat'] = 0;
			$res['data'] = array();
			if($role <= 0){
				$res['stat'] = 1;
			} else {
				
			}
		} else {
			$this -> load -> view('manage/login');
		}
	}



	public $c_id;	//管理员的参数为c_;
	public $item;
	
	function __construct() {
		parent::__construct();
		$this -> c_id = isset($c['id'])?$c['id']:0;
		$this -> item = $this -> uri -> segment(2);
		if($this -> c_id <= 0){
			if($this -> item != 'login' && $this-> item != 'logout'){
				header("Location: /manage/login");
				exit;
			}
		}
	}
	private function _header() {
		if($this -> item != 'login' && $this -> item != 'logout') {
			$this -> load -> view('manage/header');
		}
	}

	function index() {
		$this->load->view('manage/index');
	}
	function login(){
		if($this -> input -> is_post()){
			$username = $this -> input -> post('username');
			$password = $this -> input -> post('password');
			$this -> load -> model('manage_model');
			$user = $this -> manage_model -> login($username,$password);
			$role = isset($user['role']) ? $user['role'] : 0;
			$res = array();
			$res['stat'] = 0;
			$res['data'] = array();
			if($role <= 0){
				$res['stat'] = 1;
			} else {
				
			}
		} else {
			$this -> load -> view('manage/login');
		}
	}
=============================================================*/
}