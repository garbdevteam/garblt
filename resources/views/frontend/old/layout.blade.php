<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css" />

    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&display=swap" rel="stylesheet" />

    <!-- carousel -->
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css" />

    <!-- main style -->
    <link rel="stylesheet" href="/frontend/css/styles.css" />

    <title>الهيئة العامة للطرق والكباري والنقل البري</title>
</head>

<body>
    <section class="header">
        <div class="container">
            <div class="logo">
                <img src="/frontend/images/GARBLT-logo.png" alt="main logo" />
            </div>
            <div class="search">
                <form>
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">
                                19487
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.home')}}">الرئيسية</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            عن الهيئة
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                                href="{{route('frontend.about_authority.history_of_authority')}}">نبذة تاريخية عن
                                الهيئة</a>
                            <a class="dropdown-item"
                                href="{{route('frontend.about_authority.organizational_structure')}}">الهيكل
                                التنظيمي</a>
                            <a class="dropdown-item"
                                href="{{route('frontend.about_authority.importance_of_authority')}}">دور و اهمية
                                الهيئة</a>
                                <a class="dropdown-item"
                                href="{{route('frontend.about_authority.authority_leaders')}}">قيادات الهيئة</a>
                                <a class="dropdown-item"
                                href="{{route('frontend.about_authority.chairman_word')}}">كلمة رئيس مجلس الادارة</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            المركز الاعلامي
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('frontend.news.index')}}">اخبار الهيئة</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            طرق
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('frontend.roads.road_signs')}}">اشارات و علامات الطرق</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.traffic_control')}}">وسائل التحكم المروري</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.collection_stations_and_scales')}}">محطات التحصيل والموازين</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.national_roads_project')}}">المشروع القومي للطرق</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.allowable_loads')}}">الأحمال المسموح بها</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.future_projects')}}">مشروعات مستقبلیة</a>
                            <a class="dropdown-item" href="{{route('frontend.roads.road_network_map')}}">خريطة شبكة الطرق في مصر</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            كباري
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.region')}}">المناطق</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ادارات خدمية
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (App\Models\ServiceDepartments::orderBy('order', 'ASC')->get() as $ServiceDepartment)
                                <a class="dropdown-item" href="{{route('frontend.service_departments', $ServiceDepartment->id)}}">{{$ServiceDepartment->department_name}}</a>

                            @endforeach
                            {{-- <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            الخدمات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.auctions')}}">مناقصات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend.jobs')}}">وظائف</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('body')




    <!------------------- Footer -------------------->
    <footer>
        <div class="container">
            <div class="footer-col">
                <h6 class="footer-title">عن الهيئة</h6>
                <ul>
                    <li><a href="#">نبذة تاريخية عن الهيئة</a></li>
                    <li><a href="#">كلمة رئيس مجلس الادارة</a></li>
                    <li><a href="#">الهيكل التنظيمي</a></li>
                    <li><a href="#">قيادات الهيئة</a></li>
                    <li><a href="#">موقع الهيئة</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h6 class="footer-title">المركز الاعلامي</h6>
                <ul>
                    <li><a href="#">اخبار الهيئة</a></li>
                    <li><a href="#">معرض الصور</a></li>
                    <li><a href="#">معرض الفيديو</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h6 class="footer-title">طرق</h6>
                <ul>
                    <li><a href="#">مشروعات مستقبلیة</a></li>
                    <li><a href="#">خريطة شبكة الطرق</a></li>
                    <li><a href="#">المشروع القومى للطرق</a></li>
                    <li><a href="#">السلامة على الطريق</a></li>
                    <li><a href="#">الطرق السريعة</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h6 class="footer-title">كباري</h6>
                <ul>
                    <li><a href="#">مشروعات الكباري</a></li>
                    <li><a href="#">مشروعات مستقبلیة</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h6 class="footer-title">إدارات خدمية</h6>
                <ul>
                    <li><a href="#">المعامل</a></li>
                    <li><a href="#">مركز التدريب</a></li>
                    <li><a href="#">النقل البرى</a></li>
                    <li><a href="#">مصنع علامات المرور</a></li>
                    <li><a href="#">الإعلانات</a></li>
                    <li><a href="#">التشجير</a></li>
                    <li><a href="#">مركز الإزمات</a></li>
                    <li><a href="#">المكتبة</a></li>
                    <li><a href="#">الأملاك</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h6 class="footer-title">الخدمات</h6>
                <ul>
                    <li><a href="#">خدمات النقل البري</a></li>
                    <li><a href="#">خدمات المعامل</a></li>
                    <li><a href="#">خدمات مركز التدريب</a></li>
                    <li><a href="#">خدمات مصنع العلامات</a></li>
                    <li><a href="#">خدمات الإعلانات</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h6 class="footer-title">اتصل بنا</h6>
                <ul>
                    <li><a href="#">اتصل بنا</a></li>
                    <li><a href="#">شكاوى ومقترحات</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">النشرات الاخبارية</h3>
                <a href="#" class="btn btn-primary rounded-pill btn-style">اشترك</a>
            </div>

        </div>

        <div class="copyright">
            <div class="container">
                <div class="copy">
                    <p>حقوق النسخ © 2020-{{date('Y')}} الهيئة العامة للطرق والكباري والنقل البري - مصر </p>
                    <ul>
                        <li><a href="#">الشروط والأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                        <li><a href="#">خريطة الموقع</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="/frontend/js/popper.min.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>

    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/script.js"></script>
</body>

</html>
