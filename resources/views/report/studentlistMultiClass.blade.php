@extends('layouts.master')

@section('pagetitle','Student Report')

@section('content')
  <style>
    caption {
      height: 50px;
      font-size: 20px;
      font-weight: bold;
    }
  </style>
  <div class="row">
    <div class="col-md-12">
      <h3 class="page-header"><i class="fa fa-file-text-o"></i>Multi Student List</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
        <li><i class="icon_document_alt"></i>Report</li>
        <li><i class="fa fa-file-text-o"></i><a href="{{ route('getStudentList') }}">Student List</a></li>
      </ol>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <b><i class="fa fa-apple"></i>Student Information</b>
      <a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i></a>
    </div>
    <div class="panel-body" style="padding-bottom: 4px;">
      <div class="show-student-info">

      </div>
    </div>
  </div>
  @include('class.classPopup')
@endsection

@section('script')
  @include('script.scriptClassPopup')
  <script>
    $(document).on('click','#btn-go',function(e){
      e.preventDefault();
      data = $('#frm-multi-class').serialize();
      $.get("{{ route('showStudentListMultClass') }}", data,
        function (data) {
          $('.show-student-info').empty().append(data);
        }
      );
    })

    // check all
    $(document).on('click','#checkall',function(e){
      $(':checkbox.chk').prop('checked',this.checked);
    })
  </script>
@endsection