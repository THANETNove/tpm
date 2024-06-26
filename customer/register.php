<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a Sign up page template based on Bootstrap 5">
	<title> Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<style>
        body{
            background-color: #7DCEA0;
        }
    </style>
<body>
<!--?php 
	require_once('dbcon.php');
	$cust = 'SELECT * FROM customer';
	$result = $db->query($cust);

	while($row = $result->fetch_assoc()){

	}
?-->
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/personal-43.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">สมัครสมาชิก</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="register.check.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">อีเมล์สำหรับใช้งาน</label>
									<input id="Email" type="email" class="form-control" name="Email" value="" required autofocus>
									<div class="invalid-feedback">
										ระบุอีเมล์สำหรับใช้งาน
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">รหัสผ่าน</label>
									<input id="password" type="password" class="form-control" name="password" min="8" max="16" required>
								    <div class="invalid-feedback">
								    	ต้องระบุรหัสผ่าน
							    	</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="confirmPassword">ยืนยีนรหัสผ่านอีกครั้ง</label>
									<input id="confirmPassword" type="password" class="form-control" name="confirmPassword" value="" required>
									<div class="invalid-feedback">
										รหัสผ่านไม่ตรงกัน
									</div>
								</div>
								</div>

								

								<div class="align-items-center d-flex">
								<a href="index.php" class="text-light"><button type="" class="btn btn-danger ms-0">
								ย้อนกลับ
								</a></button>
									<button type="submit" class="btn btn-primary ms-auto">
										สมัครสมาชิก	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								สมัครสมาชิกแล้ว ? <a href="login.php" class="text-primary">เข้าสู่ระบบ</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						<!--Copyright &copy; 2017-2021 &mdash; Your Company--> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/login.js"></script>
</body>
</html>
