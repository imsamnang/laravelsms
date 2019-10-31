@extends('layouts.master')
@section('content')
@include('fees.stylesheet.css-style')
@include('fees.createfee')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-3">
			<form action="{{route('showStudentPayment')}}" class="search-payent" method="GET">
				<input value="{{ $student_id or null }}" class="form-control eng-name" name="student_id" id="student_id" type="text" placeholder="Student ID">
			</form>
		</div>
		{{-- ------------------------------------------------------------------ --}}
		<div class="col-md-3">
			<label for="eng-name" id="eng-name" class="eng-name">Name: <b class="student-name">{{$status->first_name." ".$status->last_name}}</b></label>
		</div>
		<div class="col-md-3">
		</div>

		<div class="col-md-3" style="text-align: right;">
			<label for="date-invoice">Date: <b>{{ date('d-M-Y')}}</b></label>
		</div>

		<div class="col-md-3" style="text-align: right;">
			<label for="invoice-number">Receipt N<sup>o</sup>: <b>{{ sprintf('%05d',$receipt_id) }}</b></label>
		</div>	
	</div>	


	<form action="{{count($readStudentFee)!=0 ? route('extra_pay') : route('savePayment')}}" method="POST" id="frmPayment">
		{{csrf_field()}}
		{{-- --------------Panel Body--------------  --}}
		<div class="panel-body">

			<table style="margin-top: -12px;">
				<caption class="academicDetail">
					Program : {{$status->program}} /
					Level : {{$status->level}} /
					Shift : {{$status->shift}} /
					Time : {{$status->time}} /
					Batch : {{$status->batch}} /
					Group : {{$status->group}} 
				</caption>

				<thead>
					<tr>
						<th>Program</th>
						<th>Level</th>
						<th>School Fee</th>
						<th>Amount($)</th>
						<th>Dis(%)</th>
						<th>Paid($)</th>
						<th>Amount Lack($)</th>
					</tr>
				</thead>

				<tr>
					<td>
						<select name="academic_id" id="academic_id" class="d">
							<option value="">-----------------</option>
							@foreach ($programs as $key => $p)
							<option value="{{ $p->program_id}}" {{ $p->program_id==$status->program_id ? 'selected' : null}}>{{$p->program}}</option>
							@endforeach
						</select>
					</td> 

					<td>
						<select id="Level_ID" class="d">
							<option value="">-----------------</option>
							@foreach ($levels as $key => $l)
							<option value="{{ $l->level_id}}" {{ $l->level_id==$status->level_id? 'selected' : null}}>{{$l->level}}</option>
							@endforeach
						</select>
					</td>

					<td>
						<div class="input-group">
						<span class="input-group-addon create-fee" title="Create Fee" style="cursor: pointer;color: blue; padding: 0px 3px; border-right: none;">($)</span>
						<input type="text" value="{{ $studentfee->amount or null }}" name="fee" id="Fee" readonly="true">
						</div>

						<input type="hidden" name="fee_id" id="fee_id" value="{{ $studentfee->fee_id or null}}">
						<input type="hidden" name="student_id" id="student_id" value="{{$student_id}}">
						<input type="hidden" name="level_id" id="level_id" value="{{ $status->level_id}}">
						<input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
						<input type="hidden" name="transact_date" id="transact_date" value="{{date('Y-m-d H:i:s')}}" >
						<input type="hidden" name="s_fee_id" id="s_fee_id" value="{{ $studentfee->s_fee_id or null}}">
					</td>

					<td>
						<input type="text" name="amount" id="Amount" class="d">
					</td>

					<td>
						<input type="text" name="discount" id="Discount" class="d">
					</td>

					<td>
						<input type="text" name="paid" id="Paid">
					</td>

					<td>
						<input type="text" name="lack" id="Lack" disabled="true">
					</td>					

				</tr>


				<thead>
					<td colspan="2">Description</td>
					<td colspan="5">Remark</td>
				</thead>

				<tbody>
					<tr>
						<td colspan="2">
							<input type="text" name="description" id="description">
						</td>
						<td colspan="5">
							<input type="text" name="remark" id="remark">
						</td>
					</tr>
				</tbody>

			</table>

		</div>
			<div class="panel-footer" style="height: 60px;">
				<input type="submit" name="btn-go" id="btn-go" class="btn btn-primary btn-payment" value="{{count($readStudentFee)!=0 ?'Extra Pay':'Save'}}">
				<input type="button" onclick="this.form.reset()" class="btn btn-warning btn-reset pull-right" value="Reset">
			</div>
		{{-- --------------------------------------------------------------------}}
	</form>
</div>
	@if (count($readStudentFee)!=0)			
		@include('fees.list.studentfeelist')
		<input type="hidden" value="0" id="disabled">
	@endif
</div>
@endsection

@section('script')
	@include('fees.script.calculatefees')
	@include('fees.script.payment')
@endsection
