@extends('layouts.master')
@section('content')
@include('fees.stylesheet.css-style')

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-3">
			<form action="{{route('showStudentPayment')}}" class="search-payent" method="GET">
				<input class="form-control eng-name" name="student_id" id="student_id" type="text" placeholder="Student ID">
			</form>
		</div>
		{{-- ------------------------------------------------------------------ --}}

		<div class="col-md-3">
			<label for="eng-name" id="eng-name" class="eng-name">Name: <b class="student-name"></b></label>
		</div>
		<div class="col-md-3">
		</div>

		<div class="col-md-3" style="text-align: right;">
			<label for="date-invoice">Date: <b>{{ date('d-M-Y')}}</b></label>
		</div>

		<div class="col-md-3" style="text-align: right;">
			<label for="invoice-number">Receipt N<sup>o</sup>: <b></b></label>
		</div>	
	</div>	


	{{-- --------------Panel Body--------------  --}}
	<div class="panel-body">		
		<table style="margin-top: -12px;">

			<caption class="academicDetail">
				
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
					<select name="academic_id" id="academic_id">
						<option value="">-----------------</option>
					</select>
				</td>

				<td>
					<select>
						<option value="">-----------------</option>
					</select>
				</td>

				<td>
					<input type="text" name="fee" id="fee" readonly="true">
					<input type="hidden" name="fee_id" id="fee_id" readonly="true">
					<input type="hidden" name="student_id" id="student_id" readonly="true">
					<input type="hidden" name="level_id" id="level_id" readonly="true">
					<input type="hidden" name="user_id" id="user_id" readonly="true">
					<input type="hidden" name="transacdate" id="transacdate" readonly="true">
				</td>

				<td>
					<input type="text" name="amount" id="amount" readonly="true">
				</td>

				<td>
					<input type="text" name="discount" id="discount" readonly="true">
				</td>

				<td>
					<input type="text" name="paid" id="paid" readonly="true">
				</td>

				<td>
					<input type="text" name="balance" id="balance" readonly="true">
				</td>					

			</tr>

			<thead>
				<td colspan="2">Remark</td>
				<td colspan="5">Description</td>
			</thead>

			<tbody>	

				<tr>
					<td colspan="2">
						<input type="text" name="remark" id="remark">					
					</td>
					<td colspan="5">
						<input type="text" name="description" id="description">
					</td>
				</tr>

			</tbody>

		</table>

	</div>
		<div class="panel-footer" style="height: 40px;"></div>
	</div>
</div>

@endsection