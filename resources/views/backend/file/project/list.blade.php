@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title text-white"><b>Project Table</b></h3>
	        <a data-toggle="modal" data-target="#modal-large" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Project
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Client Name &nbsp;</th>
	                        <th class="text-center">Project Name &nbsp;</th>
	                        <th class="text-center">Amount &nbsp;</th>
	                        <th class="text-center">Details &nbsp;</th>
	                        <th class="text-center">Status &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($projects as $project)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">{{$project->client ? $project->client->name : ''}}</td>
		                	<td class="text-center">{{$project->name}}</td>
		                	<td class="text-center">{{$project->amount}}</td>
		                	<td class="text-center">{{$project->details}}</td>
		                	<td class="text-center">
		                		@if($project->status == 1)
		                			<span class="badge badge-success">Active</span>
		                		@else
		                			<span class="badge badge-danger">Inactive</span>
		                		@endif
		                	</td>
                    		<td class="text-center icon-statte">
	                            <form action="{{route('project.delete',$project->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('project.status',$project->id)}}" class="btn btn-circle mr-5 mb-5 {{$project->status == 1 ? 'btn-alt-success' :'btn-alt-danger'}}">
		                                <i class="fa fa-refresh {{$project->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a href="{{route('project.edit',$project->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
		                                <i class="fa fa-edit"></i>
		                            </a>
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

<!-- project add modal -->
<div class="modal show" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add Project</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                    	<form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                       <div class="form-group row">
	                       	<div class="pt-2 col-md-4">
	                            	<label for="editor">Client Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <select class="form-control" name="client_id" required>
			                            	<option value="">Select Client</option>
			                            	@foreach($clients as $client)
			                            	<option value="{{$client->id}}">{{$client->name}}</option>
			                            	@endforeach
			                            </select>
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Project Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <input type="text" name="name" required class="form-control" placeholder="Enter Project Name">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Amount: <span class="text-danger">*</span></label>
			                        <div>
			                            <input type="number" name="amount" required class="form-control" placeholder="Enter Amount">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-12">
	                            	<label for="editor"> Project Details: <span class="text-danger">*</span></label>
			                        <div>
			                        	<textarea name="details" class="form-control" required placeholder="Enter Project Details" rows="5"></textarea>
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
<!-- end project add modal -->
@endsection
@section('script')
<script type="text/javascript">
    function deleteItem() {    
       alert ("If you click ok!! Then item remove from record");  
    }    
</script>
@endsection