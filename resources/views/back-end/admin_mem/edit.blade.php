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
				<h1 class="page-header"><small>Sửa thông tin nhân viên</small></h1>
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
                
                <label>Chọn quyền</label>
                <p>
                <label class="radio-inline">
                <input name="level" value="0"
                   @if($data->level !==1)
                      {{"checked"}}
                   @endif 

                 type="radio">Nhân viên
                </label>
                </p>

                <p>
                <label class="radio-inline">
                <input name="level" value="1" 
                   @if($data->level == 1)
                      {{"checked"}}
                   @endif

                type="radio">Quản trị
                </label>               	
                </p>

                </div>

				      	<div class="form-group">
				      			<label for="input-id">Tên nhân viên</label>
				      			<input type="text" name="txtName" id="inputTxtName" class="form-control" value="{!! old('txtCateName', isset($data['name']) ? $data['name'] : null)!!}" placeholder="Nhập tên nhân viên">
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">E-mail</label>
				      			<input type="text" name="txtEmail" id="inputTxtName" class="form-control" value="{!! old('txtCateName', isset($data['email']) ? $data['email'] : null)!!}" placeholder="Nhập E-mail" readonly="">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Mật khẩu</label>
				      			<input type="text" name="txtEmail" id="inputTxtName" class="form-control" value="{!! old('txtCateName', isset($data['password']) ? $data['password'] : null)!!}" placeholder="Nhập mật khẩu" readonly="">
				      		</div>

				      		<input type="submit" name="btnCateAdd" value="Lưu lại" class="button" />
				      		<button type="reset">Reset</button>
				      	</form>					      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection