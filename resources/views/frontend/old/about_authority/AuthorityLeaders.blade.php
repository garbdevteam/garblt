@extends('frontend.layout')

@section('body')

<section class="main-news">


    <div class="news-head">
        <div class="container">
            <div class="head vertical-line">
                <h3>قيادات الهيئة</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">الرئيسية </a></li>
                        <li class="breadcrumb-item">عن الهيئة</li>
                        <li class="breadcrumb-item active" aria-current="page">قيادات الهيئة</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="leaders">
        <div class="container">
            <div class="row">
                @foreach ($AuthorityLeaders as $AuthorityLeader)
                <div class="col-xs-12 col-md-6">
                    <div class="adv">
                        <div class="row ">
                            <div class="col-8 vertical-line">
                                <h5>{{$AuthorityLeader->name}}</h5>
                                <div class="details">
                                    <div class="row">
                                        <div class="col-4">
                                            <p>الوظيفة</p>
                                            <p>التليفون</p>
                                            <p>فاكس</p>
                                        </div>
                                        <div class="col-8">
                                            <p>{{$AuthorityLeader->title}}</p>
                                            <p>{{$AuthorityLeader->telephone}}</p>
                                            <p>{{$AuthorityLeader->fax}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <img src="{{$AuthorityLeader->FullPathImage}}" alt="not found">
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

    <div class="pages">
        <nav aria-label="Page navigation example">
                {{$AuthorityLeaders->links()}}
        </nav>
    </div>

</section>



@endsection
