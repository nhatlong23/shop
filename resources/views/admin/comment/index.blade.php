@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê bình luận sản phẩm
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
                            <th>Duyệt</th>
                            <th>Tên người gửi</th>
                            <th>Bình luận</th>
                            <th>Sản phẩm</th>
                            <th>Ngày bình luận</th>
                            <th>Quản lý</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $comment)
                            @if ($comment->comment_parent_comment == null)
                                <tr>
                                    <td>
                                        <label class="i-checks m-b-none"><input type="checkbox"
                                                name="post[]"><i></i></label>
                                    </td>
                                    <td>
                                        @if ($comment->status == 1)
                                            <input type="button" data-comment_id="{{ $comment->id }}"
                                                data-comment_status="0" id="{{ $comment->product_id }}"
                                                class="btn btn-primary comment_status_btn" value="Đã duyệt bình luận">
                                        @else
                                            <input type="button" data-comment_id="{{ $comment->id }}"
                                                data-comment_status="1" id="{{ $comment->product_id }}"
                                                class="btn btn-danger comment_status_btn" value="Chờ duyệt bình luận">
                                        @endif
                                    </td>
                                    <td>{{ $comment->name }}</td>
                                    <td>
                                        {{ $comment->comment }}
                                        <style type="text/css">
                                            ul.list_rep {
                                                list-style-type: decimal;
                                                color: blue;
                                                margin: 5px 40px;
                                            }
                                        </style>
                                        <ul class="list_rep">
                                            @foreach ($list as $key => $reply_comment)
                                                @if ($reply_comment->comment_parent_comment == $comment->id)
                                                    <li>Trả lời: {{ $reply_comment->comment }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @if ($comment->status == 1)
                                            <br>
                                            <textarea class="reply_comment_{{ $comment->id }}" name="" id="" rows="5"></textarea>
                                            <br>
                                            <button class="btn btn-primary btn-small btn_reply_comment"
                                                data-product_id="{{ $comment->product_id }}"
                                                data-comment_id="{{ $comment->id }}">Trả lời bình luận</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ 'detail-product/' . $comment->product->slug }}" target="_blank">
                                            {{ $comment->product->product_name }}
                                        </a>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($comment->created_at)) }}</td>
                                    <td>
                                        <a href="{{ URL::to('edit-category-product/' . $comment->category_id) }}"
                                            class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure to delete')"
                                            href="{{ URL::to('delete-category-product/' . $comment->category_id) }}"
                                            class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
