@extends('frontend.layout')

@section('body')
<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>وسائل التحكم المروري</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item">طرق</li>
                        <li class="breadcrumb-item active" aria-current="page">وسائل التحكم المروري</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="leaders traffic">
        <div class="container">
            <div class="row">

                @foreach ($TrafficControls as $TrafficControl)
                <div class="col-xs-12 col-md-6">
                    <div class="adv">
                        <div class="row ">
                            <div class="col-7 vertical-line">
                                <h5>{{$TrafficControl->name}}</h5>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-3">
                                            <p>الوصف</p>
                                        </div>
                                        <div class="col-9">
                                            <p style="overflow: hidden;">{{$TrafficControl->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <img src="{{$TrafficControl->FullPathImage}}" alt="not found">
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

</section>




@endsection
