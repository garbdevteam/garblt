@extends('frontend.layout')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>خريطة شبكة الطرق في مصر</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item">عن الهيئة</li>
                        <li class="breadcrumb-item active" aria-current="page">خريطة شبكة الطرق في مصر</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="regions">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <br><br>
                    {!! $contents !!}
                </div>


            </div>
        </div>
    </div>


</section>



@endsection
