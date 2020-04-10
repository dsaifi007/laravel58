<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>2nd highest Employees salary list</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Email Name</th>
        <th>Emp Salary</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->salary }}</td>
      </tr>
      @empty
          <p>No users</p>
      @endforelse
    </tbody>
  </table>
  <b>Max salary</b> - {{ $max[0]->salary }}<br>
  For Sum of highest salary record Query is below(need to more clarify)<Br> 
"SELECT id,SUM(Salary) from table_name GROUP BY user_id ORDER BY salary DESC LMIT 0,1"
</div>

</body>
</html>
