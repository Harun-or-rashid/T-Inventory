@extends('backend.layouts.master')

@section('page_level_css_plugins')
    <link href="{!! asset('assets/backend/plugins/datatables/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('page_level_css_files')

@endsection

@section('main_content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        @include('backend.layout_partials.messages.success')
        @include('backend.layout_partials.messages.failed')
        @include('backend.layout_partials.messages.form_failed')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="caption">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-toggle="tooltip" title="View">Accepted Order List</a>
                        </div>
                        <div class="tools" id="tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sample_2_wrapper" class="">
                            <table id="sample_2" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> # </th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Mobile </th>
                                    <th class="text-center"> Package </th>
                                    <th class="text-center"> Status </th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(!empty($users))
                                    @foreach($users as $row)
                                        <tr>
                                            <td class="text-center"> {!! $loop->iteration !!} </td>
                                            <td class="text-center"> {!! $row->first_name . ' ' . $row->last_name !!} </td>
                                            <td class="text-center"> {!! $row->email !!} </td>
                                            <td class="text-center"> {!! $row->mobile !!} </td>
                                            <td class="text-center">
                                                {!! \App\Models\User::getUserPackageInfo($row->id)->title !!}
                                            </td>
                                            <td class="text-center">
                                                @if($row->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- END CONTENT BODY -->
@endsection

<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="{!! asset('assets/backend/plugins/datatables/jquery.dataTables.js') !!}" type="text/javascript"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->


<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

    <!-- Custom Script for this pages -->
    <script>
        $('#sample_2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'print', 'pdf', 'excel', 'csv', 'copy'
            ],
            fixedColumns: true,
            columnDefs: [
                { width: 100, targets: 3 }
            ]
        } );

        $("#sample_2").on("click", ".list_delete_form", function(e){
            e.preventDefault();
            var $form=$(this);
            $('#confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(){
                $form.submit();
            });

        });

    </script>
@endsection
<!-- END PAGE LEVEL SCRIPTS -->