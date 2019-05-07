<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin_users;
use DateTime;

class Admin_usersController extends Controller
{
    public function getlist()
   {
   		$data = Admin_users::paginate(10);
    	return view('back-end.admin_mem.list',['data'=>$data]);
   }
   public function getedit($id)
   {
   		$data = Admin_users::where('id',$id)->first();
   		return view('back-end.admin_mem.edit',['data'=>$data]);
   }
   public function postedit(Request $request, $id)
   { 
   	$this->validate($request,
        [
          'txtName'=>'required|min:3'

        ],
        [
          'txtName.required'=>'Bạn chưa nhập tên người dùng',
          'txtName.min'=>'Tên người dùng dài ít nhất 3 ký tự'

        ]);

     $data = Admin_users::find($id);
     $data->name = $request->txtName;
     $data->level= $request->level;
     $data->updated_at = new DateTime;
     $data->save();
    return redirect()->route('getnv')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công']);

   }
   public function getdel($id)
   {  
      $data = Admin_users::find($id);
      $data->delete();
         return redirect()->route('getnv')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa thành công']);
   }
  

  public function getadd()
   {
      $data = Admin_users::all();
    return View ('back-end.admin_mem.add',['data'=>$data]);
   }
   public function postadd(Request $request)
   {
     $this->validate($request,
        [
          'txtName'=>'required|min:3',
          'txtEmail'=>'required',
          'txtMK'=>'required|min:6|max:32'
          
        ],
        [
          'txtName.required'=>'Bạn chưa nhập tên người dùng',
          'txtName.min'=>'Tên người dùng dài ít nhất 3 ký tự',
          'txtEmail.required'=>'Bạn chưa nhập email',
          'txtMK.required'=>'Bạn chưa nhập mật khẩu',
          'txtMK.min'=>'Mật khẩu dài từ 4 đến 32 ký tự'
          

        ]);
      $data = new Admin_users();
      $data->name = $request->txtName;
      $data->email = $request->txtEmail;
      $data->password = $request->txtMK;
      $data->level = $request->level;
      $data->created_at = new DateTime;
      $data->save();
      return redirect()->route('getnv')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa thành công']);
   }
}
