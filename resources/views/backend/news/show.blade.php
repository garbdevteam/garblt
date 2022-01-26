@extends('backend.layout.mainLayout')

@section('main')
<style>
    .form-group {
        margin-bottom: 20px !important;
    }

    td {
        font-size: 18px;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    عرض الخبر
                    <small>
                        <a href="{{route('admin.news.index')}}" class="btn btn-primary btn-xs">رجوع</a>
                    </small>

                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        @if ($errors->any())
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <strong>{{$error}}</strong>
                        </div>
                        @endforeach
                        <br />
                    </div>
                </div>
            </div>
        </div>

        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>المعلومات الرئيسية</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <table id="datatable-list" class="table table-striped table-bordered">
                            <tr>
                                <td>رقم بقاعدة البيانات: </td>
                                <td>{{$News->id}}</td>
                            </tr>
                            <tr>
                                <td>تاريخ الخبر: </td>
                                <td>{{$News->news_date}}</td>
                            </tr>
                            <tr>
                                <td>عنوان الخبر: </td>
                                <td>{{$News->news_date}}</td>
                            </tr>
                            <tr>
                                <td>محتوي الخبر: </td>
                                <td>{{$News->description}}</td>
                            </tr>
                            <tr>
                                <td>صورة الصغيرة: </td>
                                <td><img src="{{route('admin.news.thumb_image', $News->id)}}" alt=""></td>
                            </tr>
                            <tr>
                                <td>صورة كبيرة: </td>
                                <td><img src="{{route('admin.news.full_image', $News->id)}}" alt=""></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- /page content -->
@endsection
