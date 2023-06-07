@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê users
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên user</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Author</th>
                            <th>Admin</th>
                            <th>User</th>
                            <th style="width:30px;"></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($admin as $key => $user)
                        <tr>
                            <form action="{{('assign-roles')}}" method="POST">
                                @csrf
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $user->admin_name }}</td>
                                <td>
                                    {{ $user->admin_email }}
                                    <input type="hidden" name="admin_email" value="{{ $user->admin_email }}">
                                    <input type="hidden" name="admin_id" value="{{ $user->admin_id }}">
                                </td>
                                <td>{{ $user->admin_phone }}</td>
                                <td>
                                    <input type="checkbox" name="author_role" {{$user->hasRoles('Author') ? 'checked' : ''}}>
                                </td>
                                <td>
                                    <input type="checkbox" name="admin_role" {{$user->hasRoles('Admin') ? 'checked' : ''}}>
                                </td>
                                <td>
                                    <input type="checkbox" name="user_role" {{$user->hasRoles('User') ? 'checked' : ''}}>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-default">Assign roles</button>
                                </td>
                            </form>
                            <td>
                               <a href="{{('delete-user-roles/'.$user->admin_id)}}" class="btn btn-danger">Xóa user </a>
                            </td>
                            <td>
                                <a href="{{('impersonate/'.$user->admin_id)}}" class="btn btn-success">Chuyển quyền user </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
