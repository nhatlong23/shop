@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê google drive
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
                    @csrf
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên</th>
                            <th>Đường dẫn</th>
                            <th>Base Name</th>
                            <th>MimeType</th>
                            <th>Type</th>
                            <th>MimeType</th>
                            <th>Image</th>
                            <th>Download</th>
                            <th>Download2</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $key => $contents)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $contents['name'] }}</td>
                                <td>{{ $contents['path'] }}</td>
                                <td>{{ $contents['basename'] }}</td>
                                <td>{{ $contents['mimetype'] }}</td>
                                <td>{{ $contents['type'] }}</td>
                                <td>{{ $contents['size'] }}</td>
                                <td><iframe src="https://drive.google.com/file/d/{{ $contents['path'] }}/preview"
                                        width="200" height="200" allow="autoplay">
                                    </iframe>
                                </td>
                                <td> Cách 1: 
                                    <a target="_blank" href="https://drive.google.com/file/d/{{ $contents['path'] }}/view">Tải</a>
                                </td>
                                <td>Cách 2: 
                                    <a href="{{ URL::to('download-file' , ['path'=>$contents['path'], 'name'=>$contents['name']]) }}">Tải</a>
                                </td>
                                <td><a href="{{ URL::to('delete-file/' . $contents['path']) }}">Xóa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
