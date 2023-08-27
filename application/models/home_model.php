<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	//login
	public function login($username, $password)
	{

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user')->num_rows();

	}
	// noi hai bang San pham va Hang
	public function getSp_Hang()
	{

		return $this->db->get('sanpham')->result_array();
		

	}

	public function search($query)
	{
		
		$this->db->like('sanpham.ten', $query);
		return $this->db->get('sanpham')->result_array();
		

	}

	//lay link
	public function lienHe($ten)
	{
		
		$this->db->like('tenMangXH', $ten);
		return $this->db->get('lienhe')->result_array();
		

	}

	public function getSp($id)
	{
		$this->db->select('*');
		$this->db->from('sanpham');
		$this->db->join('hang', 'hang.idHang = sanpham.idHang');
		$this->db->where('idXe', $id);
		return $this->db->get()->result_array();
		

	}

	public function getUser($username)
	{	
		$this->db->where('username', $username);

		return $this->db->get('user')->num_rows();
		
	}

	public function getXeGa()
	{	
		$this->db->where('loai','xe ga');

		return $this->db->get('sanpham')->result_array();
		
	}

	public function getXeSo()
	{	
		$this->db->where('loai','xe so');

		return $this->db->get('sanpham')->result_array();
		
	}

	public function getXeCon()
	{	
		$this->db->where('loai','xe con');

		return $this->db->get('sanpham')->result_array();
		
	}

	public function getUserData($username)
	{	
		$this->db->where('username', $username);
		return $this->db->get('user')->result_array();
		
	}
	// thm vao bang nhung don hang chua xu ly
	// public function addHoaDonXL($fullname,$phone,$address,$idXe,$idUser)
	// {	
	// 	$object = array('fullname'=>$fullname, 'phone'=>$phone, 'fullname'=>$fullname, 'phone'=>$phone, 'address'=>$address);
	// 	$this->db->insert('user', $object);
		
	// }

	public function registerUser($username,$password,$fullname,$phone,$address)
	{	
		
		$object = array('username'=>$username, 'password'=>$password, 'fullname'=>$fullname, 'phone'=>$phone, 'address'=>$address);
		$this->db->insert('user', $object);
				
	}

	public function loc_idHang($idHang)
	{
	
	$this->db->select('*');

		$this->db->from('sanpham');

		$this->db->join('hang', 'sanpham.idHang = hang.idHang');

		$this->db->group_by('hang.idHang');

		$this->db->where('sanpham.idHang', $idHang);

		return $this->db->get()->result_array();	
		

	}


	//so luong sp trong kho
	public function soLuongKho($idXe)
	{
	$this->db->select('soLuong');
	$this->db->where('idXe', $idXe);
	return $this->db->get('sanpham')->result_array();	
	}
	//update lai so luong xe
	public function updateSLK($idXe,$SLUpdate)
	{
	$this->db->where('idXe', $idXe);
	$object = array('soLuong'=>$SLUpdate);
	$this->db->update('sanpham', $object);	
	}

	//them don hang

	public function addDonHang($fullname,$phone,$address,$idXe,$soLuong,$ngayDat,$username)
	{
		$object = array('fullname'=>$fullname,'phone'=>$phone,'address'=>$address,'idXe'=>$idXe,'soLuong'=>$soLuong,'ngayDat'=>$ngayDat,'username'=>$username);
		$this->db->insert('donhang', $object);	
	}


	//don hang da dat

	public function lichSu($username)
	{
		$this->db->select('sanpham.anh,donhang.fullname,donhang.phone,donhang.address,donhang.soLuong ');
		$this->db->from('donhang');
		$this->db->join('sanpham', 'sanpham.idXe = donhang.idXe');
		$this->db->where('donhang.username',$username);
		return $this->db->get()->result_array();
	}
}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */