<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

    <!-- Almarai Font -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <!-- slick styles -->
    <link href="{{ asset('frontend/styles/vendors/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/styles/vendors/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />



    <title>Bridges Authority</title>
</head>

<body>




    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/images/icons/logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item {{ optional(request()->route())->getName() == 'frontend.home' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend.home') }}">الرئيسية</a>
                    </li>
                    <!-- Level one dropdown -->
                    <li class="nav-item dropdown
                        {{ in_array(optional(request()->route())->getName(),array('frontend.about-us', 'frontend.regions',
                                                                        'frontend.services')) ? 'active' : '' }}">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link dropdown-toggle ">الهيئة</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="{{ route('frontend.about-us') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.about-us' ? 'active' : '' }}">
                                    عن الهيئة </a></li>
                            <li><a href="{{ route('frontend.regions') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.regions' ? 'active' : '' }}">
                                    المناطق </a></li>
                            <li><a href="{{ route('frontend.services') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.services' ? 'active' : '' }}">
                                    الخدمات </a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>

                    <!-- Level one dropdown -->
                    <li
                        class="nav-item dropdown
                        {{ in_array(optional(request()->route())->getName(),array('frontend.road-network-map', 'frontend.projects',
                                                                        'frontend.tolling-station', 'frontend.allowable-loads', 'frontend.road-safety')) ? 'active' : '' }}">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link dropdown-toggle ">الطرق
                            و الكباري</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="{{ route('frontend.road-network-map') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.road-network-map' ? 'active' : '' }}">
                                    خريطة شبكة
                                    الطرق بمصر </a></li>

                            <li><a href="{{ route('frontend.projects') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.projects' ? 'active' : '' }}">
                                    المشاريع
                                </a></li>
                            <li><a href="{{ route('frontend.tolling-station') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.tolling-station' ? 'active' : '' }}">
                                    محطات الرسوم
                                </a></li>
                            <li><a href="{{ route('frontend.allowable-loads') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.allowable-loads' ? 'active' : '' }}">
                                    الاحمال المسموح بها
                                </a></li>
                            <li><a href="{{ route('frontend.road-safety') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.road-safety' ? 'active' : '' }}">
                                    السلامة علي الطريق
                                </a></li>

                            <!-- End Level two -->
                        </ul>
                    </li>
                    <!-- End Level one -->

                    <li
                        class="nav-item dropdown
                        {{ in_array(optional(request()->route())->getName(),array('frontend.news.index', 'frontend.media.index')) ? 'active' : '' }}">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link dropdown-toggle ">المركز الاعلامي</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="{{ route('frontend.news.index') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.news.index' ? 'active' : '' }}">
                                    الاخبار </a></li>

                            <li><a href="{{ route('frontend.media.index') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.media.index' ? 'active' : '' }}">
                                    الميديا
                                </a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>
                    <li
                        class="nav-item dropdown
                        {{ in_array(optional(request()->route())->getName(),array('frontend.tender.index', 'frontend.media.index')) ? 'active' : '' }}">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link dropdown-toggle ">المناقصات والوظائف</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="{{ route('frontend.tender.index') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.tender.index' ? 'active' : '' }}">
                                    مناقصات </a></li>

                            <li><a href="{{ route('frontend.jobs.index') }}"
                                    class="dropdown-item {{ optional(request()->route())->getName() == 'frontend.jobs.index' ? 'active' : '' }}">
                                    وظائف
                                </a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>

                    <li class="nav-item {{ optional(request()->route())->getName() == 'frontend.contact-us' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('frontend.contact-us') }}">تواصل معنا</a>
                    </li>

                </ul>

                {{-- <div class="login">
                    <button class="btn login-btn"><a href="{{route('frontend.login')}}">تسجيل الدخول</a></button>
                </div> --}}

                <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
            </div>
        </nav>
    </div>

    @yield('content')

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="info">
                        <div class="logo">
                            <img src="{{ asset('frontend/images/icons/logo.png') }}" alt="">
                        </div>
                        <h2>عن الهيئة</h2>
                        <p>يوضع هنا وصف عن الهيئة وقد يتكون من سطرين مثال هذا النص. يوضع هنا وصف عن الهيئة وقد يتكون من
                            سطرين مثال هذا النص.يوضع هنا وصفيوضع هنا وصف عن الهيئة وقد يتكون من سطرين مثال هذا النص….
                        </p>
                        <h2>اتصل بنا 19487</h2>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="links">
                        <div class="row justify-content-md-center">
                            <div class="col-4">
                                <div class="list">
                                    <h4>عن الهيئة</h4>
                                    <ul>
                                        <li><a href="{{ route('frontend.media.index') }}">المركز الإعلامي</a></li>
                                        <li><a href="{{ route('frontend.news.index') }}">أخبار الهيئة</a></li>
                                        <li><a href="{{ route('frontend.media.index') }}">المعرض</a></li>
                                        <li><a href="{{ route('frontend.services') }}">الخدمات</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="list">
                                    <h4>المشاريع</h4>
                                    <ul>
                                        <li><a href="{{ route('frontend.projects') }}?type=roads">الطرق</a></li>
                                        <li><a href="{{ route('frontend.projects') }}?type=bridges">الكباري</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="row"> -->
            <div class="copyright">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6">
                        <div class="controls">
                            <a href="{{ route('frontend.faq') }}">الاسئلة الشائعة</a>
                            <a href="{{ route('frontend.terms-conditions') }}">الشروط والأحكام</a>
                            <a href="{{ route('frontend.privacy-policy') }}">سياسة الخصوصية</a>
                            <a href="{{ route('frontend.disclaimer') }}">إخلاء المسؤوليه</a>
                        </div>
                    </div>


                    <div class="col-12 col-md-6">
                        <div class="sign">
                            <p>حقوق النشر محفوظة الهيئة العامة للطرق والكباري @ 2021</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- </div> -->
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('frontend/styles/vendors/slick/slick.min.js') }}"></script>

    <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>

</html>
