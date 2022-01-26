@extends('layouts.mainLayout')

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
                    الاماكن
                    <small> <a href="{{route('places.create')}}" class="btn btn-success btn-xs">أضافة</a>
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
                                    <th style="text-align:center; width:10%;">ID</th>
                                    <th style="text-align:center; width:70%;">أسم المكان</th>
                                    <th style="text-align:center; width:10%;">تعديل</th>
                                    <th style="text-align:center; width:10%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($Places as $Place)
                                <tr>
                                    <td>{{$Place->id}}</td>
                                    <td>{{$Place->name}}</td>
                                    <td style="text-align:center; width:10%;"><a
                                            href="{{route('places.edit', $Place->id)}}"
                                            class="btn btn-warning ">تعديل</a></td>
                                    <td style="text-align:center; width:10%;">
                                        <form action="{{route('places.destroy', $Place->id)}}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $Places->links() }}

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- /page content -->
@endsection

@section('js')
<script>
    $('.select2box').select2();
    $('.select2box2').select2();

</script>

@endsection
