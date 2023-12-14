@extends('layout.layout')
@section('content')
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dashboard Admin</h4>
                                <div class="table-responsive">
                                </div>
                                <div class="row">
                                <div class="col-lg-9 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-0">
                                            <h4 class="card-title px-4 mb-3">Todo List</h4>
                                            <div class="todo-list">
                                                <div class="tdl-holder">
                                                    <div class="tdl-content">
                                                        <ul id="todo_list">
                                                            <li><label><input type="checkbox"><i></i><span>Live Pagi</span><a href='#' class="ti-trash"></a></label></li>
                                                            <li><label><input type="checkbox" checked><i></i><span>Packing Order</span><a href='#' class="ti-trash"></a></label></li>
                                                            <li><label><input type="checkbox"><i></i><span>Live Malam</span><a href='#' class="ti-trash"></a></label></li>
                                                            <li><label><input type="checkbox" checked><i></i><span>Rekap Data</span><a href='#' class="ti-trash"></a></label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="px-4">
                                                        <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection  