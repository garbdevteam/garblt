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
                    اشارات و علامات الطرق
                    <small>
                        <a href="{{route('admin.road_signs.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.road_signs.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
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

                                    <th style="text-align:center; width:10%;">رقم بقاعدة البيانات</th>
                                    <th style="text-align:center; width:20%;">الاسم</th>
                                    <th style="text-align:center; width:20%;">الوصف</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:10%;">ترتيب</th>
                                    <th style="text-align:center; width:10%;">تعديل</th>
                                    <th style="text-align:center; width:10%;">حذف</th>
                                </tr>
                            </thead>

                            {{-- 'title', 'description', 'image','order' --}}

                            <tbody>
                                @foreach ($RoadSigns as $RoadSign)
                                <tr>
                                    <td>{{$RoadSign->id}}</td>
                                    <td>{{$RoadSign->title}}</td>
                                    <td>{{$RoadSign->description}}</td>
                                    <td>
                                    <img src="{{ asset('storage/'.$RoadSign->image) }}" alt="" style="max-height:200px;">
                                    </td>

                                    <td>{{$RoadSign->order}}</td>

                                    <td><a href="{{route('admin.road_signs.edit', $RoadSign->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.road_signs.destroy', $RoadSign->id)}}" method="post">
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

