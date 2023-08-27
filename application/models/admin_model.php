<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}
	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin')->num_rows();
	}
	// lay tat ca don hang
	public function getAllDonHang()
	{
		 return $this->db->get('donhang')->result_array();
	}
	//lay tat ca lien he
	public function getAllLH()
	{
		 return $this->db->get('lienhe')->result_array();
	}
	//lya lien he theo id
	public function getLienHe($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('lienhe')->result_array();
	}
	//update LienHe
	public function updateLH($id,$link)
	{
		$this->db->where('id', $id);
		 $object = array('link'=>$link);
		 $this->db->update('lienhe', $object);
	}
	//lay tat ca san pham
	public function getAllSp()
	{
		 return $this->db->get('sanpham')->result_array();
	}
	//lay san pham theo id
	public function getSp($idXe)
	{
		$this->db->where('idXe', $idXe);
		return $this->db->get('sanpham')->result_array();
	}

	//lay tat thong tin tat ca hang
	public function getAllHang()
	{
		 return $this->db->get('hang')->result_array();
	}

	public function addSp($ten,$gia,$idHang,$loai,$soLuong,$kichThuoc,$trongLuong,$dungTichXL,$dungTichBX,$tieuThu,$anh,$gioiThieu)
	{
		$object= array('ten'=>$ten,'gia'=>$gia,'idHang'=>$idHang,'loai'=>$loai,'soLuong'=>$soLuong,'kichThuoc'=>$kichThuoc,'trongLuong'=>$trongLuong,'dungTichXL'=>$dungTichXL,'dungTichBX'=>$dungTichBX,'tieuThu'=>$tieuThu,'anh'=>$anh,'gioiThieu'=>$gioiThieu);
		$this->db->insert('sanpham', $object);
	}

	//xoa sp

	public function delSp($idXe)
	{
		$this->db->where('idXe', $idXe);
		$this->db->delete('sanpham');	
	}
// ham update san pham
	public function updateSp($idXe,$ten,$gia,$idHang,$loai,$soLuong,$kichThuoc,$trongLuong,$dungTichXL,$dungTichBX,$tieuThu,$anh,$gioiThieu)
	{
		$this->db->where('idXe', $idXe);

		$object= array('ten'=>$ten,'gia'=>$gia,'idHang'=>$idHang,'loai'=>$loai,'soLuong'=>$soLuong,'kichThuoc'=>$kichThuoc,'trongLuong'=>$trongLuong,'dungTichXL'=>$dungTichXL,'dungTichBX'=>$dungTichBX,'tieuThu'=>$tieuThu,'anh'=>$anh,'gioiThieu'=>$gioiThieu);

		$this->db->update('sanpham', $object);	
	}

	//them hãng

	public function addHang($ten)
	{
		$object= array('tenHang'=>$ten);
		$this->db->insert('hang', $object);
	}
	

	//del hang

	public function delHang($idHang)
	{
		$this->db->where('idHang', $idHang);
		$this->db->delete('Hang');
	}

	//get hang theo id
	public function getHang($idHang)
	{
		$this->db->where('idHang', $idHang);
		return $this->db->get('Hang')->result_array();
	}

	//getAll khach hang

	public function getAllUser()
	{
		 return $this->db->get('user')->result_array();
	}

	//xoa user

	public function delUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');	
	}

	//get User

	public function getUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->result_array();	
	}

	//update user
	public function updateUser($id,$username,$password,$fullname,$address,$phone)
	{
		$this->db->where('id', $id);
		$object = array('username'=>$username, 'password'=>$password, 'fullname'=>$fullname, 'address'=>$address, 'phone'=>$phone);
		$this->db->update('user', $object);
	}

	//xoa hang
	public function delDonHang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('donhang');
	}

	//update HAng

	public function updateHang($idHang,$ten)
	{
		$this->db->where('idHang', $idHang);
		$object = array('tenHang'=>$ten);
		$this->db->update('hang',$object);
	}

	

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */