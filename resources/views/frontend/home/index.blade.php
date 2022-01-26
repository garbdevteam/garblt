@extends('frontend.layout.main')

@section('content')
<section class="welcome-slider" dir="rtl">
    <div class="slider">
        <div class="slide">
            <img src="{{ asset('frontend/images/background.jpg') }}" alt="">
            <div class="overlay">
                <h1>الهيئة العامة للطرق والكباري</h1>
                <h1>ترحب بكم</h1>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontend/images/background.jpg') }}" alt="">
            <div class="overlay">
                <h1>الهيئة العامة للطرق والكباري</h1>
                <h1>ترحب بكم</h1>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontend/images/background.jpg') }}" alt="">
            <div class="overlay">
                <h1>الهيئة العامة للطرق والكباري</h1>
                <h1>ترحب بكم</h1>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="desc">
                    <h2 class="heading">عن الهيئة</h2>
                    <p> {{$ImportanceOfAuthority}} </p>
                    <a class="more-link" href="{{ route('frontend.about-us')}}">
                        <span>المزيد</span>
                        <img src="{{ asset('frontend/images/icons/more-arrow.svg') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="images-container">
                    <div class="images">
                        <img src="{{ url('storage\aboutUs\ImportanceOfAuthorityImage.jpg') }}" alt="">
                        <img src="{{ url('storage\aboutUs\ImportanceOfAuthorityImage.jpg') }}" alt="">
                        <div class="logo">
                            <img src="{{ asset('frontend/images/icons/logo.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="statistics">
    <div class="container">
        <h2 class="heading">إحصائيات</h2>

        <!-- <div class="slider">
      <div class="row"></div>
    </div> -->

        <div class="slider">
            <div class="slide">
                <h3>1102</h3>
                <p>اطوال الطرق1</p>
            </div>
            <div class="slide">
                <h3>1102</h3>
                <p>2اطوال الطرق</p>
            </div>
            <div class="slide">
                <h3>1102</h3>
                <p>اطوال الطرق3</p>
            </div>
            <div class="slide">
                <h3>1102</h3>
                <p>اطوال الطرق4</p>
            </div>
            <div class="slide">
                <h3>1102</h3>
                <p>اطوال الطرق5</p>
            </div>
            <div class="slide">
                <h3>1102</h3>
                <p>اطوال الطرق6</p>
            </div>
        </div>

    </div>
</section>

<div class="latest-news">
    <div class="container">
        <h2 class="heading">أحدث الأخبار</h2>

        <div class="row">
            <div class="col-12 col-md-7">
                <div class="news-slider">
                    <div class="slider">
                        @foreach($News as $news)

                        <div class="slide">
                            <img src="{{ asset(route('admin.news.full_image', $news->id))}}" alt="">
                            <h3> <a href="{{ route('frontend.news.show.one', $news->id )}}">{{ $news ->title}}</a> </h3>
                            <p>{{ $news->description}}</p>
                            <a class="more-link" href="{{route('frontend.news.index')}}">
                                <span>المزيد</span>
                                <img src="{{ asset('frontend//images/icons/more-arrow.svg') }}" alt="">
                            </a>
                        </div>
                            
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="details">
                    @foreach($News as $news)
                    <div class="single-news">
                        <img src="{{ asset(route('admin.news.thumb_image', $news->id)) }}" alt="">
                        <div class="info">
                            <h4><a href="{{ route('frontend.news.show.one', $news->id )}}">{{ $news ->title}}</a></h4>
                            <p>{{ $news->description}}</p>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<section class="int-map">
    <div class="container">
        <h2 class="heading">الخريطة التفاعلية</h2>
        <div class="map">
            {!! $map !!}
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <h2 class="heading">خدمات الهيئة</h2>
        <div class="slider">

            @foreach($services as $services)
                <div class="slide">
                    <img src="{{ asset(route('admin.service.image', $services->id)) }}" alt="">
                    <h3>{{$services->services_name}}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="projects">
    <div class="container">
        <div class="head">
            <h2 class="heading">المشاريع القائمة</h2>
            <a class="more-link" href="{{route('frontend.projects')}}">
                <span>المزيد</span>
                <img src="{{ asset('frontend/images/icons/more-arrow.svg') }}" alt="">
            </a>
        </div>

        <div class="slider">
            @foreach($projects as $project)
                <div class="slide">
                    <div class="project">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="images">
                               
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="">
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="desc">
                                    <h3><a class="more-link" href="{{ route('frontend.roads.national_roads_project.show', $project->id)}}">{{$project->name}}</a></h3>
                                    <p>{{$project->description}}</p>
                                    <a class="more-link" href="{{ route('frontend.roads.national_roads_project.show', $project->id)}}">
                                        <span>المزيد</span>
                                        <img src="{{ asset('frontend/images/icons/more-arrow.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            @endforeach
           
        </div>

    </div>
</section>

<section class="media">
    <div class="container">
        <div class="head">
            <h2 class="heading">المركز الإعلامي</h2>
            <a class="more-link" href="#">
                <span>المزيد</span>
                <img src="{{ asset('frontend/images/icons/more-arrow.svg') }}" alt="">
            </a>
        </div>

        <div class="slider">
            @foreach($media as $media)
            <div class="slide">
                <img src="{{ asset('storage/'.$media->image) }}" alt="" width="300" height="200">
            </div>
            @endforeach
            
           
            <!-- <div class="slide">
                <img src="{{ asset('frontend/images/IMG_4004.jpg') }}" alt="">
            </div> -->
        </div>

    </div>
</section>


@endsection
