@extends('layouts.master')
@section('style')
	<style>
		thead tr th{
			background-color: #2980b9;
			color: white;
		}
		.sid{
			background-color: #2980b9;
			color: white;
			text-align: center;
		}
		th{
			text-align: center;
		}

	</style>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i>Student Registration</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="#">Home</a></li>
			<li><i class="icon_document_alt"></i>Student</li>
			<li><i class="fa fa-file-text-o"></i>View All Student</li>
		</ol>		
	</div>
</div>

<div class="row">
	<div class="col-md-12">
{{-- 		<div class="panel panel-default">
			<div class="panel-heading"> --}}
				<form action="{{route('get_student_info_by_search')}}" method="get" role="form" id="frmsearch" class="form-horizontal">				
					<input type="text" class="form-control" id="search" name="search" placeholder="searrch by firstname or lastname">
				</form>
{{-- 			</div>
		</div>	 --}}	
	</div>
</div><br />
<div class="result">

</div>

@endsection

@section('script')
	<script type="text/javascript">
		$('#frmsearch').on('submit',function(e){
			e.preventDefault();
			var url = $(this).attr('action');
			var data = $(this).serializeArray();
			var get = $(this).attr('method');
			$.ajax({
				type:get,
				url:url,
				data:data,
			}).done(function(data){
				// console.log(data);
				$('.result').html(data);
			})
		});

		$(document).on('click','.pagination a',function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			getStudent(page,$('#search').val());
		});

		function getStudent(page,search)
		{
			var url="{{url('student/getstudentinfosearch')}}";
			var data = $('#search') 
			$.ajax({
				type:'get',
				url: url+'?page='+page,
				data:{'search':search}
			}).done(function(data){
				$('.result').html(data);
			})
		}
	</script>
@endsection