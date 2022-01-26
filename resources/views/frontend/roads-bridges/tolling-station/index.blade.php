@extends('frontend.layout.main')

@section('content')
    <section class="highways-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                    <li class="breadcrumb-item active" aria-current="page">محطات الرسوم</li>
                </ol>
            </nav>

            <h2 class="heading">محطات الرسوم</h2>

            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="tolling-tab" data-toggle="tab" href="#tolling" role="tab" aria-controls="tolling" aria-selected="true">محطات التحصيل والموازين</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tolling" role="tabpanel" aria-labelledby="tolling-tab">
                    <div class="stations">
                        <div class="row">
                            @foreach($station as $station)
                                <div class="col-12 col-md-6">
                                    <div class="station">
                                        <h3>{{$station->title}}</h3>
                                        <div class="location">
                                            <p>الموقع : {{$station->title}} /{{$station->location}}</p>
                                        </div>
                                        <div class="subscription">
                                            <h5>الإشتراك</h5>
                                            <div class="type">
                                                <h6>{{$station->subscription}}</h6>
                                                <span class="badge"></span>
                                                <span class="badge">{{$station->tariff}}</span>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <h5>التعريفة</h5>
                                            <div class="type">
                                                <h6>ملاكي / ميكروباص</h6>
                                                <span class="badge">{{$station->tariff}}</span>
                                            </div>
                                            <div class="type">
                                                <h6>اتوبيس</h6>
                                                <span class="badge">{{$station->tariff}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
              </div>

        </div>
    </section>

@endsection
