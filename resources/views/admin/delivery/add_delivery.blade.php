@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm vận chuyển
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
                        <form>
                            @csrf
                            <div class="form-group">
                                <label >Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    <option value="">--------Chọn tỉnh thành phố---------</option>
                                    @foreach ($city as $key =>$city)
                                        <option value="{{$city->matp}}">{{$city->name_tp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                    <option value="">--------Chọn quận huyện---------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--------Chọn xã phường---------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" name="feeship"
                                    class="form-control feeship money" placeholder="Nhập phí vận chuyển">
                            </div>
                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm vận chuyển</button>
                        </form>
                    </div>
                    <br>
                    <div id="load_delivery">

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
