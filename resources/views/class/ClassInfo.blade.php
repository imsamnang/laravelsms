<style type="text/css">
	.acdemic-detail{
		white-space: normal;
		width: 300px;
	}
	#table-class-info{
		width: 100%;
	}
	table tbody > tr >td{
		vertical-align: middle;
	}
</style>
<div class="table-responsive">
	<table class="table-hover table-striped table-condensed table-bordered" id="table-class-info">
		<thead>
			<tr>
				<th>Program</th>
				<th>Level</th>
				<th>Shift</th>
				<th>Time</th>
				<th>Academic</th>
				<th id="hidden">Action</th>
				<th>
					<input type="checkbox" id="checkall">
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($classes as $key =>$c)
			<tr>
				<td>{{ $c->program }}</td>
				<td>{{ $c->level }}</td>
				<td>{{ $c->shift }}</td>
				<td>{{ $c->time }}</td>
				<td class="acdemic-detail">
					<a href="#" data-id="{{ $c->class_id }}" id="class-edit">
						Program : {{$c->program}} / Level : {{ $c->level}} / Shift : {{$c->shift}}/
						Time :{{$c->time}} / Batch : {{$c->batch}} / Group : {{$c->group}} / Start Date : {{date("d-M-y",strtotime ($c->start_date))}} / End Date : {{date("d-M-y",strtotime( $c->start_date))}}
					</a>
				</td>
				<td style="vertical-align: middle;width: 50px" id="hidden">
					<button value="{{$c->class_id}}" type="button" class="btn btn-danger dell-class">Del</button>
				</td>
				<td>
					<input type="checkbox" name="chk[]" class="chk" value="{{ $c->class_id }}">
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>