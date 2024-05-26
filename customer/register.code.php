<?php 
require_once('dbcon.php');
require_once('fn.php');
if (!isset($_SESSION['userId'])) {
    redirect('login.php');
    if(($_SESSION['userStatus'] = 0)){
        redirect('register.code.php');
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>รหัสอ้างอิงการสมัคร</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<style>
        body{
            background-color: #7DCEA0;
        }
    </style>
<body>
	<section class="">
		<div class="container">
			<div class="row justify-content-sm-center">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/personal-43.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">ยืนยันรหัสอ้างอิงการสมัคร</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="on" action="register.confirm.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">ใส่รหัสยืนยันการสมัครสมาชิก</label>
									<input id="codeCheck" type="text" class="form-control" name="codeCheck" value="" required autofocus>
								</div>
								<div class="d-flex align-items-center">
								<a href="logout.php" class="text-light btn btn-danger ms-0">
									ย้อนกลับ
								</a>
									<button type="submit" class="btn btn-primary ms-auto">
										ยืนยันการรหัสอ้างอิง
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								
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
<?php 
}
?>