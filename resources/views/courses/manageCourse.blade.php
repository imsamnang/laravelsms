@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Courses</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="#">Home</a></li>
			<li><i class="icon_document_alt"></i>Course</li>
			<li><i class="fa fa-file-text-o"></i>Manage Course</li>
		</ol>		
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
		<section class="panel panel-default">
			<header	der class="panel-heading">
				<h3 class="panel-title">Manage Course</h3>
			</header>

			<form class="form-horizontal" action="{{ route('postInsertClass') }}" method="POST" id="frm-create-class">
				{!! csrf_field() !!}
				<input type="hidden" name="active" id="active" value="1">
				<input type="hidden" name="class_id" id="class_id">
				<div class="panel panel-body" style="border-bottom: 1px solid #ccc;">					
					{{-- Academic Year --}}
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
					{{-- Course --}}
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
					{{-- Level --}}
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
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
					{{-- Shift --}}
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
					{{-- Time --}}
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<label for="time">Time</label>
						<div class="input-group">
							<select name="time_id" id="time_id" class="form-control">
								{{-- <option value="">Choose Your Time</option> --}}
								@foreach ($times as $key => $t)
								<option value="{{$t->time_id}}">{{$t->time}}</option>
								@endforeach
							</select>
							<div class="input-group-addon">
								<span class="fa fa-plus" id="add-more-time"></span>
							</div>
						</div>
					</div>
					{{-- Batch --}}
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="batch">Batch</label>
						<div class="input-group">
							<select name="batch_id" id="batch_id" class="form-control">
								{{-- <option value="">Select Batch</option> --}}
								@foreach ($batchs as $key =>$b)
								<option value="{{$b->batch_id}}">{{$b->batch}}</option>
								@endforeach
							</select>
							<div class="input-group-addon">
								<span class="fa fa-plus" id="add-more-batch"></span>
							</div>
						</div>
					</div>
					{{-- Group --}}
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<label for="group">Group</label>
						<div class="input-group">
							<select name="group_id" id="group_id" class="form-control">
								{{-- <option value="">Select Your Group</option> --}}
								@foreach ($groups as $key=>$g)
								<option value="{{$g->group_id}}">{{$g->group}}</option>
								@endforeach
							</select>
							<div class="input-group-addon">
								<span class="fa fa-plus" id="add-more-group"></span>
							</div>
						</div>
					</div>
					{{--StartDate--}}
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<label for="startdate">Start Date</label>
						<div class="input-group">
							<input type="text" name="start_date" id="start_date" class="form-control">	
							<div class="input-group-addon">
								<span class="fa fa-calendar" id="fa_startdate"></span>
							</div>
						</div>
					</div>
					{{--Enddate--}}
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<label for="enddate">End Date</label>
						<div class="input-group">
							<input type="text" name="end_date" id="end_date" class="form-control">	
							<div class="input-group-addon">
								<span class="fa fa-calendar" id="fa_enddate"></span>
							</div>
						</div>
					</div>
					{{-- </div> --}}
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-primary" id="btn-save-class">Create Course</button>
					<button type="submit" class="btn btn-success" id="btn-update-class">Update Course</button>
				</div>
			</form>
			{{------------------------------------------------------------------------}}			
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Class Information</h2></div>
				<div class="panel-body" id="add-class-info">

				</div>
			</div>
			{{------------------------------------------------------------------------}}
		</section>
	</div>
