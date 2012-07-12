<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	public $userid;
	public $username;
	public $realname;
	public $act;
	//public $myrole;
	public $item;
	function __construct(){
		parent::__construct();
		$user = $this -> session -> userdata('user');
		$this -> userid = isset($user['id']) ? $user['id'] : 0;
		$this -> username = isset($user['name']) ? $user['name'] : 0;
		$this -> realname = isset($user['real']) ? $user['real'] : 0;
		//$this -> myrole = isset($uer['role']) ? $uer['role'] : 0;
		$this -> item = $this -> uri ->segment('2','0');
		$this->config->load('manage');
		
		//判断是否验证用户身份
		if($this -> userid <= 0){
			if($this -> item != 'login' && $this -> item != 'logout') {
				header("Location: /manage/login");
				exit;
			}
		}
		$this->_header();
	}
	private function _userinfo(){				//后台用户登录信息
		$out = array();
		$out['user']['id']   = $this->userid;
		$out['user']['name'] = $this->username;
		$out['user']['real'] = $this->realname;
		$usercookie  = $this->input->cookie('user');
		$usercookie  = json_decode($usercookie, true);
		$out['user'] = array_merge($out['user'], $usercookie);
		return $out;
	}
	private function _nav(){
		$this -> load ->model('manage_model');
		$nav['menu'] = $this -> manage_model -> menu();
		$this -> load -> helper('url');
		$nav['uri1'] = $this -> uri -> segment(2,0);
		$nav['uri2'] = $this -> uri -> segment(3,0);
		return $this -> load -> view('manage/frame/sider/menu', $nav, true);
	}
	private function _header(){
		if($this -> item != 'login' && $this -> item != 'logout'){
			$header['nav'] = $this -> _nav();
			$header['out'] = $this -> _userinfo();
			$this->load->view('manage/frame/header', $header);
		}
	}
	function index(){
		$this -> load ->view('manage/index.php');
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
				$this -> session -> set_userdata(array('user' => $usersess));	//role addtm lasttm lastip 写入到cookie
				$usercookie = array();
				$rolearray = $this->config->item('role');
				$statusarray = $this->config->item('status');
				$genderarray = $this->config->item('gender');
				$usercookie['role'] = $rolearray[$role];
				$usercookie['role_lv'] = $role;
				$usercookie['addtm'] = date('Y-m-d H:i:s', $user['addtm']);
				$usercookie['lasttm'] = date('Y-m-d H:i:s', $user['lasttm']);
				$usercookie['lastip'] = long2ip($user['lastip']);
				$this -> manage_model -> loginedit($user['id']);	//登录时间重新入库
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
	function course_resource($act = '', $val = 0){
	}
	function logout(){
		//清理session
		$this->session->unset_userdata('user');
		//清理cookie
		$cookie = array(
			'name'   => 'user',
			'value'  => '',
			'expire' => ''
		);
		$this->input->set_cookie($cookie);
		//跳转到登录页
		echo '<script>window.location.href="/manage/login";</script>';
		exit;
	}
	function history($act = ''){
		switch($act){
			case 'list':
		$this -> load ->view('manage/index.php');
			break;
			case 'add':
			break;
			case 'add_save':
			break;
			case 'del':
			break;
			case 'edit':
			break;
			case 'edit_save':
			break;
			default:
				show_404();
			break;
		}
	}
}