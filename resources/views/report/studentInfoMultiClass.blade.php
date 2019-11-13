<table class="table table-bordered table-hover table-striped table-condensed" id="student-info">
  <thead>
    <tr>
      <td>#</td>
      <td>Student ID</td>
      <td>Name</td>
      <td>Sex</td>
      <td>Birth Date</td>
      <td>Program</td>
      <td>Level</td>
      <td>Shift</td>
      <td>Batch</td>
      <td>group</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($classes as $key => $c)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ sprintf("%05d",$c->student_id) }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->sex }}</td>
        <td>{{ $c->dob }}</td>
        <td>{{ $c->program }}</td>
        <td>{{ $c->level }}</td>
        <td>{{ $c->shift }}</td>
        <td>{{ $c->batch }}</td>
        <td>{{ $c->group }}</td>
      </tr>
    @endforeach
  </tbody>  
</table>

<script type="text/javaScript">
  $(document).ready(function() {
      $('#student-info').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
      } );
  } );
</script>