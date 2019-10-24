<div class="modal fade" id="level-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New Level</h4>	
			</div>
			<form action="{{ route('postInsertLevel') }}" method="POST" role="form" id="frm-level-create">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="">Program ID</label>
							<select name="program_id" id="program_id" class="form-control">
								<option value=""></option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Level Name</label>
								<input type="text" class="form-control" id="level" name="level" placeholder="Level">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Description</label>
								<input type="text" class="form-control" id="description" name="description" placeholder="Description">
							</div>
						</div>
					</div>
				</div>	
				<div class="modal-footer">
					<button data-dismiss="modal" type="button" class="btn btn-default">Close</button>
					<button type="submit" class="btn btn-success btn-save-level">Save</button>
				</div>
				</form>
			</div>		
		</div>
	</div> 