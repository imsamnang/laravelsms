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
use App\Fee;
use App\Transaction;
use App\StudentFee;
use App\ReceiptDetail;
use App\Receipt;
use App\FeeType;
use DB;

class FeeController extends Controller
{
   	public function getPayment()
   	{
   		return view('fees.searchpayment');
   	}

    public function payment($viewName, $student_id)
    {
        $feetypes = FeeType::all();
        $status = $this->student_status($student_id)->first();
        $programs = Program::where('program_id',$status->program_id)->get();
        $levels = Level::where('program_id',$status->program_id)->get();
        $studentfee = $this->show_school_fee($status->level_id)->first();
        $readStudentFee =$this->readStudentFee($student_id)->get();
        $readStudentTransact = $this->readStudentTransaction($student_id)->get();
        // $ts = $this->total_transaction($student_id);
        $receipt_id = ReceiptDetail::where('student_id',$student_id)->max('receipt_id');
      	return view($viewName,compact('programs',
                                    'levels','status',
                                    'studentfee','receipt_id',
                                    'readStudentFee',
                                    'readStudentTransact',
                                    'feetypes'))
                                    ->with('student_id',$student_id);
    }

    public function total_transaction($student_id)
    {
      return ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                            ->join('students','students.student_id','=','receiptdetails.student_id')
                            ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                            ->join('fees','fees.fee_id','=','transactions.fee_id') 
                            ->join('users','users.id','=','transactions.user_id')
                            ->select(DB::raw('SUM(transactions.paid) as total_transaction'))
                            ->where('students.student_id',$student_id)
                            ->groupBy('transactions.s_fee_id');
    }

    public function showStudentPayment(Request $r)
    {
      $student_id = $r->student_id;
      return $this->payment('fees.payment',$student_id);
    }

   	public function student_status($student_id)
   	{
			$status = Status::latest('statuses.status_id')
											->join('students','students.student_id','=','statuses.student_id')
											->join('classes','classes.class_id','=','statuses.class_id')
											->join('academics','academics.academic_id','=','classes.academic_id')
											->join('shifts','shifts.shift_id','=','classes.shift_id')
											->join('times','times.time_id','=','classes.time_id')
											->join('groups','groups.group_id','=','classes.group_id')
											->join('batchs','batchs.batch_id','=','classes.batch_id')
											->join('levels','levels.level_id','=','classes.level_id')
											->join('programs','programs.program_id','=','levels.program_id')
											->where('students.student_id',$student_id);
			return 	$status;													
   	}

    public function show_school_fee($level_id)
    {
      return Fee::join('academics','academics.academic_id','=','fees.academic_id')
                  ->join('levels','levels.level_id','=','fees.level_id')
                  ->join('programs','programs.program_id','=','levels.program_id')
                  ->join('feetypes','feetypes.fee_type_id','=','fees.fee_type_id')
                  ->where('levels.level_id',$level_id)
                  ->orderBy('fees.amount','DESC');
    }

    public function readStudentFee($student_id)
    {
      return StudentFee::join('fees','fees.fee_id','=','studentfees.fee_id')
                         ->join('students','students.student_id','=','studentfees.student_id')
                         ->join('levels','levels.level_id','=','studentfees.level_id')
                         ->join('programs','programs.program_id','=','levels.program_id')
                         ->select('levels.level_id',
                                  'levels.level',
                                  'fees.amount as school_fee',
                                  'students.student_id',
                                  'studentfees.s_fee_id',
                                  'studentfees.amount as student_amount',
                                  'studentfees.discount') 
                         ->where('students.student_id',$student_id);
    }

    public function readStudentTransaction($student_id)
    {
        return ReceiptDetail::join('receipts','receipts.receipt_id','=','receiptdetails.receipt_id')
                              ->join('students','students.student_id','=','receiptdetails.student_id')
                              ->join('transactions','transactions.transact_id','=','receiptdetails.transact_id')
                              ->join('fees','fees.fee_id','=','transactions.transact_id') 
                              ->join('users','users.id','=','transactions.user_id')
                              ->where('students.student_id',$student_id);
    }

    public function goPayment($student_id)
    {
      return $this->payment('fees.payment',$student_id);
    } 

    public function savePayment(Request $r)
    {
        $studentfee = StudentFee::create($r->all());
        // dump($studentfee);
        $transact = Transaction::create(['transact_date'=>$r->transact_date,
                                        'fee_id'=>$r->fee_id,
                                        'user_id'=>$r->user_id,
                                        'student_id'=>$r->student_id,
                                        's_fee_id'=>$studentfee->s_fee_id,
                                        'paid' => $r->paid,
                                        'remark'=>$r->remark,
                                        'description' => $r->description
                                        ]);
        // dump($transact); 
        $receipt_id = Receipt::autoNumber();
        
        $receiptdetail = ReceiptDetail::create(['receipt_id' =>$receipt_id,
                              'student_id'=>$r->student_id,
                              'transact_id'=>$transact->transact_id]);
        // dump($receiptdetail);
        return back();
    }

    public function createFee(Request $r)
    {
        if ($r->ajax())
        {
          $fee = Fee::create($r->all());
          return response($fee); 
        }
    }
}
