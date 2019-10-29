<script type="text/javascript">

	$('.create-fee').on('click',function(e){
		$('#createFeeOpup').modal('show')
	});
// --------------Create Fee------------------
	$('#frmFee').on('submit',function(e){
		e.preventDefault();
		// enableFormElement($(this));
		var data = $('#frmFee').serialize();
		var lv = $('#level_id').val();
		var pr = $('#program_id').val();
		var url = $(this).attr('action');
		$.post(url,data,function(data){
			location.reload();
		})
	})
// ----------Function to Enable Element------------	
	function enableFormElement(frmName)
	{
		$.each($(frmName).find('input','select'), function(i,element){
			$(element).attr('disabled',false);
		})
	}

	$('#btn-paid').on('click',function(e){
		e.preventDefault();
		s_fee_id = $(this).data('id-paid');
		balance = $(this).val();
		alert(s_fee_id +  balance);
	});
</script>