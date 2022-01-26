@extends('frontend.layout.main')


@section('content')
    <section class="highways-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الأحمال المسموح بها</li>
                </ol>
            </nav>

            <h2 class="heading">الأحمال المسموح بها</h2>

            <!-- <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true">الأحمال المسموح بها</a>
                    </li>
                </ul> -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="loads">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="load">
                                    <div class="row">
                                        <div class="col">
                                            <p>{!! $contents !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true"> الأحمال المسموح بها للطرق</a>
                                    </li>


                                    <li class="nav-item offset-5" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true">الأحمال المسموح بها للكبارى</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="row">
                                <div class="col-12 ">
                                    <div class="" style="margin-right:40px; width:1600px">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($roads as $road)
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="load">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <img src="{{ asset('storage/' . $road->image) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h4>{{ $road->name }}</h4>
                                                                        <p> الموقع : {{ $road->location }}</p>
                                                                        <p> الطول : {{ $road->length }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col">
                                                @foreach ($bridges as $bridges)
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="load">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <img src="{{ asset('storage/' . $bridges->image) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h4>{{ $bridges->name }}</h4>
                                                                        <p> الموقع : {{ $bridges->location }}</p>
                                                                        <p> الطول : {{ $bridges->length }}</p>
                                                                    </div>
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








                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
