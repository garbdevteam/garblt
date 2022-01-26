<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GARBLT</title>

    <!-- Bootstrap -->
    <link href="../backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../backend/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../backend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../backend/build/css/custom.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <img src="../frontend/images/GARBLT-logo.png" alt="">

                <section class="login_content">
                <form action="{{route('admin.login')}}" method="POST">
                        @csrf
                        <h1>تسجيل الدخول</h1>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="أسم المستخدم"
                                required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="كلمة المرور"
                                required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">تسجيل الدخول</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <p>حقوق النسخ © 2020-{{date('Y')}} الهيئة العامة للطرق والكباري والنقل البري - مصر </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
