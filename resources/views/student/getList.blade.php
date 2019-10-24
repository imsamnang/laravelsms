@if(count($students)>0)
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="table-responsive">
					<table class="table table-condensed table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>name</th>
								<th>sex</th>
								<th>dob</th>
								<th>status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($students as $stu)
							<tr>
								<td id="studentid{{$stu->student_id}}" class="sid">{{$stu->student_id}}</td>
								<td>{{$stu->first_name." ".$stu->last_name}}</td>
								<td>
									@if($stu->sex==0)
										Male
									@else
										Female
									@endif
								</td>
								<td>{{date('d-m-Y',strtotime($stu->dob))}}</td>
								<td>
									@if($stu->status==0)
										Disactive
									@else
										Active
									@endif
								</td>
								<td>
									<a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i><b> View</b>
									</a>
									|
									<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i><b> Remove</b>
									</a>
								</td>							
							</tr>
							@endforeach						
						</tbody>
						<tfoot>
							<tr>
								<td colspan="9" style="text-align: center;">{{$students->render()}}</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<p style="text-align: center;"><b>{{$search}}</b> was not found</p>					
				</div>
			</div>
		</div>
	</div>
@endif