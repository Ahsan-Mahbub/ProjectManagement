@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title text-white"><b>Task Assign Table</b></h3>
	        <a data-toggle="modal" data-target="#modal-large" class="btn btn-sm btn-alt-info">
	            <i class="fa fa-plus mr-5"></i>Add Task Assign
	        </a>
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
	                            <form action="{{route('task.delete',$task->id)}}" method="post" accept-charset="utf-8">
	                                @csrf
	                                @method('delete')
	                               <button type="submit" class="btn btn-circle btn-alt-danger mr-5 mb-5 delete-confirm" onclick = "deleteItem();" >
		                                <i class="fa fa-trash-o"></i>
		                            </button>
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

<!-- user add modal -->
<div class="modal show" id="modal-large" tabindex="-1" user="dialog" aria-labelledby="modal-large">
    <div class="modal-dialog modal-lg" user="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add Task Assign</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                    	<form action="{{route('task.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                        <div class="form-group row">
	                        	<div class="pt-2 col-md-6">
	                            	<label for="editor">Employee Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <select class="form-control" name="user_id" required>
			                            	<option value="">Select Employee</option>
			                            	@foreach($employees as $employee)
			                            	<option value="{{$employee->id}}">{{$employee->name}}</option>
			                            	@endforeach
			                            </select>
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-6">
	                            	<label for="editor">Project Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <select class="form-control" name="project_id" required>
			                            	<option value="">Select Project</option>
			                            	@foreach($projects as $project)
			                            	<option value="{{$project->id}}">{{$project->name}}</option>
			                            	@endforeach
			                            </select>
	                                </div>
	                            </div>

	                            <div class="col-md-6 pt-2">
	                            	<label for="Employee">Deadline Date: </label>
		                            <div>
		                                <input type="date" class="js-autocomplete form-control" name="deadline_date">
		                            </div>
	                            </div>
	                            <div class="col-md-6 pt-2">
	                            	<label for="Employee">Deadline Time: </label>
		                            <div>
		                                <input type="time" class="js-autocomplete form-control" name="deadline_time">
		                            </div>
	                            </div>
	                            <div class="col-md-12 pt-2">
	                            	<label for="Employee">Assign Note: </label>
		                            <div>
		                                <textarea class="js-autocomplete form-control" rows="5" name="notes" placeholder="Enter Notes.."></textarea>
		                            </div>
	                            </div>
	                        </div>
	                        <div class="form-group text-right">
	                            <button type="submit" class="btn btn-square btn-primary min-width-125 mb-10 mt-20">Submit</button>
	                        </div>
	                    </form>
				    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end user add modal -->
@endsection

@section('script')
<script type="text/javascript">
    function deleteItem() {    
       alert ("If you click ok!! Then item remove from record");  
    }    
</script>
@endsection