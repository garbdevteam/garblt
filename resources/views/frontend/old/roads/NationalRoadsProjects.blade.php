@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>المشروع القومي للطرق</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item">طرق</li>
                        <li class="breadcrumb-item active" aria-current="page">المشروع القومي للطرق</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="roads">
        <div class="container">

            @foreach ($NationalRoadsProjects as $NationalRoadsProject)
            <div class="row">
                <div class="col-12">
                    <div class="road">
                        <div class="row" style="padding-right:30px;">
                            <div class="col-9 road-info">
                                <p>
                                    <span>اسم المشروع :</span>
                                    <span> {{$NationalRoadsProject->name}}</span>
                                </p>
                                <p>
                                    <span>موقع المشروع :</span>
                                    <span> {{$NationalRoadsProject->location}}</span>
                                </p>
                                <p>
                                    <span>طول الطريق :</span>
                                    <span> {{$NationalRoadsProject->length}}</span>
                                </p>
                            </div>

                            <div class="col-3">
                                <img class="project-image" src="{{$NationalRoadsProject->FullPathImage}}" alt="not found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <br><br>

        </div>
    </div>

</section>
@endsection
