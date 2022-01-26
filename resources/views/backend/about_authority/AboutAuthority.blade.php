@extends('backend.layout.mainLayout')

@section('main')
<style>
    .form-group {
        margin-bottom: 20px !important;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    دور واهمية الهيئة
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.importance_of_authority')}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    دور و أهميه الهيئه
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="text" class="form-control col-md-7 col-xs-12"
                                        rows="15">{{$ImportanceOfAuthority}}</textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.importance_of_authority_image')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة القديمة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ url('storage\aboutUs\ImportanceOfAuthorityImage.jpg')}}" alt=""
                                        height='100' name="image_file">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control col-md-7 col-xs-12" name="image_file">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    كلمة رئيس مجلس الادارة
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.chairman_word')}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    كلمة رئيس مجلس الادارة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="text" class="form-control col-md-7 col-xs-12"
                                        rows="15">{{$ChairmanWord}}</textarea>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.chairman_name')}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    اسم رئيس مجلس الادارة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="text" value="{{ $chairmanName }}"
                                        class="form-control col-md-7 col-xs-12">

                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>
                        <hr>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.chairman_word_image')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة القديمة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ url('storage\aboutUs\chairmanImage.jpg')}}" alt=""
                                        height='100'>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control col-md-7 col-xs-12" name="image_file">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    نبذة عن تاريخ الهيئة
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.evolution_image')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة القديمة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ url('storage\aboutUs\infograph.png')}}" alt=""
                                        height='100' name="image_file">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control col-md-7 col-xs-12" name="image_file">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    الهيكل التنظيمي

                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.persons_image')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة القديمة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ url('storage\aboutUs\persons.png')}}" alt=""
                                        height='100' name="image_file">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الصورة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control col-md-7 col-xs-12" name="image_file">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    الخريطة
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.about_authority.map')}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    موقع الهيئه
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="text" class="form-control col-md-7 col-xs-12"
                                        rows="15">{!! $map !!}</textarea>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    قيادات الهيئة
                    <small>
                        <a href="{{route('admin.authority_leaders.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.authority_leaders.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
                    </small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="datatable-list" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th style="text-align:center; width:5%;">رقم بقاعدة البيانات</th>
                                    <th style="text-align:center; width:15%;">الاسم</th>
                                    <th style="text-align:center; width:15%;">الوظيفة</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:5%;">ترتيب</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($AuthorityLeaders as $AuthorityLeader)
                                <tr>
                                    <td>{{$AuthorityLeader->id}}</td>
                                    <td>{{$AuthorityLeader->name}}</td>
                                    <td>{{$AuthorityLeader->title}}</td>
                                    <td>
                                        <img src="{{$AuthorityLeader->FullPathImage}}" alt=""
                                            style="max-hieght:200px; max-width:200px;">

                                    </td>

                                    <td>{{$AuthorityLeader->order}}</td>

                                    <td><a href="{{route('admin.authority_leaders.edit', $AuthorityLeader->id)}}"
                                            class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form
                                            action="{{route('admin.authority_leaders.destroy', $AuthorityLeader->id)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ">حذف</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>
<!-- /page content -->


@endsection
