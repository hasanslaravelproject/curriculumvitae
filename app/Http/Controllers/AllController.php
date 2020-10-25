<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllController extends Controller
{
   public function index(){

       $abcs = DB::table('students')
             ->rightJoin('student_details', 'students.s_id', '=', 'student_details.student_id')
             ->rightJoin('family_infos', 'students.s_id', '=', 'family_infos.student_id')
             ->get();

       return view('all.index', compact('abcs'));
   }
}
