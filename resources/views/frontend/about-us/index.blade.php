@extends('frontend.layout.main')

@section('content')
<section class="about-page">
    <div class="desc-part">
        <div class="container">
            <div class="role">
                <h2 class="heading">دور وأهمية الهيئة</h2>
                <div class="row content">
                    <div class="col-12 col-md-4">
                        <img src="{{ url('storage\aboutUs\ImportanceOfAuthorityImage.jpg')}}" alt="">
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$ImportanceOfAuthority}}</p>
                    </div>
                </div>
            </div>
            <div class="word">
                <h2 class="heading">كلمة رئيس الهيئة</h2>
                <div class="row content">
                    <div class="col-12 col-md-3">
                        <img src="{{ url('storage\aboutUs\chairmanImage.jpg')}}" alt="">
                    </div>
                    <div class="col-12 col-md-9">
                        <h4>{{$chairmanName}}</h4>
                        <p>{{$ChairmanWord}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="history">
            <h2 class="heading">نبذة عن تاريخ الهيئة</h2>
            <br>
            <br>
           
            <img src="{{ url('storage\aboutUs\infograph.png')}}" alt="" width="100%">
            <br>
            <div>{!! $authorityhistory !!}</div>
        </div>

        <div class="leaders" style="margin-top: 100px;">
            <h2 class="heading">الهيكل التنظيمي</h2>
            <img src="{{ url('storage\aboutUs\persons.png')}}" alt="" width="100%">
        </div>

        <div class="organization">
          <h2 class="heading">قيادات الهيئة
              </h2>
          <div class="row">

            @foreach ($AuthorityLeaders as $AuthorityLeader)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-card">
                    <img src="{{ asset('storage/'.$AuthorityLeader->thumbnail_image) }}" alt="" style="max-hieght:200px; max-width:200px;">

                      <h4>{{$AuthorityLeader->name}}</h4>
                      <p>{{$AuthorityLeader->title}}</p>
                    </div>
                  </div>


            @endforeach

          </div>
        </div>

        <div class="int-map">
          <div class="container">
            <h2 class="heading">موقع الهيئة</h2>
            <div class="map">
                {!! $map !!}
            </div>
          </div>
        </div>

    </div>

</section>



@endsection
