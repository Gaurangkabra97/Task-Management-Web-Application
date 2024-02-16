@extends('admin.layout.master')
@section('title')
{{ 'Tejarh - My Orders' }}
@endsection

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">Employee List
                            <!-- <a href="#" data-toggle="modal" data-target="#add-new-task-modal" class="btn btn-success btn-sm ml-3">Add New</a> -->
                            <!-- <a href="#" class="btn btn-success btn-sm ml-3">All To Do List</a> -->
                        </h4>
                    </div>
                    <!-- end page title -->

                    <!-- tasks panel -->
                    <div class="mt-2">
                        <div class="collapse show" id="todayTasks">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Emp Fast Name</th>
                                                <th scope="col">Emp Last Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">email</th>
                                            </tr>
                                        </thead>
                                        @if (!empty($user) && count($user) > 0)
                                            @foreach($user as $key =>$value)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{$key+1}}</th>
                                                    <td>{{$value['first_name']}}</td>
                                                    <td>{{$value['last_name']}}</td>
                                                    <td>{{$value['phone_number']}}</td>
                                                    <td>{{$value['email']}}</td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        @else
                                        <tr>data no found</tr>
                                        @endif
                                    </table>
                                    <!-- end task -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card -->
                        </div> <!-- end .collapse-->
                    </div> <!-- end .mt-2-->
                </div> <!-- end col -->
            </div>
            <!--  Add new task modal -->
            <!-- /.modal -->
            <!-- end row-->

        </div>
    </div>
</div>
@endsection

@section('script')
@endsection