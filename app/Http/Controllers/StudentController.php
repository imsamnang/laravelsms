<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;
use App\Student;
use App\Status;
use App\FileUpload;
use File;
use Storage;

class StudentController extends Controller
{
  private $limit =5;

   public function getStudentRegister()
   {
   	    $academics = Academic::orderBy('academic_id','DESC')->get();
        $programs = Program::all();
        $levels = Level::all();
        $shifts = Shift::all();
        $times = Time::all();
        $batches = Batch::all();
        $groups = Group::all();
        $student_id = Student::max('student_id');
    	return view('student.studentregistration',compact('programs','academics','levels','shifts','times','batches','groups','student_id'));
   }
// ===============================================

   public function postStudentRegister(Request $r)
   {
   	  $st = new Student;
      $st->first_name = $r->first_name;
      $st->last_name = $r->last_name;
      $st->sex = $r->sex;
      $st->dob = $r->dob;
      $st->email = $r->email;
      $st->rac = $r->rac;
      $st->status = $r->status;
      $st->nationality = $r->nationality;
      $st->national_card = $r->national_card;
      $st->passport = $r->passport;
      $st->phone = $r->phone;
      $st->village = $r->village;
      $st->commune = $r->commune;
      $st->district = $r->district;
      $st->province = $r->province;
      $st->current_address = $r->current_address;
      $st->dateregistered = $r->dateregistered;
      $st->user_id = $r->user_id;
      $st->photo = FileUpload::photo($r,'photo'); 
      if ($st->save()){
        $student_id = $st->student_id;
        Status::insert(['student_id'=>$student_id,'class_id' => $r->class_id]);
        return redirect()->route('goPayment',['student_id'=>$student_id]);
      }
   }

   public function getAllStudent()
   {
    // $students = Student::paginate($this->limit);
    return view('student.studentlist');
   }

   public function get_student_info_by_search(Request $r)
   {
      if($r->ajax())
      {        
        $students=$this->data($r['search']);
        // if(!(empty($r['search'])))       
        // {
        //   $search = $r['search'] ;
        //   $views = view('student.getlist',compact('students','search'))->render();
        //   return response($views); 
        // }
          $search = $r['search'] ;
          $views = view('student.getlist',compact('students','search'))->render();
          return response($views); 
      }
   }

   public function getstudentinfosearch(Request $r)
   {
      if($r->ajax())
      {
        $students = $this->data($r['search']);
        return view('student.getlist',compact('students'))->render();
      }
   }

   public function data($search)
   {
      if($search !="" && !empty($search))
      {
        return  $students = Student::where('student_id',$search)
                              ->orWhere('first_name','like','%'.$search.'%')
                              ->orWhere('last_name','like','%'.$search.'%')
                              ->paginate($this->limit);
      }else
      {
        return $student = Student::paginate($this->limit);
      }
   }
}
