@extends('layouts.master')

@section('style')
	<style>
		
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">Test Jquery</div>
			<div class="panel-body">
				{!! Form::open(['url'=>'postJquery','method'=>'post','id'=>'frm-insert']) !!}

					<div class="row">
						<div class="col-md-4">
							{!! Form::label('name', 'name') !!}
							{!! Form::text('name', null, ['id'=>'name','class'=>'form-control']) !!}
						</div>

						<div class="col-md-4">
							{!! Form::label('email','E-mail') !!}
							{!! Form::email('email', null, ['id'=>'email','class'=>'form-control']) !!}
						</div>	

						<div class="col-md-4">
							{!! Form::label('password','Password') !!}
							{!! Form::text('password',null, ['id'=>'password','class'=>'form-control']) !!}
						</div>	
					</div>
						<br>
					<div class="row">
						<div class="col-md-4">
							{!! Form::select('role_id', $roles, null, ['id'=>'role_id','class'=>'form-control']) !!}
						</div>	
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
						</div>	
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('#frm-insert').on('submit',function (e) {
			e.preventDefault();
			// var name="Im Samnang";
			// var email='applephagna@gmail.com';
			// var password = '123';
			// var role_id = 4;
			var data = $(this).serialize();

			var url = $(this).attr('action');
			var post = $(this).attr('method');

			$.ajax({
				type : post,
				url  : url,
				// data : {'name':name,'email':email,'password':password,'role_id':role_id}, //Json Data
				data : data,
				success:function(data){
					console.log(data);
				}	
			})
		})
	</script>
@endsection