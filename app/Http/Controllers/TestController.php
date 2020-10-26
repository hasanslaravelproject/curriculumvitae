<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $abcs = Student::select('s_name')->get();
        return Response()->json($abcs);
    }
    public function getdetails($id){
        $abcs = Student::where('s_id',$id)->select('s_name')->get();
        return Response()->json($abcs);
    }
}
