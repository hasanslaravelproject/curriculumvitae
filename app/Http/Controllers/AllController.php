<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AllController extends Controller
{
   public function index(){

       $abcs = DB::table('students')
             ->rightJoin('student_details', 'students.s_id', '=', 'student_details.student_id')
             ->rightJoin('family_infos', 'students.s_id', '=', 'family_infos.student_id')
             ->get();

       return view('all.index', compact('abcs'));
   }
   public function login(Request $request){

   }
    public function logout(){
        //session(['st' => "No"]);
        Session::flush();
        return redirect()->route('login');
    }
}
