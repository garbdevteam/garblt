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
                            action="{{route('admin.service_departments.update', $ServiceDepartment->id)}}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    أسم الادارة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="department_name" value="{{ $ServiceDepartment->department_name }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    المحتوي
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="full-featured-non-premium"
                                        name="context">{{ $ServiceDepartment->context }}</textarea>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.service_departments.index')}}"
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

@section('head')

<script src="{{url('backend/vendors/tinymce/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
    var demoBaseConfig = {
  selector: "textarea",
  directionality : 'rtl',
  height: 500,
  resize: false,
  autosave_ask_before_unload: false,
  codesample_dialog_width: 600,
  codesample_dialog_height: 425,
  template_popup_width: 600,
  template_popup_height: 450,
  powerpaste_allow_local_images: true,
  plugins: [
    "  advlist anchor autolink codesample colorpicker contextmenu fullscreen help image imagetools",
    " lists link  media  noneditable  preview",
    " searchreplace table template textcolor  visualblocks wordcount"
  ],
  image_list: [
      { title: 'My page 1', value: 'https://upload.wikimedia.org/wikipedia/ar/1/18/Egyptian_General_Authority_For_Investment.jpg' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],

  toolbar:
    "insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image",
  content_css: [
    "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
    "//www.tiny.cloud/css/content-standard.min.css"
  ]
};

tinymce.init(demoBaseConfig);
</script>

@endsection
