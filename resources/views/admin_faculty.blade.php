<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts/admin_navbar')
    <script src="js/admin.js"></script>
    <link rel="stylesheet" href="css/admin.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <h5 id="std-text"><b>Faculty List</b>   <a href="/admin_faculty/create"><i class="fa fa-plus-circle" title="Add"></i></a></h5>
    <p id="std-count">Total Faculty: {{$total_faculty[0] ->total}}</p>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="masterCheckbox" onchange="toggleCheckboxes()"></th>
                        <th>Faculty ID</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faculty as $f)
                    <tr>
                        <td><input type="checkbox" name="faculty_ids[]" value="{{ $f->faculty_id }}"></td>
                        <td>{{ $f->faculty_id }}</td>
                        <td>{{ $f->last_name }}, {{ $f->first_name }}</td>
                        <td>{{ $f->email_address }}</td>
                        <td class="action-icons">
                            <a href="/admin_faculty/{{$f -> faculty_id}}"><i class="fas fa-eye" title="View"></i></a>
                            <a href="/admin_faculty/edit/{{$f -> faculty_id}}"><i class="fas fa-edit" title="Edit"></i></a>
                            <a href="/delete"><i class="fas fa-trash-alt" title="Delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
