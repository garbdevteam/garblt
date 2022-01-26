@extends('frontend.layout.main')

@section('content')
    <section class="road-safety">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                    <li class="breadcrumb-item active" aria-current="page">السلامة على الطريق</li>
                </ol>
            </nav>

            <h2 class="heading">السلامة على الطريق</h2>

            <div class="signs">
                <div class="row">
                    @foreach ($RoadSign as $RoadSign)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="sign text-center">
                     
                                <img src="{{ asset('storage/'.$RoadSign->image) }}"  alt="" width="150" height="100">
                                   
                                <h5>{{$RoadSign->title}}</h5>
                                <p>{{$RoadSign->description}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
@endsection
