  <div class="modal fade" id="choose-academic" role="dialog">
    <div class="modal-dialog mymodal">
			<section class="panel panel-default">
				<header	der class="panel-heading">
					<h3 class="panel-title">Choose Academic</h3>
				</header>

				<form class="form-horizontal" action="#" method="POST" id="frm-view-class">
				{!! csrf_field() !!}

					<div class="panel panel-body" style="border-bottom: 1px solid #ccc;">					
						<div class="form-group">

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="academic-year">Academic Year</label>
								<div class="input-group">
									<select name="academic_id" id="academic_id" class="form-control">
										@foreach ($academics as $key=>$y)
											<option value="{{$y->academic_id}}">{{$y->academic}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-academic"></span>
									</div>
								</div>
							</div>				
{{--------------------------------------------------------------------------------}}							
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="program">Course</label>
								<div class="input-group">
									<select name="program_id" id="program_id" class="form-control">
										<option value="">Choose Your Course</option>
										@foreach ($programs as $key=>$p)
											<option value="{{$p->program_id}}">{{$p->program}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-program"></span>
									</div>
								</div>
							</div>
{{--------------------------------------------------------------------------------}}	
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="level">Level</label>
								<div class="input-group">
									<select name="level_id" id="level_id" class="form-control">
										<option value="">Choose Your Level</option>
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-level"></span>
									</div>
								</div>
							</div>
{{--------------------------------------------------------------------------------}}	
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="shift">Shift</label>
								<div class="input-group">
									<select name="shift_id" id="shift_id" class="form-control">
										{{-- <option value="">Choose Your Shift</option> --}}
										@foreach ($shifts as $Key =>$sh)
											<option value="{{$sh->shift_id}}">{{$sh->shift}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-shift"></span>
									</div>
								</div>
							</div>
{{--------------------------------------------------------------------------------}}	
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<label for="time">Time</label>
								<div class="input-group">
									<select name="time_id" id="time_id" class="form-control">
										{{-- <option value="">Choose Your Time</option> --}}
										@foreach ($times as $Key => $t)
											<option value="{{$t->time_id}}">{{$t->time}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-time"></span>
									</div>
								</div>
							</div>
{{--------------------------------------------------------------------------------}}	
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<label for="batch">batch</label>
								<div class="input-group">
									<select name="batch_id" id="batch_id" class="form-control">
										{{-- <option value="">Select Batch</option> --}}
										@foreach ($batchs as $Key=>$b)
											<option value="{{$b->batch_id}}">{{$b->batch}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-batch"></span>
									</div>
								</div>
							</div>
{{--------------------------------------------------------------------------------}}
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<label for="group">Group</label>
								<div class="input-group">
									<select name="group_id" id="group_id" class="form-control">
										{{-- <option value="">Select Your Group</option> --}}
										@foreach ($groups as $key => $g)
											<option value="{{$g->group_id}}">{{$g->group}}</option>
										@endforeach
									</select>
									<div class="input-group-addon">
										<span class="fa fa-plus" id="add-more-group"></span>
									</div>
								</div>
							</div>

						</div>
 					</div>

				</form>
{{-- --------------------------------------------------------------------	 --}}		
 					<div class="panel panel-default">
						<div class="panel-heading"><h2>Class Information</h2></div>
						<div class="panel-body" id="add-class-info">

						</div>
					</div > 
{{-- -------------------------------------------------------------------- --}}
			</section> 

	</div>
</div>
