@extends('backend.layout.mainLayout')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>تعديل المشروع القومي للطرق</h3>
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
                            action="{{route('admin.national_roads_project.update', $NationalRoadsProject->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الاسم
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ $NationalRoadsProject->name }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الوصف
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  
                                        <textarea name="description" class="form-control" value="{{$NationalRoadsProject->description}}">{{$NationalRoadsProject->description}}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الموقع
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="location" value="{{ $NationalRoadsProject->location }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الطول
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="length" value="{{ $NationalRoadsProject->length }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    التكلفة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="cost" value="{{ $NationalRoadsProject->cost }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="image_file"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.national_roads_project.index')}}" class="btn btn-primary btn-sm">رجوع</a>
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
