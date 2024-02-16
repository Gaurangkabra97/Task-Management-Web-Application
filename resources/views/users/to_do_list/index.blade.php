@extends('users.layout.master')
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
                            <a href="#" data-toggle="modal" data-target="#add-new-task-modal" class="btn btn-success btn-sm ml-3">Add New</a>
                            <!-- <a href="#" class="btn btn-success btn-sm ml-3">All To Do List</a> -->
                        </h4>
                    </div>
                    <!-- end page title -->

                    <!-- tasks panel -->
                    <div class="mt-2">
                        <div class="collapse show" id="todayTasks">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <!-- task -->
                                    @if (!empty($todo_list) && count($todo_list) > 0)
                                    @foreach($todo_list as $key=>$value)
                                    <div class="row justify-content-sm-between">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="task">
                                                <label class="custom-control-label" for="task1">
                                                    {{$value['task']}}
                                                </label>
                                            </div> <!-- end checkbox -->
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <ul class="list-inline font-13 text-right">
                                                        <li class="list-inline-item">
                                                            <i class='uil uil-schedule font-16 mr-1'></i> {{$value['task_date']}}
                                                        </li>
                                                        <li class="list-inline-item ml-2">
                                                            @if($value['prioritie'] == 0)
                                                            <span class="badge badge-success">Low</span>
                                                            @elseif($value['prioritie'] == 1)
                                                            <span class="badge badge-secondary">Medium</span>
                                                            @else
                                                            <span class="badge badge-danger-lighten p-1">High</span>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> <!-- end .d-flex-->
                                        </div> <!-- end col -->
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="breadcrumb-item" style="text-align:center;">
                                        <h5 class="" style="color:gray">To Do List empty</h5>
                                    </div>
                                    @endif
                                    <!-- end task -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card -->
                        </div> <!-- end .collapse-->
                    </div> <!-- end .mt-2-->
                </div> <!-- end col -->
            </div>
            <!--  Add new task modal -->
            <div class="modal fade task-modal-content" id="add-new-task-modal" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="NewTaskModalLabel">Create New Task</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form class="p-2" action="{{route('submit_todolist')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="task-title">Title</label>
                                            <input type="text" class="form-control form-control-light" name="task" id="task-title" placeholder="Enter title">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="task-priority2">Priority</label>
                                            <select name="taskpriority" class="form-control form-control-light" id="task-priority2">
                                                <option value="0">Low</option>
                                                <option value="1">Medium</option>
                                                <option value="2">High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="task-description">Description</label>
                                    <textarea class="form-control form-control-light" name="task_description" id="task-description" rows="3"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="task-priority">Due Date</label>
                                            <input type="text" name="date" class="form-control form-control-light" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- end row-->

        </div>
    </div>
</div>
@endsection

@section('script')
@endsection