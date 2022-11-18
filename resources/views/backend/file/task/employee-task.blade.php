@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title text-white"><b>Assigning Task Table</b></h3>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Employee Name &nbsp;</th>
	                        <th class="text-center">Project Name &nbsp;</th>
	                        <th class="text-center">Notes &nbsp;</th>
	                        <th class="text-center">Deadline Date &nbsp;</th>
	                        <th class="text-center">Deadline Time &nbsp;</th>
	                        <th class="text-center">Status &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
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
		                	<td class="text-center icon-statte">
		                		<div class="btn-group" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-alt-info mr-5 mb-5 dropdown-toggle" id="toolbarDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</button>
                                    <div class="dropdown-menu" aria-labelledby="toolbarDrop" style="">
                                        <a class="dropdown-item text-success" href="{{url('employee/task/status/'.$task->id.'?status=2')}}">
                                            <i class="fa fa-fw fa-check mr-5"></i>Done
                                        </a>
                                        <a class="dropdown-item text-danger" href="{{url('employee/task/status/'.$task->id.'?status=0')}}">
                                            <i class="fa fa-fw fa-trash mr-5"></i>Rejected
                                        </a>
                                    </div>
                                </div>
		                	</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
@endsection