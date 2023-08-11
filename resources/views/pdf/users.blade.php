<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
                            <table class="table " id="customers">
                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Job</th>
                                    <th>Salary</th>
                                    <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($users)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->department->name ?? 'N/A' }}</td>
                                                <td>{{ $user->job }}</td>
                                                <td>{{ $user->salary }}</td>
                                                <td>
                                                    {{-- @foreach ($user->role as $roles) --}}
                                                    {{ $user->role }}
                                                    {{-- {{ $role->name }} --}}
                                                    {{-- @endforeach --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>

                         
                    </body>
</html>
  
