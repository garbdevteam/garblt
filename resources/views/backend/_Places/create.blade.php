@extends('layouts.mainLayout')
@section('head')
<link href="{{url('vendors/select2-develop/dist/css/select2.css')}}" rel="stylesheet">

@endsection

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>أضافة مكان</h3>
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
                            action="{{route('places.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    أسم المكان
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>




                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <a href="{{route('places.index')}}" class="btn btn-primary btn-sm">رجوع</a>
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="form-horizontal form-label-left" onsubmit="thefunction(); return false;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">أضافة مكان جديد
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            أضافة مكان
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="NewPlace" type="text" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button id="AddPerson" class="btn btn-success  ">أضافة</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{url('vendors/select2-develop/dist/js/select2.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".select_place").select2();
        $(".select_name").select2();



    });

</script>
@endsection
