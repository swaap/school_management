<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\User;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Mail;
use \App\Order;
use \App\OrderTran;

class OrderController extends Controller {
    /*
     * @funcation name  : index
     * function details : list of User Details
     * @Param           : null
     * @return          : null
     */

    public function index() {
        return view('admin::order.list');
    }

    /*
     * @funcation name  : getUserData
     * function details : get Users data
     * @Param           : null
     * @return          : User data with datatable
     */

    public function getOrderData() {
        $all_user = Order::all();
        return Datatables::of($all_user)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            return '<a class="btn btn-sm btn-primary" href="' . url('/order/edit/' . base64_encode($row->id)) . '">Edit</a>';
                        })
                        ->editColumn('customer_name', function ($row) {
                          return $row->user->first_name.' '.$row->user->last_name;
                        })
                        ->editColumn('address', function ($row) {
                          return 'address';
                        })
                        ->editColumn('quantity', function ($row) {
                          return count($row->OrderTrans);
                        })
                        ->editColumn('order_date', function ($row) {
                           return date('Y-m-d H:i',strtotime($row->created_at));
                        })
                       
                        ->removeColumn('created_at')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    public function editOrder(Request $request) {
         $order_details = Order::find(base64_decode($request->order_id));
       
        return view('admin::order.edit',compact('order_details'));
    }

    public function editPostOrder(Request $request) {
        $order_details = Order::find(base64_decode($request->order_id));
        if(!empty($order_details)) {
            $input=$request->all();
            if(count($input['item_price'])>0) {
                foreach ($order_details->OrderTrans as $key => $value) {
                      $order_trans = OrderTran::find($value->id);
                       if(!empty($order_trans) && isset($input['item_price'][$value->id]) && $input['item_price'][$value->id]>0) {
                        $order_trans->item_price=$input['item_price'][$value->id];
                        $order_trans->save();
                       }
                }
            }
            $order_details->order_status='1';
            $order_details->save();
            return redirect('/orders')->with('success','Order details updated successfully.');
        } else {
            return redirect('/orders')->with('error','Sorry! order not found.');
        }

    }

    

}
