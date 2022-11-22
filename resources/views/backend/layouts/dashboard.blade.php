@extends('backend.layouts.app')
@section('content')
<!-- Page Content -->
<div class="p-4">
    <div class="bg-image bg-image-bottom p-4" style="background-image: url('https://twproject.com/blog/wp-content/uploads/project-management-software-in-mother-tongue.png'); background-position: center;">
        <div class="bg-primary-dark-op">
            <div class="content content-top pt-0 text-center overflow-hidden">
                <div style="padding: 40px;">
                    <h2 class="h4 font-w400 text-white-op js-appear-enabled">Welcome to</h2>
                    <h1 class="font-w700 text-white mb-10 js-appear-enabled">Project Management System Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::user()->role == 'admin')
<div class="row justify p-4">
    <!-- Row #5 -->
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="{{route('user.list')}}">
            <div class="block-content">
                <p class="mt-5">
                    <i class="fa fa-user fa-2x"></i>
                </p>
                <p class="font-w600">Employee</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="{{route('client.list')}}">
            <div class="block-content">
                <p class="mt-5">
                    <i class="fa fa-users fa-2x"></i>
                </p>
                <p class="font-w600">Clients</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="{{route('project.list')}}">
            <div class="block-content">
                <p class="mt-5">
                    <i class="fa fa-bookmark fa-2x"></i>
                </p>
                <p class="font-w600">Project</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="{{route('task.list')}}">
            <div class="block-content">
                <p class="mt-5">
                    <i class="fa fa-tasks fa-2x"></i>
                </p>
                <p class="font-w600">Task Assign</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="#">
            <div class="block-content">
                <p class="mt-5">
                    <i class="fa fa-file fa-2x"></i>
                </p>
                <p class="font-w600">Report</p>
            </div>
        </a>
    </div>
    <!-- <div class="col-6 col-md-4 col-xl-2">
        <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
                <p class="mt-5">
                    <i class="si si-settings fa-2x"></i>
                </p>
                <p class="font-w600">Settings</p>
            </div>
        </a>
    </div> -->
    <!-- END Row #5 -->
</div>
@endif
@if(Auth::user()->role == 'employee')
<div class="container">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-white"><b>Your's Last 10 Assigning Task</b></h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Employee Name &nbsp;</th>
                            <th class="text-center">Project Name &nbsp;</th>
                            <th class="text-center">Notes &nbsp;</th>
                            <th class="text-center">Deadline Date &nbsp;</th>
                            <th class="text-center">Deadline Time &nbsp;</th>
                            <th class="text-center">Status &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach($tasks as $task)
                        <tr>
                            <td class="text-center">{{$sl++}}</td>
                            <td class="text-center">{{$task->user ? $task->user->name : 'N/A'}}</td>
                            <td class="text-center">{{$task->project ? $task->project->name : 'N/A'}}</td>
                            <td class="text-center">{{$task->notes}}</td>
                            <td class="text-center">{{$task->deadline_date}}</td>
                            <td class="text-center">{{$task->deadline_time}}</td>
                            <td class="text-center">
                                @if($task->status == 1)
                                    <span class="badge badge-info">Panding</span>
                                @elseif($task->status == 2)
                                    <span class="badge badge-success">Done</span>
                                @else
                                    <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-white"><b>Last 10 Task Assign</b></h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Employee Name &nbsp;</th>
                            <th class="text-center">Project Name &nbsp;</th>
                            <th class="text-center">Notes &nbsp;</th>
                            <th class="text-center">Deadline Date &nbsp;</th>
                            <th class="text-center">Deadline Time &nbsp;</th>
                            <th class="text-center">Status &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach($tasks as $task)
                        <tr>
                            <td class="text-center">{{$sl++}}</td>
                            <td class="text-center">{{$task->user ? $task->user->name : 'N/A'}}</td>
                            <td class="text-center">{{$task->project ? $task->project->name : 'N/A'}}</td>
                            <td class="text-center">{{$task->notes}}</td>
                            <td class="text-center">{{$task->deadline_date}}</td>
                            <td class="text-center">{{$task->deadline_time}}</td>
                            <td class="text-center">
                                @if($task->status == 1)
                                    <span class="badge badge-info">Panding</span>
                                @elseif($task->status == 2)
                                    <span class="badge badge-success">Done</span>
                                @else
                                    <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
<!-- END Page Content -->
@endsection