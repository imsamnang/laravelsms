@extends('layouts.master')
@section('content')
<style type="text/css" media="screen">
	.student-photo{
		height: 160px;
		padding-left: 1px;
		padding-right: 1px;
		border: 1px solid #ccc;
		background: #eee;
		width: 160px;
		margin: 0 auto;
	}

	.photo > input[type='file']{
		display: none;
	}

	.photo {
		width: 30px;
		height: 30px;
		border-radius: 100%;
	}

	.student-id{
		background-repeat: repeat-x;
		border-color: #ccc;
		padding: 5px;
		text-align: center;
		background: #eee;
		border-bottom: 1px solid #ccc;
	}

	.btn-browse{
		border-color: #ccc;
		padding: 5px;
		text-align: center;
		background: #eee;
		border-bottom: 1px solid #ccc;
	}

	fieldset{
		margin-top: 5px;
	}

	fieldset legend {
		display: block;
		width: 100%;
		padding:0;
		font-size: 15px;
		line-height: inherit;
		color: #797979;
		border:0;
		border-bottom: 1px solid #e5e5e5;
	}

@media screen and (min-width: 768px) {
  .mymodal {
    left: 50%;
    right: auto;
    width: 700px;
    padding-top: 30px;
    padding-bottom: 30px;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
  }
}

</style>

{{-- ------------------------------------------- --}}
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i>Student Registration</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="#">Home</a></li>
			<li><i class="icon_document_alt"></i>Student</li>
			<li><i class="fa fa-file-text-o"></i>Create Student</li>
		</ol>		
	</div>
</div>

<!-- ----------------------------------------------------------- -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel-group" id="accordion">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">Choose Academic</a>
					<a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i></a>
				</div>
				<div id="collapse1" class="panel-collapse collapse in">
					<div class="panel-body academic-detail"><p></p></div>					
				</div>
			</div>
		</div>
	</div>
</div>

{{-- ----------------------------------------------------------------- --}}

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form action="{{route('postStudentRegister')}}" method="POST" id="frm-create-student" enctype="multipart/form-data">
			{!! csrf_field()!!}
			<input type="hidden" name="class_id" id="class_id" class="form-control">
			<input type="hidden" name="user_id" id="user_id" value="{{ Auth::id()}}" class="form-control">
			<input type="hidden" name="dateregistered" id="dateregistered" class="form-control">

			<div class="panel panel-info">
				<div class="panel-heading">
					<b><i class="fa fa-apple"></i>Student Information</b>
				</div>
				<div class="panel-body" style="padding-bottom: 4px;">
				
			{{-- ------------------Start Student Infor------------------------------ --}}
					<div class="row">
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<!-- ------------First Name-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="fistname">First Name</label>
									<input type="text" name="first_name" id="first_name" class="form-control" required="required" placeholder="First Name" title="First Name">
								</div>
							</div>
							<!-- ------------Last Name-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="lastname">Last Name</label>
									<input type="text" name="last_name" id="last_name" class="form-control" required="required" placeholder="Last Name" title="Last Name">
								</div>
							</div>
							<!-- ------------Gender Name-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<fieldset>
										<legend>Sex</legend>
										<table style="width: 100%;margin-top: -14px;">
											<tr style="border-bottom: 1px solid #ccc;">
												<td>
													<label>
														<input type="radio" name="sex" id="sex" value="0" required>Male
													</label>
												</td>
												<td>
													<label>
														<input type="radio" name="sex" id="sex" value="1" required>Female
													</label>
												</td>								
											</tr>
										</table>
									</fieldset>
								</div>
							</div>	
							<!-- ------------Date of birth-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="dob">Birth Date</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar studentdob"></i>
										</div>
										<input type="text" name="dob" id="dob" class="form-control" placeholder="yyyy/mm/dd" required>
									</div>
								</div>
							</div>
							<!-- ------------National Card-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="national_card">National Card</label>
									<input type="text" name="national_card" id="national_card" class="form-control" placeholder="National Card">
								</div>
							</div>	
							<!-- ------------Status-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<fieldset>
										<legend>Status</legend>
										<table style="width: 100%;margin-top: -14px;">
											<tr style="border-bottom: 1px solid #ccc;">
												<td>
													<label>
														<input type="radio" name="status" id="status" value="0" required>Single
													</label>
												</td>
												<td>
													<label>
														<input type="radio" name="status" id="status" value="1" required>Married
													</label>
												</td>								
											</tr>
										</table>
									</fieldset>
								</div>
							</div>

							<!-- ------------Nationality-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="nationality">Nationality</label>
									<input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality">
								</div>
							</div>
							<!-- ------------Rac-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="rac">Rac</label>
									<input type="text" name="rac" id="rac" class="form-control" placeholder="Rac">
								</div>
							</div>
							<!-- ------------Passport-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="passport">Passport</label>
									<input type="text" name="passport" id="passport" class="form-control" placeholder="Passport">
								</div>
							</div>
							<!-- ------------Phone-------------- -->
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
								</div>
							</div>
							<!-- ------------Email-------------- -->
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Email">
								</div>
							</div>


						</div>

						<!-- ------------Photo-------------- -->
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group form-group-login">
								<table style="margin: 0 auto;">
									<thead>
										<tr class="info">
											<th class="student-id">{{sprintf('%05d',$student_id)}}</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="photo">
												{!!Html::image('photo/simple.png',null,['class'=>'student-photo','id'=>'showPhoto'])!!}
												<input type="file" name="photo" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
											</td>
										</tr>
										<tr>
											<td style="text-align: center;background: #ddd;">
												<input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse">								
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- ------------End Photo-------------- -->		
					</div>{{-- </div> -----------End Row------------------ --}}
					{{-- <br> --}}
				</div>
			</div>

			{{-- ------------------Start Addresss------------------------------ --}}
			<div class="panel panel-info">
				<div class="panel-heading" style="margin-top: -20px;">
					<b><i class="fa fa-apple"></i>Address</b>
				</div>

				<div class="panel-body" style="padding-bottom: 10px;margin-top: 0;">	
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label for="village">Village</label>
							<input type="text" name="village" id="village" class="form-control" placeholder="Village">
						</div>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label for="commune">Commune</label>
							<input type="text" name="commune" id="commune" class="form-control" placeholder="Commune">
						</div>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label for="district">District</label>
							<input type="text" name="district" id="district" class="form-control" placeholder="District">
						</div>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="form-group">
							<label for="province">Province</label>
							<input type="text" name="province" id="province" class="form-control" placeholder="Province">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="current_address">Current Address</label>
							<input type="text" name="current_address" id="current_address" class="form-control" placeholder="Current Address">
						</div>
					</div>
				</div>

			{{-- ------------------End Addresss------------------------------ --}}

				{{-- --------------------Start Footer------------------ --}}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
						<div class="panel panel-info">
							<div class="panel-body">
								<button value="submit" class="btn btn-primary btn-save">Save <i class="fa fa-save"></i></button>

							</div>
						</div>
					</div>
				</div>
				{{-- --------------------End Footer------------------ --}}
			</div>
		</form>
	</div>
