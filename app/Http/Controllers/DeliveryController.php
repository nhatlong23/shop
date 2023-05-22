<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use Carbon\Carbon;


class DeliveryController extends Controller
{
    public function delivery(Request $request)
    {
        $city = City::orderBy('matp', 'ASC')->get();
        return view('admin.delivery.add_delivery', compact('city'));
    }

    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if (isset($data['action']) && isset($data['matp'])) {
            $output = '';
            if ($data['action'] == 'city') {
                $province = Province::where('matp', $data['matp'])->orderBy('maqh', 'asc')->get();
                if (count($province) > 0) {
                    $output .= '<option value="">-----Chọn quận huyện-----</option>';
                    foreach ($province as $key => $prov) {
                        $output .= '<option value="' . $prov->maqh . '">' . $prov->name_qh . '</option>';
                    }
                } else {
                    $output .= '<option value="">Không tìm thấy kết quả.</option>';
                }
            } else if ($data['action'] == 'province') {
                $wards = Wards::where('maqh', $data['matp'])->orderBy('xaid', 'ASC')->get();
                if (count($wards) > 0) {
                    $output .= '<option value="">-----Chọn xã phường-----</option>';
                    foreach ($wards as $key => $ward) {
                        $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                    }
                } else {
                    $output .= '<option value="">Không tìm thấy kết quả.</option>';
                }
            } else {
                $output .= '<option value="">Không tìm thấy kết quả.</option>';
            }
            echo $output;
        } else {
            echo '<option value="">Không tìm thấy kết quả.</option>';
        }
    }


    public function insert_delivery(Request $request)
    {
        $data = $request->all();
        // $data = $request->validate(
        //     [
        //         'feeship' => 'unique',
        //     ],
        //     [
        //         'feeship.unique' => 'Phí vận chuyển đã tồn tại',
        //     ]
        // );
        $feeship = new Feeship();

        $feeship->fee_matp = $data['city'];
        $feeship->fee_maqh = $data['province'];
        $feeship->fee_xaid = $data['wards'];
        $feeship->feeship = $data['feeship'];
        $feeship->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $feeship->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $feeship->save();
    }

    public function select_feeship()
    {
        $feeship = Feeship::orderBy('fee_id', 'DESC')->get();

        $output = '';
        $output .= '<table class="table table-bordered">
                        <tr>
                            <th>STT</th>
                            <th>Tỉnh/Thành phố</th>
                            <th>Quận/Huyện</th>
                            <th>Xã/Phường</th>
                            <th>Phí vận chuyển</th>
                            <th>Ngày thêm</th>
                            <th>Ngày sửa</th>
                        </tr>';
        foreach ($feeship as $key => $fee) {
            $output .= '<tr>
                            <td>' . ($key + 1) . '</td>
                            <td>' . $fee->city->name_tp . '</td>
                            <td>' . $fee->province->name_qh . '</td>
                            <td>' . $fee->wards->name . '</td>
                            <td class="feeship_edit" contenteditable data-feeship_id="' . $fee->fee_id . '">' . number_format($fee->feeship, 0, ',', '.') . '</td>
                            <td>' . $fee->created_at . '</td>
                            <td>' . $fee->updated_at . '</td>
                        </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function update_feeship(Request $request)
    {
        $data = $request->all();
        $feeship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '.');
        $feeship->feeship = $fee_value;
        $feeship->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $feeship->save();
    }


    // public function select_delivery_home(Request $request){

    //     $data = $request->all();
    //     if ($data['action']) {
    //         $output = '';
    //         if ($data['action'] == 'city') {
    //             $province = Province::where('matp', $data['matp'])->orderBy('maqh', 'asc')->get();
    //             $output .= '<option value="">--------Chọn quận huyện---------</option>';
    //             foreach ($province as $key => $prov) {
    //                 $output .= '<option value="' . $prov->maqh . '">' . $prov->name_qh . '</option>';
    //             }
    //         } else if ($data['action'] == 'province') {
    //             $wards = Wards::where('maqh', $data['matp'])->orderBy('xaid', 'ASC')->get();
    //             $output .= '<option value="">--------Chọn xã phường---------</option>';
    //             foreach ($wards as $key => $ward) {
    //                 $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
    //             }
    //         }
    //         echo $output;
    //     }
    // }

    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee', $fee->feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee', 15000);
                        Session::save();
                }
            }
            
        }
    }

    public function unset_fee(){
        Session::forget('fee');
        Session::put('message', 'Xóa phí vận chuyển thành công');
        Session::save();
        return back();
    }
}
