@extends('frontend.layout.main')

@section('content')
    <section class="highways-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> الهيئه العامه للطرق و الكبارى</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  إخلاء المسؤوليه </li>
                </ol>
            </nav>

            <h2 class="heading">  إخلاء المسؤوليه </h2>

            
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
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
