    @extends('index')
@section('title', 'Add Student')
@section('content')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="container">
    <h1>Users List</h1>
    <div class="form-group">
      <select name="filter_student" id="filter_student" class="form-control">
       <option value="2" <?php echo $id == 2?'selected':''; ?>>Select option</option>
       <option value="1" <?php echo $id == 1?'selected':''; ?>>Enquiry Student</option>
       <option value="0" <?php echo $id == 0?'selected':''; ?>>Paid Student</option>
      </select>
     </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript">
  //$(function () {
   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $("document").ready(function(){
        $("#filter_student").change(function(){
            var current = $(this).val();
            if(current == 2){
                window.location.href = "http://127.0.0.1:8000/users/list";
            }
            
            if(current == 0){
                window.location.href = "http://127.0.0.1:8000/users/list/0";
            }else if(current == 1){
                window.location.href = "http://127.0.0.1:8000/users/list/1";
            }
            
        });
    });
  //});
</script>
  @endsection