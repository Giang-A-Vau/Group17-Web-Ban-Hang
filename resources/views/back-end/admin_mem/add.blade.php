@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Nhân viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm nhân viên</small></h1>
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
                        <label>Phân quyền người dùng</label>
                        <label class="radio-inline">
                        <input name="level" value="0" checked="" type="radio">User
                        </label>
                        <label class="radio-inline">
                        <input name="level" value="1" type="radio">Admin
                        </label>
                    </div>


				      	<div class="form-group">
				      			<label for="input-id">Tên nhân viên</label>
				      			<input type="text" name="txtName" id="inputTxtName" class="form-control" value="" placeholder="Nhập tên nhân viên">
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