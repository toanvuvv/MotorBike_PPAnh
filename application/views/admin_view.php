<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<body>
	
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?= base_url() ?>admin/index">ADMIN </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Danh sach
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="<?= base_url() ?>admin/danhSachSp/">Sản phẩm</a>
	          <a class="dropdown-item" href="<?= base_url() ?>admin/danhSachHang/">Hãng</a>
	          <a class="dropdown-item" href="<?= base_url() ?>admin/danhSachUser/">Người dùng</a>
            <a class="dropdown-item" href="<?= base_url() ?>admin/danhSachLienHe/">Quản lý thông tin liên hệ</a>
	          <div class="dropdown-divider"></div>
	          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?= base_url() ?>admin/logout"> Đăng xuất</a>
	      </li>
	    </ul>
	    
	  </div>
</nav>
<!-- body     -->


<div class="container">
  <h2>Danh sách đơn hàng </h2>
  
 
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID đơn</th>
        <th>tài khoản</th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>ID xe</th>
        <th>Số lượng</th>
        <th>Ngày đặt</th>
        

        

        
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($alldata as $value): ?>
        <tr>
          <td><?= $value['id'] ?></td>
          <td><?= $value['username'] ?></td>
          <td><?= $value['fullname'] ?></td>
          <td><?= $value['phone'] ?></td>
          <td><?= $value['address'] ?></td>
          <td><?= $value['idXe'] ?></td>
          <td><?= $value['soLuong'] ?></td>
          <td><?= $value['ngayDat'] ?></td>

          
          <td>
            
            <a href="<?= base_url() ?>admin/deleteDonHang/<?= $value['id'] ?>" class="btn btn-danger">Xóa đơn</a>
          </td>

        </tr>
      <?php endforeach ?>
      
      
    </tbody>
  </table>
</div>


<!-- body     -->



</body>
</html>


 