<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
	<!-- nav -->
	
	<!-- nav -->

	<form action="<?= base_url() ?>/admin/updateSp" method="post" enctype="multipart/form-data">
		  <section class="vh-100 gradient-custom">
		  <div class="container py-5 h-100">
		    <div class="row d-flex justify-content-center align-items-center h-100">
		      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
		        <div class="card bg-dark text-white" style="border-radius: 1rem;">
		          <div class="card-body p-5 text-center">

		            <div class="mb-md-5 mt-md-4 pb-5">

		              <h2 class="fw-bold mb-2 text-uppercase">Sua sản phẩm</h2>
		              <?php foreach ($alldata as $value): ?>
		               <div class="form-outline form-white mb-4">
		              	
		                <input type="hidden" id="typeEmailX" name="idXe" class="form-control form-control-lg" value="<?= $value['idXe'] ?>" />
		                
		              </div>  
					

		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Tên</label>
		                <input type="text" id="typeEmailX" name="ten" class="form-control form-control-lg" value="<?= $value['ten'] ?>" />
		                
		              </div>


		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typePasswordX">Giá</label>
		                <input type="text" id="typePasswordX" name="gia" class="form-control form-control-lg" value="<?= $value['gia'] ?>" />
		                
		              </div>
					
					  <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Hãng</label>
						
		              	<select name="idHang">
							<?php foreach ($alldata as $value): ?>
							 <option value="<?= $value['idHang'] ?>"><?= $value['idHang'] ?></option>
							<?php endforeach ?>
						</select>
		                
		                

		              </div>
		              

		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Loại</label>
		              	<select name="loai" id="">
		              		<option value="xe ga">Xe ga</option>
		              		<option value="xe con">Xe côn</option>
		              		<option value="xe so">Xe số</option>
		              		<option value="xe dien">Xe điện</option>

		              	</select>
		                
		              </div>

		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Số lượng</label>
		                <input type="text" id="typeEmailX" name="soLuong" class="form-control form-control-lg" value="<?= $value['soLuong'] ?>" />
		                
		              </div>

		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Kích thước</label>
		                <input type="text" id="typeEmailX" name="kichThuoc" class="form-control form-control-lg" value="<?= $value['kichThuoc'] ?>" />
		                
		              </div>

		               <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Trọng lượng</label>
		                <input type="number" id="typeEmailX" name="trongLuong" class="form-control form-control-lg" value="<?= $value['trongLuong'] ?>" />
		                
		              </div>

		               <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Dung tích xy-lanh</label>
		                <input type="text" id="typeEmailX" name="dungTichXL" class="form-control form-control-lg" value="<?= $value['dungTichXL'] ?>" />
		                
		              </div>

		               <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Dung tích bình xăng</label>
		                <input type="number" step="0.01" id="totalAmt" name="dungTichBX" class="form-control form-control-lg" value="<?= $value['dungTichBX'] ?>" />
		                
		              </div>

		               <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Mức tiêu thụ nhiên liệu</label>
		                <input type="number" step="0.01" id="totalAmt" name="tieuThu" class="form-control form-control-lg" value="<?= $value['tieuThu'] ?>" />
		                
		              </div>
					
					</div>

		               <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Giới thiệu</label>
		                <input type="text" name="gioiThieu" class="form-control form-control-lg" value="<?= $value['gioiThieu'] ?>" />
		                
		              </div>
		              

		              <div class="form-outline form-white mb-4">
		              	<label class="form-label" for="typeEmailX">Ảnh</label>
		                <input type="file" name="fileToUpload" id="fileToUpload">
		                
		              </div>

		              <?php endforeach ?>

		              <input type="submit" value="UPDATE" name="submit">

		              <div class="d-flex justify-content-center text-center mt-4 pt-1">
		                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
		                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
		                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
		              </div>

		            </div>

		            

		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
</section>
</form>





</body>
</html>