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
            "comments"=>"required"
        ],[
            "name.required"=>"Nhập tên sinh viên",
            "email.required"=>"Nhập email",
            "phone.required"=>"Nhập số điện thoại",
            "comments.required"=>"Nhập nhận xét : .!",
        ]);
        Comment::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "phone"=>$request->get("phone"),
            "comments"=>$request->get("comments")
        ]);

        return redirect()->back()->with('success','Đã Gửi...!');
    }
}
