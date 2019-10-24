<style type="text/css">
	.table-free{
		border: none;
	}
	.table-fee tr, td ,th{
		border:none;
	}
</style>

<div class="modal fade" id="createFeeOpup" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><b><i class="glyphicon glyphicon-apple"></i>Create School Fee</b></div>

				{{-- -----------Start Form----------- --}}
				<form action="{{route('createFee')}}" method="POST" id="frmFee"> 	
					{{csrf_field()}}
					<div class="panel-body">
						<div class="table-responsive">
							{{-- -----------Start Table------------ --}}
							<table class="table-fee">

								<tr>
									<td><label for="feetype">Fee Type</label></td>
									<td>
										<select name="fee_type_id" id="fee_type_id" readonly="true">
											@foreach ($feetypes as $key => $ft)
											<option value="{{$ft->fee_type_id}}">{{$ft->fee_type}}</option>
											@endforeach
										</select>
									</td>
								</tr>

								<tr>
									<td><label for="feeheading">Fee Heading</label></td>
									<td>
										<input type="text" value="School Fees" disabled="true">
										<input type="hidden" name="fee_heading" id="fee_heading" value="School Fees" readonly="true">
									</td>								
								</tr>

								<tr>
									<td><label for="academicyear">Academic Year</label></td>
									<td>
										<input type="text" value="{{$status->academic}}" disabled="true">
										<input type="hidden" name="academic_id" id="academic_id" value="{{$status->academic_id}}">
									</td>
								</tr>

								<tr>
									<td><label for="program">Program</label></td>
									<td>
										<input type="text" value="{{$status->program}}" disabled="true">
										<input type="hidden" name="program_id" id="program_id" value="{{ $status->program_id}}" readonly="true">
									</td>								
								</tr>

								<tr>
									<td><label for="level">Level</label></td>
									<td>
										<input type="text" value="{{$status->level}}" disabled="true">
										<input type="hidden" name="level_id" value="{{ $status->level_id}}" readonly="true">
									</td>								
								</tr>

								<tr>
									<td><label for="schoolfee">School Fee($)</label></td>
									<td>
										<input type="text" name="amount" id="amount" autocomplete="off" class="form-control" placeholder="Amount" required>
									</td>								
								</tr>

							</table>
							{{-- ------------------End Table---------------- --}}

						</div>
					</div>

					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Create Fee">
						<button type="button" class="btn btn-success pull-right" data-dismiss="modal">Close</button>
					</div>
				</form>
				{{-- ----------------End Form---------------- --}}
			</div>
		</div>
	</div>
</div>