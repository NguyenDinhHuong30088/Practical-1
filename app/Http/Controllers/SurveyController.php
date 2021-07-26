<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function comment(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "comment"=>"required"
        ],[
            "name.required"=>"Nhập tên sinh viên",
            "email.required"=>"Nhập email",
            "phone.required"=>"Nhập số điện thoại",
            "comment.required"=>"Nhập nhận xét : .!",
        ]);
        Comment::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "phone"=>$request->get("phone"),
            "comment"=>$request->get("comment")
        ]);

        return redirect()->back()->with('success','Đã Gửi.!');
    }
}
