@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="row justify">
		<div class="col-xl-10 single-filed">
			<div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-white">Project Update</h3>
                    <div class="block-options">
                        <a href="{{route('project.list')}}" class="btn btn-sm btn-alt-primary">
				            <i class="fa fa-list mr-5"></i>Project List
				        </a>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{route('project.update',$project->id)}}" method="post" enctype="multipart/form-data">
	                    @csrf
                        <div class="form-group row">
	                       	<div class="pt-2 col-md-4">
                            	<label for="editor">Client Name: <span class="text-danger">*</span></label>
		                        <div>
		                            <select class="form-control" name="client_id" required>
		                            	<option value="">Select Client</option>
		                            	@foreach($clients as $client)
		                            	<option value="{{$client->id}}" {{$project->client_id == $client->id ? 'selected' : ''}}>{{$client->name}}</option>
		                            	@endforeach
		                            </select>
                                </div>
                            </div>
                            <div class="pt-2 col-md-4">
                            	<label for="editor">Project Name: <span class="text-danger">*</span></label>
		                        <div>
		                            <input type="text" name="name" value="{{$project->name}}" required class="form-control" placeholder="Enter Project Name">
                                </div>
                            </div>
                            <div class="pt-2 col-md-4">
                            	<label for="editor">Amount: <span class="text-danger">*</span></label>
		                        <div>
		                            <input type="number" name="amount" value="{{$project->amount}}" required class="form-control" placeholder="Enter Amount">
                                </div>
                            </div>
                            <div class="pt-2 col-md-12">
                            	<label for="editor"> Project Details: <span class="text-danger">*</span></label>
		                        <div>
		                        	<textarea name="details" class="form-control" required placeholder="Enter Project Details" rows="5">{{$project->details}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-square btn-primary min-width-125 mb-10 mt-20">Update</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection