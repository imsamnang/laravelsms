<script type="text/javascript">

	var n = $('#disabled').val();

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
			$(element).attr('disabled',false).css({'background':'#fff',
																							'border':'1px solid #ccc',
																							'color':'#9e9e9e'});
		})
	}
	
	$('.btn-paid').on('click',function(e){
		e.preventDefault();
		s_fee_id = $(this).data('id-paid');
		balance = $(this).val();
		$.get("{{route('pay')}}", {s_fee_id:s_fee_id},
			function (data) {
				$('#Paid').attr('id','Pay');
				$('#s_fee_id').val(data.s_fee_id);
				$('#program_id').val(data.program_id);
				$('#Level_ID').val(data.level_id);
				$('#level_id').val(data.level_id);
				$('#Fee').val(data.school_fee);
				$('#fee_id').val(data.fee_id);
				$('#Amount').val(data.student_amount);
				$('#Discount').val(data.discount);
				$('#Pay').val(balance);
				$('#Pay').focus();
				$('#Pay').select();
				$('#b').val(balance);
			},
		);
	});

//reset
$('.btn-reset').on('click',function(e){
	e.preventDefault();
	var caption = $(this).val();
	if(caption == "Reset")
	{
		$(this).val('Cancel');
		$('#btn-go').val('Save');
		$('#Pay').attr('id','Paid');
		$('#frmPayment').attr('action',"{{route('savePayment')}}");
		enableFormElement('#frmPayment');
		return;	
	}
	location.reload();
});
// disable input	
	function disabled_input() {
		$.each($('body').find('.d'), function (index, item) { 
			 $(item).attr('disabled',true).css({'background':'#f5f5f5','border':'1px solid #ccc'});
			 $(item).attr('readonly',false);
		});
	}

	$(document).ready(function(){
		if(n==0){
			disabled_input();
		} else {
			return false;
		}
	});
</script>