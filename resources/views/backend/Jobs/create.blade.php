@extends('backend.layout.mainLayout')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>أضافة وظيفة</h3>
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
                            action="{{route('admin.jobs.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    العنوان
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    تاريخ الانتهاء
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="end_date[day]" placeholder="يوم"
                                        value="{{ old('end_date.day') }}" class=" col-md-3">
                                    <input type="number" name="end_date[month]" placeholder="شهر"
                                        value="{{ old('end_date.month') }}" class=" col-md-3">
                                    <input type="number" name="end_date[year]" placeholder="سنة"
                                        value="{{ old('end_date.year') }}" class=" col-md-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    وصف
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description" class="form-control col-md-7 col-xs-12" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الملف
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="job_file" value="{{ old('job_file') }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.jobs.index')}}" class="btn btn-primary btn-sm">رجوع</a>
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
