@extends('frontend.layout.main')

@section('content')
<section class="tenders-details-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">المناقصات و الوظائف</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.jobs.index') }}" style="color: #016599">الوظائف</a></li>
            </ol>
        </nav>
        <h2 class="heading">تفاصيل الوظيفه</h2>
        <div class="single-tender">
            <h2 class="heading">{{$job->name}}</h2>
            <div class="time">
                <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                <span>{{$job->end_date}}</span>
            </div>

            <div class="desc">
                <!-- html content coming from DB -->
                <p>{!! $job->description !!}</p>
                {{-- <div class="share">
                    <span>مشاركة المناقصة</span>
                    <div class="icons">
                        <img src="{{ url('frontend\images\icons\facebook-app-symbol.svg')}}" alt="">
                        <img src="{{ url('frontend\images\icons\whatsapp.svg')}}" alt="">
                        <img src="{{ url('frontend\images\icons\instagram.svg')}}" alt="">
                    </div>
                </div> --}}
            </div>

        </div>
        <div class="attachments">
            <h3>ملفات مرفقة</h3>
            <div class="files">
                <div class="file">
                    <img src="{{ url('frontend\images\icons\ic-ic-pdf.svg')}}" alt="">
                    <a>{{$job->file}}</span>
                </div>

            </div>

        </div>


    </div>
</section>

@endsection
