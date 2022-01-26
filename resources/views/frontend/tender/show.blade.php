@extends('frontend.layout.main')

@section('content')
<section class="tenders-details-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">المناقصات و الوظائف</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.tender.index') }}" style="color: #016599">المناقصات</a></li>
            </ol>
        </nav>
        <div class="single-tender">
            <h2 class="heading">مناقصة رقم ({{$tender->number}})</h2>
            <div class="time">
                <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                <span>
                    <?php
                    $mytime = Carbon\Carbon::now();
                   echo $mytime->toDateTimeString();
                    ?>
                </span>
            </div>

            <div class="conditions text-center">
                <div class="row">
                    <div class="col">
                        <h4>تاريخ الإنتهاء</h4>
                        <p>{{$tender->end_date}}</p>
                    </div>
                    <div class="col">
                        <h4>سعر كراسة الشروط</h4>
                        <p>{{$tender->price}} جنية مصري</p>
                    </div>
                    <div class="col">
                        <h4>التأمين الابتدائى</h4>
                        <p>{{$tender->primary_insurance}} من قيمة العطاء</p>
                    </div>
                </div>
            </div>

            <div class="desc">
                <p>{{$tender->description}}</p>
                <div class="share">
                    <span>مشاركة المناقصة</span>
                    <div class="icons">
                        <a href="www.facebook.com"><img src="{{ url('frontend\images\icons\facebook-app-symbol.svg')}}" alt=""></a>
                        <a href="www.whatsapp.com"><img src="{{ url('frontend\images\icons\whatsapp.svg')}}" alt=""></a>
                        <a href="www.instagram.com"><img src="{{ url('frontend\images\icons\instagram.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="attachments">
            <h3>ملفات مرفقة</h3>
            <div class="files">
                <div class="file">
                    <img src="{{ url('frontend\images\icons\ic-ic-pdf.svg')}}" alt="">
                    <span>{{$tender->file}}</span>
                </div>

            </div>

        </div>


    </div>
</section>


@endsection
