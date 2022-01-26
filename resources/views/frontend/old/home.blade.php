@extends('frontend.layout')

@section('body')


<!-- Carousel slider -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="frontend/images/banner-one-optimized.jpg" class="d-block w-100" alt="banner image 1" />

            <div class="carousel-caption d-none d-md-block">
                <h5>مرحبا بكم</h5>
                <p>الهيئة العامة للطرق و الكباري و النقل البري</p>
                <button class="btn btn-primary rounded-pill">عن الهيئة</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="frontend/images/banner2.JPG" class="d-block w-100" alt="banner image 2" />

            <div class="carousel-caption d-none d-md-block">
                <h5>مرحبا بكم</h5>
                <p>الهيئة العامة للطرق و الكباري و النقل البري</p>
                <button class="btn btn-primary rounded-pill" disabled>عن الهيئة</button>
            </div>
        </div>
    </div>
</div>

<!-- news section -->

<section class="news">
    <div class="container">
        <div class="news-title text-center">
            <h3 class="heading">أحدث الاخبار</h3>
            <p>تعرف على احدث اخبار الهيئة العامة للطرق و الكبارى والنقل البري</p>
        </div>

        <div class="owl-one owl-carousel owl-theme">
            @foreach ($News as $NewsItem)
            <div class="item">
                <div class="news-image">
                    <img src="{{route('frontend.news.thumb_image', $NewsItem->id)}}" alt="news image" />
                </div>
                <div class="news-text">
                    <span class="date">{{Carbon\Carbon::parse($NewsItem->news_date)->locale('ar_EG')->isoFormat("DD  MMMM  Y")}}</span>
                    <h5 class="news-head">
                        <a href="{{route('frontend.news.detail', $NewsItem->id)}}" style="color:black;">{{$NewsItem->title}}</a>
                    </h5>
                    <hr />
                    <p class="news-details">
                        {{Str::limit($NewsItem->description, 90, '...')}}
                    </p>
                </div>
            </div>

            @endforeach

        </div>
        <a class="btn btn-primary news-btn btn-style rounded-pill" href="{{route('frontend.news.index')}}">المزيد من الاخبار</a>
    </div>

</section>



<!------------------- Services -------------------->

<section class="services">
    <div class="ser-head text-center">
        <h3>خدمات الهيئة</h3>
        <p>تعرف على أحدث خدمات الهيئه العامه للطرق والكباري والنقل البري</p>
    </div>
    <div class="ser-car">
        <div class="owl-two owl-carousel owl-theme">
            <div class="item">
                <img src="frontend/images/services/الاعلانات.png" alt="الاعلانات">
                <h5>الاعلانات</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/المقترحات-والشكاوي.png" alt="المقترحات-والشكاوي">
                <h5>شكاوى و مقترحات</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/النقل-البري.png" alt="النقل-البري">
                <h5>خدمات النقل البري</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/خدمات-المعامل.png" alt="خدمات-المعامل">
                <h5>خدمات المعامل</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/فرص-العمل.png" alt="فرص-العمل">
                <h5>فرص العمل</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/مركز-التدريب.png" alt="مركز-التدريب">
                <h5>خدمات مركز التدريب</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/مزايدات.png" alt="مزايدات">
                <h5>مناقصات و مزايدات</h5>
            </div>
            <div class="item">
                <img src="frontend/images/services/sign.png" alt="مصنع العلامات">
                <h5>خدمات مصنع العلامات</h5>
            </div>
        </div>
    </div>
</section>

<!----------------- Media Center ---------------------->

<section class="media-center">
    <div class="container">
        <div class="media-nav vertical-line">
            <h2 class="heading">المركز الاعلامي</h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">معرض الفيديوهات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">معرض الصور</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="owl-three owl-carousel owl-theme">
                <!--<div class="item-video" data-merge="3"><a class="owl-video" href="https://vimeo.com/23924346"></a></div> -->
                <div class="item-video" data-merge="1"><a class="owl-video"
                        href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a></div>
                <div class="item-video" data-merge="1"><a class="owl-video"
                        href="https://www.youtube.com/watch?v=oy18DJwy5lI"></a></div>
                <div class="item-video" data-merge="1"><a class="owl-video"
                        href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a></div>
                <div class="item-video" data-merge="1"><a class="owl-video"
                        href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a></div>
                <div class="item-video" data-merge="1"><a class="owl-video"
                        href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a></div>
            </div>
            <button class="btn btn-primary rounded-pill btn-style video-btn">المزيد من الفيديوهات</button>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="owl-four owl-carousel owl-theme">
                <div class="item">
                    <img src="frontend/images/media center/41366301_1141841202639538_3778307941749227520_n.jpg"
                        alt="image 1">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/IMG_4004.png" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/IMG_9707.jpg" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/luxor3.jpg" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/p1.png" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/41366301_1141841202639538_3778307941749227520_n.jpg"
                        alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/IMG_4004.png" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
                <div class="item">
                    <img src="frontend/images/media center/IMG_9707.jpg" alt="image 2">
                    <div class="overlay">
                        <i class="fa fa-3x fa-picture-o" aria-hidden="true"></i>
                        <h6>الدائرى الاقليمى / الشمالى الغربى</h6>
                        <span></span>
                        <a href="#" class="btn btn-primary rounded-pill btn-style">مشاهدة</a>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary rounded-pill btn-style video-btn"> المزيد من الصور </button>
        </div>
    </div>

</section>



<!------------------- Related Websites -------------------->

<section class="related-websites">
    <div class="container">
        <div class="head vertical-line">
            <h2>مواقع ذات صلة</h2>
            <p>تعرف على مواقع ذات صلة للهيئه العامه للطرق والكباري والنقل البري</p>
        </div>
        <div class="owl-five owl-carousel owl-theme">
            <div class="item">
                <img src="frontend/images/websites/Gov.png" alt="government">
                <h6>بوابة الحكومة المصرية</h6>
            </div>
            <div class="item">
                <img src="frontend/images/websites/marin.png" alt="government">
                <h6>قطاع النقل البحرى</h6>
            </div>
            <div class="item">
                <img src="frontend/images/websites/Picture111.png" alt="government">
                <h6>الشركة القابضة لمشروعات الطرق والكبارى والنقل البرى</h6>
            </div>
            <div class="item">
                <img src="frontend/images/websites/Railway.png" alt="government">
                <h6>سكك حديد مصر</h6>
            </div>
            <div class="item">
                <img src="frontend/images/websites/TranspotationMinistry.png" alt="government">
                <h6>وزارة النقل</h6>
            </div>
            <div class="item">
                <img src="frontend/images/websites/Tunnels.png" alt="government">
                <h6>الهيئة القومية للانفاق</h6>
            </div>
        </div>
    </div>
</section>

@endsection
