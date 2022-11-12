@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="row justify">
		<div class="col-xl-10 single-filed">
			<div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-white">Employee Update</h3>
                    <div class="block-options">
                        <a href="{{route('user.list')}}" class="btn btn-sm btn-alt-primary">
				            <i class="fa fa-list mr-5"></i>Employee List
				        </a>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
	                    @csrf
                        <div class="form-group row">
	                        <div class="col-md-6 mb-2">
	                        	<label class="col-12" for="user">Employee Name: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="text" class="js-autocomplete form-control" name="name" value="{{$user->name}}" required placeholder="Employee Name..">
	                            </div>
	                        </div>
	                        <div class="col-md-6 mb-2">
	                        	<label class="col-12" for="user">Employee Email: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="email" class="js-autocomplete form-control" name="email" value="{{$user->email}}" required placeholder="Employee Email..">
	                            </div>
	                        </div>
	                        <div class="col-md-6 mb-2">
	                        	<label class="col-12" for="user">Employee Phone Number: </label>
	                            <div class="col-lg-12">
	                                <input type="text" class="js-autocomplete form-control" name="phone" value="{{$user->phone}}" placeholder="Employee Phone Number..">
	                            </div>
	                        </div>
	                        <div class="col-md-6 mb-2">
	                        	<label class="col-12" for="user">Password: </label>
	                            <div class="col-lg-12">
	                                <input type="password" class="js-autocomplete form-control" name="m_password" placeholder="If Cahnges">
	                            </div>
	                        </div>
	                    </div>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <button Type="submit" class="btn btn-alt-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection