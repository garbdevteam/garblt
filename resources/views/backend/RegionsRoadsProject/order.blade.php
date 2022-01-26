@extends('backend.layout.mainLayout')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 40px;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }
</style>

@endsection
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
                    ترتيب مشروعات طرق بالمنطقة
                    <small>
                        <a href="{{route('admin.regions_roads.index', $regions_id)}}" class="btn btn-primary btn-xs">رجوع</a>
                    </small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="{{route('admin.regions_roads.orderEdit',$regions_id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" id="list_order" name="list_order" value="" />
                            <ul id="sortable" style="width: 524px;">
                                @foreach ($RegionsRoadsProjects as $RegionsRoadsProject)
                                <li id="{{$RegionsRoadsProject->id}}" class="ui-state-default">{{$RegionsRoadsProject->name}}</li>

                                @endforeach
                            </ul>
                            <div style="clear:both;"></div>
                            <hr>
                            <button type="submit" class="btn btn-success btn"> حفظ</button>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
    $( "#sortable" ).sortable({
        placeholder: "ui-state-highlight",
        cursor: 'crosshair',
        update: function(event, ui) {
            var order = $("#sortable").sortable("toArray");
            $('#list_order').val(order.join(","));
        }
});
    $( "#sortable" ).disableSelection();
});
</script>

@endsection
