@extends('backend.layout.mainLayout')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>تعديل صورة</h3>
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
                            action="{{route('admin.image_assets.update', $ImageAsset->id)}}" method="post" >
                            @csrf
                        @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    أسم الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" value="{{ $ImageAsset->title }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    عرضها بقائمة الصور
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="1" name="in_list" {{ $ImageAsset->in_list == "1" ? "checked" : "" }}> نعم
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="0"  {{ $ImageAsset->in_list == "0" ? "checked" : "" }} name="in_list"> لأ
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.image_assets.index')}}"
                                        class="btn btn-primary btn-sm">رجوع</a>
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
