@extends('layouts.master')

@section('pagetitle','Fee Report')

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i>Fee Report</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="#">Home</a></li>
			<li><i class="icon_document_alt"></i>Fee</li>
			<li><i class="fa fa-file-text-o"></i><a href="{{route('getFeeReport')}}">Fee Report</a></li>
		</ol>		
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <table>
          <tr>
            <td>
              <b><i class="fa fa-apple"></i>Fee Information</b>
            </td>
            <td>
              <input type="text" name="from" id="from" value="{{date('Y-m-d')}}" class="form-control feedate" placeholder="yyyy-mm-dd" required>
            </td>
            <td>Between</td>
            <td>
              <input type="text" name="to" id="to" value="{{date('Y-m-d')}}" class="form-control feedate" placeholder="yyyy-mm-dd" required>
            </td>
          </tr>
        </table>
      </div>
      <div class="panel-body" style="padding-bottom: 4px;">
        <p style="text-align: center;font-size: 20px; font-weight: bold;">Fee Report</p>
        <div class="show-student-paid">
          
        </div>
      </div>
    </div>
	</div>
</div>

@endsection

@section('script')
  <script type="text/javaScript">
    $('#from').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd',
      onSelect:function (from) {
       showfee(from,$('#to').val());
      }      
    });
    $('#to').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd',
      onSelect:function (to) {
       showfee($('#from').val(),to);
      }
    });
    function showfee(from,to) {
      $.get("{{route('showFeeReport')}}",{from:from,to:to},function(data){
        // console.log(data);
        $('.show-student-paid').empty().html(data); 
      });
    }
  </script>
@endsection
