
@extends('frontend.layout.main')

@section('content')
    <section class="road-safety">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">المركز الاعلامى</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الاخبار</li>
                </ol>
            </nav>

            <h2 class="heading">الاخبار</h2>

            <div class="bridges-projects">
                @foreach($News as $news)
                    <div class="bridges-project">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset(route('admin.news.thumb_image', $news->id)) }}" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <h3><a class="more-link" href="{{ route('frontend.news.show.one', $news->id) }}">{{$news->title}}</a></h3>
                                <div class="desc">

                                </div>
                                <div class="info">
                                    <p>نبذة عن الخبر</p>
                                    <p>{{$news->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
