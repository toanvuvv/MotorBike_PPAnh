<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xemay extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->model('home_model');
	}

	public function index()
	{
		$data = $this->home_model->getSp_Hang();
		$data['alldata']=$data; 
		$this->load->view('home_view',$data);
	}

	public function xeGa()
	{
		$data = $this->home_model->getXeGa();
		$data['alldata']=$data; 
		$this->load->view('home_view',$data);
	}

	public function xeSo()
	{
		$data = $this->home_model->getXeSo();
		$data['alldata']=$data; 
		$this->load->view('home_view',$data);
	}

	public function xeCon()
	{
		$data = $this->home_model->getXeCon();
		$data['alldata']=$data; 
		$this->load->view('home_view',$data);
	}


	// xem chi tiet san pham
	public function detailSp($idXe)
	{
		$data = $this->home_model->getSp($idXe);
		$data['alldata'] = $data;
		$this->load->view('detailSp_view', $data);
		
		
	}
	//login

	public function login()
	{
		$this->load->view('login_view');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username == "" || $password == ""){
			echo 'nhap day du thong tin';
		}
		else
		{
			$result = $this->home_model->login($username, $password);
			if($result == 1)
			{
				//tao session
				$this->session->set_userdata('member',$username);
				redirect('xemay/index','refresh');
			}
			else
			{
				echo 'sai tai khoan hoac mat khau';
			}
		}
				
	}

	//logout

	public function logout()
	{
		if($this->session->userdata('member')){
			// huy session
			$this->session->unset_userdata('member');
			redirect('xemay/index','refresh');
		}
				
	}

	
	public function RegisterUser_view()
	{
		$this->load->view('register_view');
				
	}

	public function search()
	{
		$query = $this->input->post('query');
		// $data = $this->home_model->search($query);
		// $data['alldata'] = $data;
		// $this->load->view('home_view', $data);
		echo $query;	

	}

	public function lienHe($ten)
	{
		$link1="";
		$data = $this->home_model->lienHe($ten);
		$link = $data[0];
		foreach ($link as $value) {
			$link1 = $value;
		}
		redirect($link1,'refresh');

	}

	public function registerUser()
	{
		$fullname = $this->input->post('fullname');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->home_model->getUser($username)==1){
			print_r('username da ton tai');

		}else {
			
			$this->home_model->registerUser($username,$password,$fullname,$phone,$address);
			// tao session
			$this->session->set_userdata('member',$username);
			redirect('xemay/index','refresh');
			
		}		
	}

	//nut user

	public function detailUser()
	{
		if($this->session->userdata('member')){
			redirect('xemay/infoUser','refresh');
		}
		else
		{
			redirect('xemay/login','refresh');
		}	
				
	}
	//lay du lieu user
	public function infoUser()
	{
		if($this->session->userdata('member')){
			$username = $this->session->userdata('member');
			
			$data = $this->home_model->getUserData($username);
			$data['alldata'] = $data;
			$this->load->view('infoUser_view', $data);
			

		}
					
	}
	//sua thong tin ca nhan view
	public function updateUser_view($id)
	{
		if( $this->session->userdata('member'))
		{
			$data = $this->admin_model->getUser($id);
			$data['alldata'] = $data;
			$this->load->view('updateUser_view', $data);
		}
			
	}

	//update

	public function updateUser()
	{
		if($this->session->userdata('member'))
		{
			$id = $_POST['id'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fullname'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$this->admin_model->updateUser($id,$username,$password,$fullname,$address,$phone);
			redirect('xemay/detailUser','refresh');
		}
		
	}

	public function lichSuDonHang()
	{
		if($this->session->userdata('member')){
			$username = $this->session->userdata('member');
			
			$data = $this->home_model->lichSu($username);
			$data['alldata'] = $data;
			$this->load->view('donHang_view', $data);

			

		}
					
	}

	//view dat xe

	public function datXe_view($id)
	{
		if($this->session->userdata('member')){
			$data = $this->home_model->getUserData($this->session->userdata('member'));
			$data['alldata'] = $data;
			$this->session->set_userdata('idXe',$id);
			$this->load->view('datXe_view', $data);

		}
		else
		{
			redirect('xemay/login','refresh');

		}
					
	}
	//dat hang
	public function datXe()
	{
		if($this->session->userdata('member')){
			$fullname = $this->input->post('fullname');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$idXe = $this->input->post('idXe');
			$username = $this->input->post('username');
			$soLuong = $this->input->post('soLuong');
			$ngayDat = date("Y/m/d");

			$soLuongKho = $this->home_model->soLuongKho($idXe);	
			
			$SLK = 0;
			$mang = $soLuongKho[0];
			// print_r($mang);
			foreach ($mang as $value) {
				$SLK= $value;				
			}
			if($soLuong > $soLuongKho){
				echo 'Sản phẩm đã hết';
			}else {
				$SLUpdate = $SLK - $soLuong;
				$this->home_model->updateSLK($idXe,$SLUpdate);
				$this->home_model->addDonHang($fullname,$phone,$address,$idXe,$soLuong,$ngayDat,$username);
				
				redirect('xemay/index','refresh');

			}
				
		}
			// $this->home_model->addHoaDonXL($fullname,$phone,$address,$idXe,$idUser);
		else
		{
			redirect('xemay/login','refresh');
			redirect('xemay/index','refresh');
		}
			}
					
	}



/* End of file xemay.php */
/* Location: ./application/controllers/xemay.php */