</div>
@include('courses.popup.academic')
@include('courses.popup.program')
@include('courses.popup.group')
@include('courses.popup.level')
@include('courses.popup.shift')
@include('courses.popup.time')
@include('courses.popup.batch')
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		showClassInfo();
	});
		//---------------------------------------//
		$('#start_date').datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat: "yy-mm-dd"
		});

		$('#end_date').datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat: "yy-mm-dd"
		});

	//==============================//
	$(document).on('click','#add-more-academic',function(e){
		$('#academic-year-show').modal();
	});

	// ==========Inset Academic====================//
	$('.btn-save-academic').on('click',function(){
		var academic = $('#new-academic').val();
		$.post("{{ route('postInsertAcademic')}}",{academic:academic}, function(data){
			// console.log(data);
			$('#academic_id').append($("<option/>",{
				value : data.academic_id,
				text  : data.academic
			}))
		})
	});

  //========================Add Program Course====================//
  $(document).on('click','#add-more-program',function(e){
  	$('#program-show').modal('show');
  });

  $('.btn-save-program').on('click',function(e){
  	var program = $('#new-program').val();
  	var description = $('#new-description').val();
  	$.post("{{ route('postInsertProgram') }}",{program:program,description:description}, function(data){
  		$('#program_id').append($("<option/>",{
  			value : data.program_id,
  			text  : data.program
  		}))
  		$('#new-program').val("");
  		$('#new-description').val("");
  	})
  })

  //========================Add Group Course====================//
  $(document).on('click','#add-more-group',function(e){
  	$('#group-show').modal('show');
  });

  $('.btn-save-group').on('click',function(e){
  	var group = $('#new-group').val();
  	$.post("{{ route('postInsertGroup') }}",{group:group}, function(data){
  		console.log(data);	
  	})
  })

  //========================Add program_id====================//
  $('#frm-create-class #program_id').on('change',function(e){
  	var program_id = $(this).val();
  	var level =  $('#level_id');
  	$(level).empty();
  	$.get("{{ route('showlevel')}}",{program_id:program_id}, function(data){  		
  		$.each(data,function(i,l){  
  			$(level).append($("<option/>",{
  				value : l.level_id,
  				text  : l.level
  			}))
  		})
  	})
  	showClassInfo();
  });
	
  $('#add-more-level').on('click',function(){
  	var programs = $('#program_id option');
  	var program = $('#frm-level-create').find('#program_id');
  	$(program).empty();
  	$.each(programs,function(i,pro){
  		$(program).append($("<option/>",{
  			value : $(pro).val(),
  			text  : $(pro).text()
  		}))
  	})
  	$('#level-show').modal('show');
  });

  $('#frm-level-create').on('submit',function(e){
  	e.preventDefault();
  	var data = $(this).serialize();
  	var url = $(this).attr('action');
  	$.post(url,data,function(data){
  		$('#level_id').append($("<option/>",{
  			value : data.level_id,
  			text : data.level,
  		}))
  	})
  	alert('Add new level Successfully');
  })

  //========================Add Shift====================//
  $('#add-more-shift').on('click',function(){
  	$('#shift-show').modal('show');
  });

  $('#frm-shift-create').on('submit',function(e){
  	e.preventDefault();
  	var data = $(this).serialize();
  	var shift = $('#shift_id');
  	$.post("{{route('postInsertShift')}}",data, function(data){
  		$(shift).append($("<option/>",{
  			value : data.shift_id,
  			text  : data.shift,
  		}))
  	})
  	alert('Add new Shift Successfully');
  	$(this).trigger('reset');
  });
	//=========================add Time=======================//
	$('#add-more-time').on('click',function(){
		$('#time-show').modal('show');
	});

	$('#frm-time-create').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var time = $('#time_id');
		$.post("{{route('postInsertTime')}}",data,function(data){
			console.log(data);
			$(time).append($("<option/>",{
				value : data.time_id,
				text  : data.time,
			}))
		})
		alert('Add new Time Successfully');
		$(this).trigger('reset');
	})

	//=========================add Time=======================//
	$('#add-more-batch').on('click', function(){
		$('#batch-show').modal('show');
	});

	$('#frm-batch-create').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var batch = $('#batch_id');

		$.post("{{route('postInsertBatch')}}",data,function(data){
			console.log(data);
			$(batch).append($("<option/>",{
				value : data.batch_id,
				text  : data.batch,
			}))
		})
		alert('Add new Batch Successfully');
		$(this).trigger('reset');
	});

	//===================add Class =======================//
	$('#frm-create-class').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		$.post(url,data,function(data){
			showClassInfo();
		})

		$(this).trigger('reset');
	})

	// =================delete Class function============================//
	$(document).on('click','.dell-class', function(e){
		class_id = $(this).val();
		$.post("{{route('deleteClass')}}",{class_id:class_id},function(data){
			showClassInfo();
		})
	});

	// ===================================================//
	$(document).on('click','#class-edit',function(e){
		var class_id = $(this).data('id');
		$.get("{{route('editClass')}}",{class_id:class_id},function(data){
			$('#academic_id').val(data.academic_id);
			$('#level_id').val(data.level_id);
			$('#shift_id').val(data.shift_id);
			$('#time_id').val(data.time_id);
			$('#group_id').val(data.group_id);
			$('#batch_id').val(data.batch_id);
			$('#start_date').val(data.start_date);
			$('#end_date').val(data.end_date);
			$('#class_id').val(data.class_id);
		})
	})	
	// ======================================================//
	$('#btn-update-class').on('click',function(e){
		e.preventDefault();
		var data = $('#frm-create-class').serialize();
		$.post("{{route('updateClassInfo')}}",data,function(data){
			showClassInfo();
		})
	});

	// ==============program_id================//
	$('#program_id').on('change',function(e){
		showClassInfo();
	})

	// ==============academic_id================//
	$('#academic_id').on('change',function(e){
		showClassInfo();
	})

	// ==============level_id==================//
	$('#level_id').on('change',function(e){
		showClassInfo();
	})

	//==============shift_id================//
	$('#shift_id').on('change',function(e){
		showClassInfo();
	})

	//============time_id==============//
	$('#time_id').on('change',function(e){
		showClassInfo();
	})

	//=============batch_id===============//
	$('#batch_id').on('change',function(e){
		showClassInfo();
	})

	//===========group_id================//
	$('#group_id').on('change',function(e){
		showClassInfo();
	})

	//=================================================//
	function showClassInfo()
	{
		// var academic_id=$('#academic_id').val();
		var data = $('#frm-create-class').serialize();
		$.get("{{ route('showClassInformation') }}",data,function(data){
			$('#add-class-info').empty().append(data);
			MergeCommonRows($('#table-class-info'));	
		});
	}
	// ===============================Class Merge Cell Table=============================//
	function MergeCommonRows(table) {
		var firstColumnBreaks =[];
		$.each(table.find('th'),function(i){			
			var previous = null, cellToExtend = null, rowspan = 1;
			table.find("td:nth-child(" + i + ")").each(function(index,e){
				var jthis = $(this), content = jthis.text();
				if(previous == content && content !== "" && $.inArray(index, firstColumnBreaks) === -1){
					jthis.addClass('hidden');
					cellToExtend.attr("rowspan",(rowspan = rowspan+1));
				} else {
					if(i === 1) firstColumnBreaks.push(index);
					rowspan =1;
					previous = content;
					cellToExtend = jthis;
				}
			});
		});
		$('td.hidden').remove();
	};	

</script>
@endsection