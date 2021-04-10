<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('san_pham/m_san_pham');
	}
	function index()
	{
		// $result['data']=$this->m_san_pham->dispsp1();
		// $this->load->view('main/index',$result);
		$this->load->view('main/main');
	}
	public function main()
	{
		$this->load->view('main/index');
	}
	public function cake()
	{
		$this->load->view('navbar/cake');
	}
	public function menu()
	{
		$this->load->view('navbar/menu');
	}
	public function about()
	{
		$this->load->view('navbar/about-us');
	}
	public function cart()
	{
		$this->load->view('cart/cart');
	}
	public function login()
	{
		$this->load->view('user/Dang_nhap');
	}
	public function register()
	{
		$this->load->view('user/Dang_ky');
	}
	public function wishlist()
	{
		$this->load->view('user/wishlist');
	}
	public function account()
	{
		$this->load->view('user/account');
	}
	public function don_hang()
	{
		$this->load->view('user/don_hang');
	}
	public function blog()
	{
		$this->load->view('navbar/blog');
	}
	public function do_lam_banh()
	{
		$this->load->view('product/do_lam_banh');
	}
	public function do_nau_an()
	{
		$this->load->view('product/do_nau_an');
	}
	public function do_pha_che()
	{
		$this->load->view('product/do_pha_che');
	}
	public function contact()
	{
		$this->load->view('navbar/contact');
	}
}

/* End of file Suno.php */
/* Location: ./application/controllers/Suno.php */