</div>

@include('class.classPopup')
@endsection

@section('script')
<script>
//---------------------------------------//
	$('#dob').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat: "yy-mm-dd"
	});

$(document).on('click','#class-edit',function(e){
	e.preventDefault();
	$('#class_id').val($(this).data('id'));
	$('.academic-detail p').text($(this).text());
	$('#choose-academic').modal('hide');
})

 //========================Add level====================//
  $('#frm-view-class #program_id').on('change',function(e){
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
  		showClassInfo();
  	})
  });
  //
// ==========================================//
	$('#academic_id').on('change',function(e){
		showClassInfo();
	})

	// ==========================================//
	$('#program_id').on('change',function(e){
		showClassInfo();
	})

// ==========================================//
	$('#level_id').on('change',function(e){
		showClassInfo();
	})

//==========================================//
	$('#shift_id').on('change',function(e){
		showClassInfo();
	})

//==========================================//
	$('#time_id').on('change',function(e){
		showClassInfo();
	})

//==========================================//
	$('#batch_id').on('change',function(e){
		showClassInfo();
	})

	//==========================================//
	$('#group_id').on('change',function(e){
		showClassInfo();
	})

//=================================================//
function showClassInfo()
{
	// var academic_id=$('#academic_id').val();
	var data = $('#frm-view-class').serialize();
	$.get("{{ route('showClassInformation') }}",data,function(data){
		$('#add-class-info').empty().append(data);
		$('td#hidden').addClass('hidden');
		$('th#hidden').addClass('hidden');
		MergeCommonRows($('#table-class-info'));	
	})
}

// =================================================
	
	$('#show-class-info').on('click',function(e){
		e.preventDefault();
		showClassInfo();
		$('#choose-academic').modal('show');
	});

	// -------------Browse photo------------------
	$('#browse_file').on('click',function(e){
		$('#photo').click();
	})
	$('#photo').on('change',function(e){
		showFile(this,'#showPhoto');
	})

	// ======================================
	function showFile(fileInput,img,showName){
		if (fileInput.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$(img).attr('src',e.target.result);
			}
			reader.readAsDataURL(fileInput.files[0]);
		}
		$(showName).text(fileInput.files[0].name)
	};

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