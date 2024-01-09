<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Feeship;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Statistics;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
  public function manager_order()
  {
    $order = Order::orderBy('created_at', 'DESC')->get();
    return view('admin.order.manager_order', compact('order'));
  }

  public function view_order($order_code)
  {
    $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
    $order = Order::where('order_code', $order_code)->get();
    foreach ($order as $key => $ord) {
      $customer_id = $ord->customer_id;
      $shipping_id = $ord->shipping_id;
      $order_status = $ord->order_status;
    }
    $customer = Customer::where('customer_id', $customer_id)->first();
    $shipping = Shipping::where('shipping_id', $shipping_id)->first();
    $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();

    foreach ($order_details as $key => $order_d) {
      $product_coupon = $order_d->product_coupon;
    }
    if ($product_coupon != '0') {
      $coupon = Coupon::where('coupon_code', $product_coupon)->first();
      $coupon_condition = $coupon->coupon_condition;
      $coupon_number = $coupon->coupon_number;
    } else {
      $coupon_condition = 2;
      $coupon_number = 0;
    }
    return view('admin.order.view_order', compact('order_details', 'customer', 'shipping', 'order_details', 'coupon_condition', 'coupon_number', 'order', 'order_status'));
  }

  public function print_order($checkout_code)
  {
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->print_order_convert($checkout_code));
    return $pdf->stream();
  }

  public function print_order_convert($checkout_code)
  {
    $order_details = OrderDetails::where('order_code', $checkout_code)->get();
    $order = Order::where('order_code', $checkout_code)->get();
    foreach ($order as $key => $ord) {
      $customer_id = $ord->customer_id;
      $shipping_id = $ord->shipping_id;
    }
    $customer = Customer::where('customer_id', $customer_id)->first();
    $shipping = Shipping::where('shipping_id', $shipping_id)->first();
    $order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
    foreach ($order_details_product as $key => $order_d) {
      $product_coupon = $order_d->product_coupon;
    }
    if ($product_coupon != '0') {
      $coupon = Coupon::where('coupon_code', $product_coupon)->first();
      $coupon_condition = $coupon->coupon_condition;
      $coupon_number = $coupon->coupon_number;
      if ($coupon_condition == 1) {
        $coupon_echo = $coupon_number . ' %';
      } else {
        $coupon_echo = number_format($coupon_number) . ' VNĐ';
      }
    } else {
      $coupon_condition = 2;
      $coupon_number = 0;
      $coupon_echo = '0';
    }


    $output = '';
    $output .= '<style>
        body {
            font-family: DejaVu Sans;
          }
          .table-styling {
            border: 1px solid #0000;
          }
          .table-styling td {
            border: 1px solid #0000;
          }
          .line {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            border-bottom: 3px solid black;
            font-weight: bold;
          }
          table {
            border-collapse: collapse;
            width: 700px;
          }

          th,
          td {
            text-align: left;
            padding: 8px;
          }

          th {
            background-color: #4caf50;
            color: white;
          }

          tr:nth-child(even) {
            background-color: #f2f2f2;
          }

          .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
          }

          .left,
          .right {
            width: 48%;
          }

        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <h1>
          <center>Cộng hòa xã hội chủ nghĩa Việt Nam</center>
        </h1>
        <h1>
          <center>Độc lập - Tự do - Hạnh Phúc</center>
        </h1>
        <h2>
          <center> Công ty cổ phần Long Nguyen </center>
        </h2>
        <h4>-Liên hệ: 0899244850</h4>
        <h4>-Website: https://shop.local</h4>
        <h4>-Email: nhatlong2356@gmail.com</h4>
        <div class="line"></div>
        <p><strong>Người đặt hàng:</strong></p>
        <table>
          <thead>
            <tr>
              <th>Tên khách đặt</th>
              <th>Số điện thoại</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>' . $customer->customer_name . '</td>
              <td>' . $customer->customer_phone . '</td>
              <td>' . $customer->customer_email . '</td>
            </tr>
          </tbody>
        </table>

        <p><strong>Ship hàng tới:</strong></p>

        <table>
          <thead>
            <tr>
              <th>Tên khách hàng đặt</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Ghi chú</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>' . $shipping->shipping_name . '</td>
              <td>' . $shipping->shipping_address . '</td>
              <td>' . $shipping->shipping_phone . '</td>
              <td>' . $shipping->shipping_email . '</td>
              <td>' . $shipping->shipping_notes . '</td>
            </tr>

          </tbody>
        </table>

        <p><strong>Đơn đặt hàng</strong></p>
        <table>
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Mã giảm giá</th>
              <th>Phí Ship</th>
              <th>Giá sản phẩm (đơn vị: VNĐ)</th>
              <th>Thành tiền (đơn vị: VNĐ)</th>
            </tr>
          </thead>
          <tbody>

          ';

    $total = 0;
    foreach ($order_details_product as $key => $product) {
      $subtotal = $product->product_price * $product->product_sales_quantity;
      $total += $subtotal;
      if ($product->product_coupon != '0') {
        $product_coupon = $product->product_coupon;
      } else {
        $product_coupon = "Không có mã giảm giá";
      }
      $output .= '
                  <tr>
                    <td>' . $product->product->product_name . '</td>
                    <td>' . $product->product_sales_quantity . '</td>
                    <td>' . $product->product_coupon . '</td>
                    <td>' . number_format($product->product_feeship, 0, ',', '.') . 'VNĐ</td>
                    <td>' . number_format($product->product_price, 0, ',', '.') . 'VNĐ</td>
                    <td>' . number_format($subtotal, 0, ',', '.') . 'VNĐ</td>
                  </tr>
                ';
    }
    if ($coupon_condition == 1) {
      $total_after_coupon = ($total * $coupon_number) / 100;
      $total_coupon = $total - $total_after_coupon + $product->product_feeship;
    } else {
      $total_coupon = $total - $coupon_number + $product->product_feeship;
    }
    $output .= '
          </tbody>
          <table>
            <tfoot>
            <tr>
              <td colspan="3">Tổng giảm:</td>
              <td>' . $coupon_echo . '</td>
            </tr>
            <tr>
              <td colspan="3">Phí Ship:</td>
              <td>
                ' . number_format($product->product_feeship, 0, ',', '.') . ' VNĐ
              </td>
            </tr>
            <tr>
              <td colspan="3">Thanh Toán:</td>
              <td>
                ' . number_format($total_coupon, 0, ',', '.') . ' VNĐ
              </td>
            </tr>
          </tfoot>
          </table>
        </table>

        <p><strong>Kí tên:</strong></p <div class="container">
        <div class="left">
          <p><strong>Người lập phiếu:</strong></p>
          <p>Họ và tên: ________________________</p>
          <p>Chức vụ: __________________________</p>
          <p>Ngày lập phiếu: ____/____/___________</p>
        </div>
        <div class="right">
          <p><strong>Người nhận hàng:</strong></p>
          <p>Họ và tên: ________________________</p>
          <p>Chức vụ: __________________________</p>
          <p>Ngày nhận hàng: ____/____/___________</p>
        </div>
        </div>
        <h2>
          <center>Cảm ơn quý khách đã mua hàng tại cửa hàng chúng tôi</center>
        </h2>
        ';
    return $output;
  }

  public function update_order_status(Request $request)
  {
    $data = $request->all();
    $order = Order::find($data['order_id']);
    $order->order_status = $data['order_status'];
    $order->save();

    //send mail shipping
    $order_date = Carbon::now('Asia/Ho_Chi_Minh');
    if (isset($coupon)) {
      $coupon_number = $coupon->coupon_number;
      $coupon_condition = $coupon->coupon_condition;
    } else {
      // Không có mã giảm giá
      $coupon_number = null;
      $coupon_condition = 'Không có mã giảm giá';
    }
    $title_mail = "Đơn hàng của bạn đã được giao cho đơn vị vận chuyển: " . $order_date;
    $customer = Customer::where('customer_id', $order->customer_id)->first();
    $data['email'][] = $customer->customer_email;

    //lay san pham
    $cart_array = [];
    foreach ($data['order_product_id'] as $key => $product) {
      $product_mail = Product::find($product);
      foreach ($data['quantity'] as $key2 => $qty) {
        if ($key == $key2) {
          $cart_array[] = array(
            "product_image" => $product_mail['product_image'],
            'product_name' => $product_mail['product_name'],
            'product_price' => $product_mail['product_price'],
            'product_qty' => $qty,
          );
        }
      }
    }

    //lay shiping
    $details = OrderDetails::where('order_code', $order->order_code)->first();
    $fee_ship = $details->product_feeship;
    $coupon_mail = $details->product_coupon;
    $shipping = Shipping::where('shipping_id', $order->shipping_id)->first();

    $shipping_array = array(
      'fee_ship' => $fee_ship,
      'customer_name' => $customer->customer_name,
      'shipping_name' => $shipping['shipping_name'],
      'shipping_phone' => $shipping['shipping_phone'],
      'shipping_address' => $shipping['shipping_address'],
      'shipping_email' => $shipping['shipping_email'],
      'shipping_notes' => $shipping['shipping_notes'],
      "shipping_method" => $shipping['shipping_method'],
    );

    //order_code, coupon code
    $order_code_array = array(
      "order_code" => $details->order_code,
      "coupon_code" => $coupon_mail,
      "order_date" => $order_date,
      "coupon_number" => $coupon_number,
      "coupon_condition" => $coupon_condition,
    );

    Mail::send('admin.mail.send_shipping', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'order_code_array' => $order_code_array], function ($message) use ($title_mail, $data) {
      $message->to($data['email'])->subject($title_mail);
      $message->from($data['email'], $title_mail);
    });

    // order date
    $order_date = $order->order_date;
    $statistic = Statistics::where('order_date', $order_date)->first();

    if ($statistic) {
      $statistic_count = $statistic->count();
    } else {
      $statistic_count = 0;
    }

    $total_order = 0;
    $sales = 0;
    $profit = 0;
    $quantity = 0;

    foreach ($data['order_product_id'] as $key => $product_id) {
      $product = Product::find($product_id);
      $product_quantity = $product->product_quantity;
      $product_sold = $product->product_sold;

      if ($order->order_status == 2) {
        foreach ($data['quantity'] as $key2 => $qty) {
          if ($key == $key2) {
            $pro_remain = $product_quantity - $qty;
            $product->product_quantity = $pro_remain;
            $product->product_sold = $product_sold + $qty;
            $product->save();

            // update doanh thu
            $quantity += $qty;
            $total_order += 1;
            $product_price = $product->product_price;
            $product_cost = $product->product_cost;
            $sales += $product_price * $qty;
            $profit += $sales - ($product_cost * $qty);
          }
        }
      } elseif (!in_array($order->order_status, [2, 3])) {
        foreach ($data['quantity'] as $key2 => $qty) {
          if ($key == $key2) {
            $pro_remain = $product_quantity + $qty;
            $product->product_quantity = $pro_remain;
            $product->product_sold = $product_sold - $qty;
            $product->save();
          }
        }
      }
    }

    // update statistic db
    if ($statistic_count > 0) {
      $statistic->sales = $statistic->sales + $sales;
      $statistic->profit = $statistic->profit + $profit;
      $statistic->quantity = $statistic->quantity + $quantity;
      $statistic->total_order = $statistic->total_order + $total_order + 1;
      $statistic->save();
    } else {
      $statistic_new = new Statistics();
      $statistic_new->order_date = $order_date;
      $statistic_new->sales = $sales;
      $statistic_new->profit = $profit;
      $statistic_new->quantity = $quantity;
      $statistic_new->total_order = $total_order;
      $statistic_new->save();
    }
  }

  public function history()
  {
    if (!Session::get('customer_id')) {
      return redirect('login-checkout')->with('message', 'Bạn cần đăng nhập để xem lịch sử đơn hàng');
    } else {
      $customer_id = Session::get('customer_id');
      $get_order = Order::where('customer_id', $customer_id)->orderBy('created_at', 'DESC')->paginate(5);
      return view('pages.history.history', compact('get_order'));
    }
  }

  public function view_history_order($order_code)
  {
      if (!Session::get('customer_id')) {
          return redirect('login-checkout')->with('message', 'Bạn cần đăng nhập để xem lịch sử đơn hàng');
      } else {
          $get_order = Order::where('order_code', $order_code)->first();
          $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
          $customer_id = $get_order->customer_id;
          $shipping_id = $get_order->shipping_id;
          $order_status = $get_order->order_status;
          $customer = Customer::where('customer_id', $customer_id)->first();
          $shipping = Shipping::where('shipping_id', $shipping_id)->first();
          $product_coupon = '';
          foreach ($order_details as $key => $order_item) {
              $product_coupon = $order_item->product_coupon;
          }

          if ($product_coupon != '0') {
              $coupon = Coupon::where('coupon_code', $product_coupon)->first();
              $coupon_condition = $coupon->coupon_condition;
              $coupon_number = $coupon->coupon_number;
          } else {
              $coupon_condition = 2;
              $coupon_number = 0;
          }
      }

      return view('pages.history.view_history_order', compact('order_details', 'customer', 'shipping', 'coupon_condition', 'coupon_number', 'get_order', 'order_status'));
  }

  public function update_quantity_order(Request $request)
  {
    $data = $request->all();
    $order_details = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
    $order_details->product_sales_quantity = $data['order_qty'];
    $order_details->save();
  }
}
