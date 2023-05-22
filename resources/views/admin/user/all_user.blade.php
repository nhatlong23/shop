@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê users
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
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
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($admin as $key => $user)
                        <form action="{{('assign-roles')}}" method="POST">
                            @csrf
                            <tr>
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
                                    <input type="submit" value="Assign roles" class="btn btn-sm btn-default">
                                </td>
                                <td>
                                   <a href="{{('delete-user-roles/'.$user->admin_id)}}" class="btn btn-danger">Xóa user </a>
                                </td>
                                <td>
                                    <a href="{{('impersonate/'.$user->admin_id)}}" class="btn btn-success">Chuyển quyền user </a>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                  <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                  </div>
                  <div class="col-sm-7 text-right text-center-xs">                
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                      {!!$admin->links()!!}
                    </ul>
                  </div>
                </div>
              </footer>
        </div>
    </div>
@endsection
