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
                    مركز الصور
                    <small>
                        <a href="{{route('admin.image_assets.create')}}" class="btn btn-success btn-xs">أضافة</a>
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
                                    <th style="text-align:center; width:20%;">عنوان الصورة</th>
                                    <th style="text-align:center; width:5%;">بقائمة الصور</th>
                                    <th style="text-align:center; width:60%;">الصورة</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($ImageAssets as $ImageAsset)
                                <tr>
                                    <td>{{$ImageAsset->id}}</td>
                                    <td>{{$ImageAsset->title}}</td>
                                    <td>{{$ImageAsset->in_list == "1" ? "نعم" : "لأ"}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$ImageAsset->image) }}" alt="" style="max-height:200px;">

                                    </td>
                                    <td><a href="{{route('admin.image_assets.edit', $ImageAsset->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.image_assets.destroy', $ImageAsset->id)}}" method="post">
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

