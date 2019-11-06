<div class="accordian-body collapse" id="detail{{$key}}">
	<table>
		<thead>			
			<tr>
				<th style="text-align: center;">N<sup>o</sup></th>	
				<th>Transaction Date</th>
				<th>Cashier</th>
				<th>Paid</th>
				<th>Remark</th>
				<th>Description</th>
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($readStudentTransact as $key => $st)
				<tr>
					<td style="text-align: center;">{{++$key}}</td>
					<td>{{ $st->transact_date}}</td>
					<td>{{ $st->name}}</td>
					<td>$ {{number_format($st->paid)}}</td>
					<td>{{$st->remark}}</td>
					<td>{{$st->description}}</td>
					<td style="text-align: center; width:112px;">
						<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit" title="Edit"></i></a>
						<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i></a>
						<a href="#" class="btn btn-success btn-xs"><i class="fa fa-print" title="Print"></i></a>
					</td>
				</tr>
			@endforeach	
		</tbody>
	</table>
</div>
