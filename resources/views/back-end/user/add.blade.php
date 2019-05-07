@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Khách hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm khách hàng</small></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body">
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
			<form action="" method="POST" role="form">
				      		{{ csrf_field() }}

				      	<div class="form-group">
				      			<label for="input-id">Tên khách hàng</label>
				      			<input type="text" name="txtName" id="inputTxtName" class="form-control" value="" placeholder="Nhập tên khách hàng">
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">E-mail</label>
				      			<input type="text" name="txtEmail" id="inputTxtName" class="form-control" value="" placeholder="Nhập e-mail">
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">Mật khẩu</label>
				      			<input type="password" name="txtMK" id="inputTxtName" class="form-control" value="" placeholder="Nhập mật khẩu" >
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Nhập lại mật khẩu</label>
				      			<input type="password" name="txtXMK" id="inputTxtName" class="form-control" value="" placeholder="Nhập lại mật khẩu">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Địa chỉ</label>
				      			<input type="text" name="txtDC" id="inputTxtName" class="form-control" value="" placeholder="Nhập địa chỉ">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Số điện thoại</label>
				      			<input type="text" name="txtDT" id="inputTxtName" class="form-control" value="" placeholder="Nhập số điện thoại">
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">Trạng thái xác nhận</label>
				      			<input type="text" name="txtXN" id="inputTxtName" class="form-control" value="" placeholder="Nhập trạng thái 1 hoặc 0">
				      		</div>

				      		<input type="submit" name="btnCateAdd" value="Thêm" class="button" />
				      		<button type="reset">Reset</button>
				      	</form>					      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection