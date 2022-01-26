@extends('frontend.layout.main')

@section('content')
    <section class="road-safety">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">المركز الاعلامى</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الميديا</li>
                </ol>
            </nav>

            <h2 class="heading">الميديا</h2>

            <div class="signs">
                <div class="row">
                    @foreach ($media as $media)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="sign text-center">
                     
                                <img src="{{ asset('storage/'.$media->image) }}"  alt="" width="150" height="100">
                                   
                                <h5>{{$media->title}}</h5>
                                <p>{{$media->description}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
@endsection
