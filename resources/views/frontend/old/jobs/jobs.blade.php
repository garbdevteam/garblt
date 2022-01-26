@extends('frontend.layout')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>الوظائف</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}"> الرئيسية </a></li>
                        <li class="breadcrumb-item active" aria-current="page">الوظائف</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="regions">
        <div class="container">
            <div class="row">
                @if ($Jobs->count() == 0)

                <div class="col-xs-12 col-md-6">
                    <div class="region">
                        <div class="info vertical-line">
                            <h5>لا يوجد وظائف حالية</h5>
                        </div>
                    </div>
                </div>

                @else
                @foreach ($Jobs as $Job)

                <div class="col-xs-12 col-md-6">
                    <div class="region">
                        <div class="info vertical-line">
                            <h5>{{$Job->name}}</h5>
                            <div class="row">
                                <div class="col-4">
                                    <p>تاريخ الانتهاء</p>
                                    <p>وصف</p>
                                    <p>ملف الاعلان</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$Job->end_date}}</p>
                                    <p>{{$Job->description}}</p>
                                    <p><a href="{{$Job->FullPathFile}}" target="_blank">التفاصيل</a></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


                @endif



            </div>

            {{-- <div class="row">
                @if ($Jobs->count() == 0)
                <div class="col-xs-12 col-md-6">
                    <div class="adv">
                        <div class="vertical-line">
                            <h5>لا توجد وظائف حالياً</h5>
                        </div>
                    </div>
                    <br><br><br><br>

                </div>

                @else
                @foreach ($Jobs as $Job)
                <div class="col-xs-12 col-md-6">
                    <div class="adv">
                        <div class=" row vertical-line">
                            <div class="col-9">
                                <h5><a href="{{$Job->FullPathFile}}" target="_blank">{{$Job->name}} </a>
                                <br>
                                <p ><b>تاريخ الانتهاء: </b> {{$Job->end_date}}</p>
                                <p ><b>وصف: </b> {{$Job->description}}</p>
                            </h5>

                            </div>
                            <div class="col-1">
                                <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                            </div>  
                        </div>
                    </div>
                </div>

                @endforeach
                @endif

            </div> --}}
        </div>
    </div>

</section>
@endsection
