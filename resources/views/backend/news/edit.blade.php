@extends('backend.layout.mainLayout')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>أضافة خبر</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @if ($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <strong>{{$error}}</strong>
                        </div>
                        @endforeach
                        @endif

                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                        action="{{route('admin.news.update', $News->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    تاريخ الخبر
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="news_date[day]" placeholder="يوم"
                                    value="{{$News->news_date ? date('d', strtotime($News->news_date)) : ''}}" class=" col-md-3" >
                                    <input type="number" name="news_date[month]" placeholder="شهر"
                                    value="{{$News->news_date ? date('m', strtotime($News->news_date)) : ''}}" class=" col-md-3">
                                    <input type="number" name="news_date[year]" placeholder="سنة"
                                    value="{{$News->news_date ? date('Y', strtotime($News->news_date)) : ''}}" class=" col-md-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    عنوان الخبر
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" value="{{$News->title}}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    محتوي الخبر
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="description" cols="30" rows="10" class="form-control col-md-7 col-xs-12">{{$News->description}}</textarea><br><br>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                    <br>
                                    <small>يجب ان تكون ابعاد الصورة 1050 عرض * 660 طول</small>

                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="image"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.news.index')}}" class="btn btn-primary btn-sm">رجوع</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@endsection

@section('js')
@endsection
