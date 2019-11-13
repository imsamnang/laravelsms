<table class="table table-bordered table-hover table-striped table-condensed" id="student-info">
  <caption>{{ $classes[0]->program }}</caption>
  <thead>
    <tr>
      <td>#</td>
      <td>Student ID</td>
      <td>Name</td>
      <td>Sex</td>
      <td>Birth Date</td>
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