<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<style>
body {
    background-color: #7DCEA0;
}
</style>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/personal-43.png"
                            alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">เข้าสู่ระบบ</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off"
                                action="login.check.php" onsubmit="rememberMe2()">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">อีเมล์ผู้ใช้งาน</label>
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                                    <div class="invalid-feedback">
                                        กรุณาระบุอีเมล์ที่ได้ลงทะเบียนไว้
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="text-muted" for="password">รหัสผ่าน</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        กรุณาระบุรหัสผ่าน
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">จดจำรหัสผ่าน</label>
                                    </div>
                                    <div class="mb-2 w-100">
                                        <a href="forgot.pass.php" class="float-start">
                                            ลืมรหัสผ่าน?
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="d-flex align-items-center">
                                    <a href="logout.php" class="text-light btn btn-danger ms-0">
                                        ย้อนกลับ
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        เข้าสู่ระบบ
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                ยังไม่มีบัญชีผู้ใช้ ? <a href="register.php" class="text-primary">สมัครสมาชิก</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if cookies exist and set the input values
        if (getCookie("emailCustomer") && getCookie("passwordCustomer")) {
            document.getElementById("email").value = getCookie("emailCustomer");
            document.getElementById("password").value = getCookie("passwordCustomer");
            document.getElementById("rememberMe").checked = true;
        }
    });

    function rememberMe2() {
        if (document.getElementById("rememberMe").checked) {
            setCookie("emailCustomer", document.getElementById("email").value, 30);
            setCookie("passwordCustomer", document.getElementById("password").value, 30);
            console.log("11111");
        } else {
            setCookie("emailCustomer", "", -1);
            setCookie("passwordCustomer", "", -1);
            console.log("2222");
        }
    }

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    </script>

</body>

</html>