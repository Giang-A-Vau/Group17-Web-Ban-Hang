<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EditUssersRequest;
use App\User;
use App\Admin_users;
use DateTime;

class UsersController extends Controller
{
   public function getlist()
   {
   		$data = User::paginate(10);
    	return view('back-end.user.list',['data'=>$data]);
   }
   public function getedit($id)
   {
   		$data = User::where('id',$id)->first();
   		return view('back-end.user.edit',['data'=>$data]);
   }

      public function postedit(Request $request, $id)
   {  
     $this->validate($request,
        [
          'txtName'=>'required|min:3',
          'txtDiaChi'=>'required|min:4',
          'txtDT'=>'required|min:9'
        ],
        [
          'txtName.required'=>'Bạn chưa nhập tên người dùng',
          'txtName.min'=>'Tên người dùng dài ít nhất 3 ký tự',
          'txtDiaChi.required'=>'Bạn chưa nhập địa chỉ',
          'txtDiaChi.min'=>'Địa chỉ phải dài từ 3 ký tự lên',
          'txtDT.required'=>'Bạn chưa nhập số điện thoại',
          'txtDT.min'=>'Bạn cần nhập đủ 9 số'

        ]);
     $data = User::find($id);
     $data->name = $request->txtName;
     $data->address = $request->txtDiaChi;
     $data->phone = $request->txtDT;
     $data->updated_at = new DateTime;
     $data->save();
    return redirect()->route('getmem')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công']);
   }

   public function getdel($id)
   {  
      $data = User::find($id);
      $data->delete();
         return redirect()->route('getmem')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa thành công']);
   }
public function getadd()
   {
      $data = User::all();
    return View ('back-end.user.add',['data'=>$data]);
   }
   public function postadd(Request $request)
   {
     $this->validate($request,
        [
          'txtName'=>'required|min:3',
          'txtEmail'=>'required',
          'txtMK'=>'required|min:6|max:32',
          'txtDC'=>'required|min:3|max:100',
          'txtDT'=>'required',
          'txtXN'=>'required'
          
        ],
        [
          'txtName.required'=>'Bạn chưa nhập tên người dùng',
          'txtName.min'=>'Tên người dùng dài ít nhất 3 ký tự',
          'txtEmail.required'=>'Bạn chưa nhập email',
          'txtMK.required'=>'Bạn chưa nhập mật khẩu',
          'txtMK.min'=>'Mật khẩu dài từ 4 đến 32 ký tự',
          'txtDC.required'=>'Bạn chưa nhập địa chỉ',
          'txtDC.min'=>'Địa chỉ phải dài hơn 3 ký tự',
          'txtDT.required'=>'Bạn chưa nhập số điện thoại',
          'txtXN.required'=> 'Bạn cần nhập trạng thái xác nhận0'
        ]);
      $data = new User();
      $data->name = $request->txtName;
      $data->email = $request->txtEmail;
      $data->password = $request->txtMK;
      $data->phone = $request->txtDT;
      $data->address = $request->txtDC;
      $data->status = $request->txtXN;
      $data->created_at = new DateTime;
      $data->save();
      return redirect()->route('getmem')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã thêm thành công']);
   }
   
}
