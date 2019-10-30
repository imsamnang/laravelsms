<script type="text/javascript">

	// =========================================================================//
	$(document).on("change keyup","#Amount",function(){
		var fee = $('#Fee').val();
		var amt = $('#Amount').val();
		var paid = $('#Paid').val($('#Amount').val());
		var dis = 0;

		if(paid!='' && amt !='')
		{
			paid = parseFloat($('#Amount').val());
			var dis = (((parseFloat(fee) - parseFloat(paid)) * 100) /fee);
			$('#Lack').val(parseFloat(amt)-parseFloat(paid));
		}

		if(amt=='' && paid=='')
		{
			$('#Paid').val();
			$('#Discount').val();
		}

		if(parseFloat(amt)>parseFloat(fee))
		{
			$('#discount').css({'color':'red'})
		}	else {
			$('#Discount').css({'color':'black'})
		}
		$('#Discount').val(parseFloat(dis));
	});

// ====================================================================================//
	// 
	$(document).on("change keyup","#Discount",function(){
		var fee = parseFloat($('#Fee').val());
		var dis = 0;
		dis =((fee * parseFloat($(this).val()))) /100;
		var amt = fee -dis;
		$('#Paid').val(parseFloat(amt))
		$('#Amount').val(parseFloat(amt))
	});

// ====================================================================================//
	// 
	$(document).on("change keyup","#Paid",function(){
		var b = $('#Amount').val();
		var pay = $('#Paid').val();

		if(pay==''){
			$('#Lack').val();
		};
		
		if(pay!=''){
			var paid = parseFloat($('#Paid').val());
		}

		if (pay !='' && b !='')
		{
			var lack = parseFloat(b) - parseFloat(paid)
			$('#Lack').val(parseFloat(lack))
		}

		if($('#Lack').val()<0)
		{
			$('#Lack').css({'color':'red'})
		} else{
			$('#Lack').css({'color':'blac	k'})
		}
	});

// =======================================================================================//
	// 
	$(document).on("change keyup","#pay",function(){
		var b = $('#b').val();
		var pay = $('#pay').val();

		if(pay=='')
		{
			$('#Lack').val(0);
		}

		if(pay !='')
		{
		var paid = parseFloat($('#pay').val());
		}

		if(pay !='' && b !='')
		{
			var lack = parseFloat(b)- parseFloat(paid);
			$('#Lack').val(parseFloat(lack));
		}

		if($('#Lack').val()<0)
		{
			$('#Lack').css({'color':'red'})
		} else {
			$('#Lack').css({'color':'black'})
		}
	});

</script>