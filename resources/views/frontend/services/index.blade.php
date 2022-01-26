@extends('frontend.layout.main')

@section('content')
    <section class="highways-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  الخدمات</li>
                </ol>
            </nav>

            <h2 class="heading">  الخدمات</h2>

            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">  الخدمات</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="loads">
                        <div class="row">
                           
                           @foreach($services as $service)

                           <div class="col-12 col-md-6">
                                <div class="load">
                                    <div class="row">
                                        <div class="col-6">
                                        <img src="{{ asset('storage/'.$service->service_image) }}" alt="" width="100" height="150">
                                        </div>
                                        <div class="col-6">
                                            <h4>{{ $service->services_name}}</h4>
                                            
                                            <p>{{ $service->services_name}}</p>
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
