<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/personal-43.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">เข้าสู่ระบบ</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="login.check.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">เบอร์โทรศัพท์มือถือ</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
										เบอร์โทรศัพท์มือถือไม่ตรงกับที่ลงทะเบียนไว้
									</div>
								</div>

								<div class="mb-3">
								<label class="text-muted" for="password" id="password">รหัสผ่าน</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	จำเป็นต้องระบุรหัสผ่าน
							    	</div>
									<div class="mb-2 w-100">
										<a href="forgot.html" class="float-start">
											ลืมรหัสผ่าน?
										</a>
									</div>
								</div>
								<br>
								<div class="d-flex align-items-center">
								<a href="index.php" class="text-light"><button type="" class="btn btn-danger ms-0">
									ย้อนกลับ
								</a></button>
									<button type="submit" class="btn btn-primary ms-auto">
										เข้าสู่ระบบ
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								ยังไม่มีบัญชีผู้ใช้ ? <a href="register.php" class="text-primary">สมัครเลย</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
