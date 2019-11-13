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


class CourseController extends Controller
{
    public function __construct()
    {
    	$this->middleware('web');
    }

    public function getManageCourse()
    {
			$academics = Academic::orderBy('academic_id','DESC')->get();
			$programs = Program::all();
			$levels = Level::all();
			$shifts = Shift::all();
			$times = Time::all();
			$batches = Batch::all();
			$groups = Group::orderBy('group_id','DESC')->get();
			$groups = Group::all();
			return view('courses.manageCourse',compact('programs','academics','levels','shifts','times','batches','groups'));
    }

    public function postInsertAcademic(Request $request)
    {
    	if ($request->ajax())
    	{
    		$academic = new Academic;
    		$academic['academic'] = $request->academic;

            if ($academic->save())
            {
                return response(['msg'=>'Insert data Successfully']);
                // return response(Academic::create($request->all()));
            }
    	}
    }
	//======================================================//
    public function postInsertProgram(Request $r)
    {
        if ($r->ajax())
        {
            return response(Program::create($r->all()));
        }
    }

  //======================================================//
    public function postInsertLevel(Request $r)
    {
        if ($r->ajax())
        {
            return response(Level::create($r->all()));
        }
    }  

    public function showlevel(Request $r)
    {
        if ($r->ajax())
        {
            return response(Level::where('program_id',$r->program_id)->get());
        }
    }
  //======================================================//
    public function postInsertGroup(Request $r)
    {
        if ($r->ajax())
        {
            return response(Group::create($r->all()));
        }
    }

  //======================================================//
    public function postInsertShift(Request $r)
    {
        if ($r->ajax())
        {
            return response(Shift::create($r->all()));
        }
    }

  //======================================================//
    public function postInsertTime(Request $r)
    {
        if ($r->ajax())
        {
            return response(Time::create($r->all()));
        }
    }

  //======================================================//
    public function postInsertBatch(Request $r)
    {
        if ($r->ajax())
        {
            return response(Batch::create($r->all()));
        }
    }

  //======================================================//
    public function postInsertClass(Request $r)
    {
			if ($r->ajax())
			{
				return response(MyClass::create($r->all()));
			}
    }

    //=======================================================//
    public function showClassInformation(Request $request)
    {
        if ($request->academic_id!="" && $request->program_id=="")
        {
          $criterial = array('academics.academic_id' => $request->academic_id);
				}
				elseif($request->academic_id!="" && $request->program_id==!"") {
					$criterial = array('academics.academic_id' => $request->academic_id,
														'programs.program_id'=> $request->program_id,
														'levels.level_id' => $request->level_id,
														'shifts.shift_id' => $request->shift_id,
														'times.time_id' => $request->time_id,
														'batches.batch_id'=> $request->batch_id,
														'groups.group_id'=> $request->group_id
												);					
				}
        elseif ($request->academic_id !="" && 
                $request->program_id !="" && 
                $request->level_id !="" &&
                $request->shift_id !=="" &&
                $request->time_id !=="" &&
                $request->batch_id !=="" &&
                $request->group_id !==""
            ) 
        {
					$criterial = array('academics.academic_id' => $request->academic_id,
														'programs.program_id'=> $request->program_id,
														'levels.level_id' => $request->level_id,
														'shifts.shift_id' => $request->shift_id,
														'times.time_id' => $request->time_id,
														'batches.batch_id'=> $request->batch_id,
														'groups.group_id'=> $request->group_id
												);
        } 
        // elseif ($request->academic_id !="" && 
        //         $request->program_id !="" && 
        //         $request->level_id !="" &&
        //         $request->shift_id !="" &&
        //         $request->time_id =="" &&
        //         $request->batch_id =="" &&
        //         $request->group_id =="") 
        // {
        //     $criterial = array('academics.academic_id' => $request->academic_id,
        //                        'programs.program_id'=> $request->program_id,
        //                        'levels.level_id' => $request->level_id,
        //                        'shifts.shift_id' => $request->shift_id);
        // }
        // elseif ($request->academic_id !="" && 
        //         $request->program_id !="" && 
        //         $request->level_id !="" &&
        //         $request->shift_id !="" &&
        //         $request->time_id !="" &&
        //         $request->batch_id =="" &&
        //         $request->group_id =="") 
        // {
        //     $criterial = array('academics.academic_id' => $request->academic_id,
        //                        'programs.program_id'=> $request->program_id,
        //                        'levels.level_id' => $request->level_id,
        //                        'shifts.shift_id' => $request->shift_id,
        //                        'times.time_id' => $request->time_id);
        // }
        // elseif ($request->academic_id !="" && 
        //         $request->program_id !="" && 
        //         $request->level_id !="" &&
        //         $request->shift_id !="" &&
        //         $request->time_id !="" &&
        //         $request->batch_id !="" &&
        //         $request->group_id =="") 
        // {
        //     $criterial = array('academics.academic_id' => $request->academic_id,
        //                        'programs.program_id'=> $request->program_id,
        //                        'levels.level_id' => $request->level_id,
        //                        'shifts.shift_id' => $request->shift_id,
        //                        'times.time_id' => $request->times_id,
        //                        'batches.batch_id' => $request->batch_id);
        // }
        // elseif        
        //         ([$request->academic_id !="" && 
        //             $request->program_id !="" && 
        //             $request->level_id !="" &&
        //             $request->shift_id !="" &&
        //             $request->time_id !="" &&
        //             $request->batch_id !="" &&
        //             $request->group_id !=""])
        // {
        //     $criterial = array('academics.academic_id' => $request->academic_id,
        //                        'programs.program_id'=> $request->program_id,
        //                        'levels.level_id' => $request->level_id,
        //                        'shifts.shift_id' => $request->shift_id,
        //                        'times.time_id' => $request->times_id,
        //                        'batches.batch_id' => $request->batch_id,
        //                        'groups.group_id' => $request->group_id);
        // }  
        $classes = $this->ClassInformation($criterial)->get();
        return view('class.classinfo',compact('classes'));
    }
    // =====================================================//
    public function ClassInformation($criterial)
    {
        return MyClass::join('academics','academics.academic_id','=','classes.academic_id')
                            ->join('levels','levels.level_id','=','classes.level_id')
                            ->join('programs','programs.program_id','=','levels.program_id')
                            ->join('shifts','shifts.shift_id','=','classes.shift_id')
                            ->join('times','times.time_id','=','classes.time_id')
                            ->join('batches','batches.batch_id','=','classes.batch_id')
                            ->join('groups','groups.group_id','=','classes.group_id')
                            ->where($criterial)
                            ->orderBy('classes.class_id','DESC');
    }

	// ===================delete class======================//
    public function deleteClass(Request $r)
    {
        if ( $r->ajax())
        {
            MyClass:: destroy($r->class_id);
        }
    }
	// =================Edit Class=====================//
    public function editClass(Request $r)
    {
        if ($r->ajax())
        {
            return response(MyClass::find($r->class_id));
           // showClassInfo($('#academic_id').val());
        }
    }

// =================Edit Class=====================//
    public function updateClassInfo(Request $r)
    {
        if ($r->ajax())
        {
            return response(MyClass::updateOrCreate(['class_id' => $r->class_id], $r->all()));
           // showClassInfo($('#academic_id').val());   
        }
    }
}
