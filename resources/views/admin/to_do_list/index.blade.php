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
                        <h4 class="page-title">To Do List
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
                                                <th scope="col">Emp Name</th>
                                                <th scope="col">Task</th>
                                                <th scope="col">task_description</th>
                                                <th scope="col">prioritie</th>
                                                <th scope="col">task_date</th>
                                                <th scope="col">status</th>
                                            </tr>
                                        </thead>
                                        @if (!empty($todo_list) && count($todo_list) > 0)
                                            @foreach($todo_list as $key =>$value)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{$key+1}}</th>
                                                    <td>{{$value['user']['first_name']}}</td>
                                                    <td>{{$value['task']}}</td>
                                                    <td>{{$value['task_description']}}</td>
                                                    <td>
                                                        @if($value['prioritie'] == 0)
                                                            <span class="badge badge-success">Low</span>
                                                            @elseif($value['prioritie'] == 1)
                                                            <span class="badge badge-secondary">Medium</span>
                                                            @else
                                                            <span class="badge badge-danger-lighten p-1">High</span>
                                                            @endif
                                                        </td>
                                                    <td>{{$value['task_date']}}</td>
                                                    <td>
                                                        @if($value['is_completed'] == 0)
                                                        <span class="badge badge-danger-lighten p-1">In progress</span>
                                                        @else
                                                        <span class="badge badge-success">completed</span>
                                                        @endif
                                                    </td>
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