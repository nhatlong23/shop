@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm User
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('insert-user') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên User</label>
                                <input type="text" name="admin_name"
                                    class="form-control" placeholder="Tên User" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email User</label>
                                <input type="email" name="admin_email"
                                    class="form-control" placeholder="Email User" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone User</label>
                                <input type="text" name="admin_phone"
                                    class="form-control" placeholder="Phone User" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="admin_password"
                                    class="form-control" placeholder="Password User" autocomplete="off">
                            </div>
                            <button type="submit" name="add_user" class="btn btn-info">Thêm User</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
