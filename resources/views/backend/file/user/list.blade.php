@extends('backend.layouts.app')
@section('content')
<div class="container">
	@if (count($errors) > 0)
	   <div class = "alert alert-danger pb-2">
	      <ul>
	         @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	         @endforeach
	      </ul>
	   </div>
	@endif

	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title text-white"><b>Employee Table</b></h3>
	        <a data-toggle="modal" data-target="#modal-large" class="btn btn-sm btn-alt-info">
	            <i class="fa fa-plus mr-5"></i>Add Employee
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Employee Name &nbsp;</th>
	                        <th class="text-center">Email &nbsp;</th>
	                        <th class="text-center">Phone &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($users as $user)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
		                	<td class="text-center">{{$user->name}}</td>
		                	<td class="text-center">{{$user->email}}</td>
		                	<td class="text-center">{{$user->phone}}</td>
		                	<td class="text-center icon-statte">
	                            <form action="{{route('user.delete',$user->id)}}" method="post" accept-charset="utf-8">
			                		<a href="{{route('user.edit',$user->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
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

<!-- user add modal -->
<div class="modal show" id="modal-large" tabindex="-1" user="dialog" aria-labelledby="modal-large">
    <div class="modal-dialog modal-lg" user="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add Employee</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                    	<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                        <div class="form-group row">
	                            <div class="col-md-6 mb-2">
	                            	<label class="col-12" for="user">Employee Name: <span class="text-danger">*</span></label>
		                            <div class="col-lg-12">
		                                <input type="text" class="js-autocomplete form-control" name="name" required placeholder="Employee Name..">
		                            </div>
	                            </div>
	                            <div class="col-md-6 mb-2">
	                            	<label class="col-12" for="Employee">Employee Email: <span class="text-danger">*</span></label>
		                            <div class="col-lg-12">
		                                <input type="email" class="js-autocomplete form-control" name="email" required placeholder="Employee Email..">
		                            </div>
	                            </div>
	                            <div class="col-md-6 mb-2">
	                            	<label class="col-12" for="Employee">Employee Phone Number: </label>
		                            <div class="col-lg-12">
		                                <input type="text" class="js-autocomplete form-control" name="phone" placeholder="Employee Phone Number..">
		                            </div>
	                            </div>
	                            <div class="col-md-6 mb-2">
	                            	<label class="col-12" for="user">Password: <span class="text-danger">*</span></label>
		                            <div class="col-lg-12">
		                                <input type="password" class="js-autocomplete form-control" name="m_password" required placeholder="********">
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