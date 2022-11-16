@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title text-white"><b>Client Table</b></h3>
	        <a data-toggle="modal" data-target="#modal-large" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Client
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Client Name &nbsp;</th>
	                        <th class="text-center">Phone &nbsp;</th>
	                        <th class="text-center">Email &nbsp;</th>
	                        <th class="text-center">Address &nbsp;</th>
	                        <th class="text-center">Status &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($clients as $client)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
		                	<td class="text-center">{{$client->name}}</td>
		                	<td class="text-center">{{$client->phone}}</td>
		                	<td class="text-center">{{$client->email}}</td>
		                	<td class="text-center">{{$client->address}}</td>
		                	<td class="text-center">
		                		@if($client->status == 1)
		                			<span class="badge badge-success">Active</span>
		                		@else
		                			<span class="badge badge-danger">Inactive</span>
		                		@endif
		                	</td>
                    		<td class="text-center icon-statte">
	                            <form action="{{route('client.delete',$client->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('client.status',$client->id)}}" class="btn btn-circle mr-5 mb-5 {{$client->status == 1 ? 'btn-alt-success' :'btn-alt-danger'}}">
		                                <i class="fa fa-refresh {{$client->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a data-toggle="modal" data-target="#modal-edit" id="editclient" data="{{$client->id}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
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

<!-- client add modal -->
<div class="modal show" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add Client</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                    	<form action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                       <div class="form-group row">
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Client Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <input type="text" name="name" required class="form-control" placeholder="Enter Client Name">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Email: </label>
			                        <div>
			                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Phone: </label>
			                        <div>
			                            <input type="phone" name="phone" class="form-control" placeholder="Enter Phone">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-12">
	                            	<label for="editor">Address: <span class="text-danger">*</span></label>
			                        <div>
			                        	<textarea name="address" class="form-control" required placeholder="Enter Address" rows="5"></textarea>
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
<!-- end client add modal -->

<!-- edit client edit modal -->
<div class="modal show" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-large">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit client</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                    	<form action="{{route('client.update')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<input type="hidden" name="id" id="client_id">
	                        <div class="form-group row">
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Client Name: <span class="text-danger">*</span></label>
			                        <div>
			                            <input type="text" name="name" id="name" required class="form-control" placeholder="Enter Client Name">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Email: </label>
			                        <div>
			                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-4">
	                            	<label for="editor">Phone: </label>
			                        <div>
			                            <input type="phone" name="phone" id="phone" class="form-control" placeholder="Enter Phone">
	                                </div>
	                            </div>
	                            <div class="pt-2 col-md-12">
	                            	<label for="editor">Address: <span class="text-danger">*</span></label>
			                        <div>
			                        	<textarea name="address" id="address" class="form-control" required placeholder="Enter Address" rows="5"></textarea>
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
</div>
<!-- end client edit modal -->
@endsection
@section('script')
<script type="text/javascript">
	$(document).on("click", "#editclient", function () {
        let id = $(this).attr("data");
        console.log(id);
        $.ajax({
            url: "/admin/client/edit/"+id,
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#client_id").val(response.id);
                $("#name").val(response.name);
                $("#email").val(response.email);
                $("#phone").val(response.phone);
                $("#address").val(response.address);
            }
        })
    })
    function deleteItem() {    
       alert ("If you click ok!! Then item remove from record");  
    }    
</script>
@endsection