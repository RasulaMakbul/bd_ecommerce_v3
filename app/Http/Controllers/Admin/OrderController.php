<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon as SupportCarbon;
use Barryvdh\DomPDF\Facade\Pdf;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Order::orderBy('id', 'DESC')->paginate(15);
        // $todayDate = Carbon::now()->format('Y-m-d');

        // $orders = Order::when($request->date != null, function ($q) use ($request) {
        //     $q->whereDate('created_at', $request->date)->paginate(10);
        // }, function ($q) use ($todayDate) {
        //     $q->whereDate('created_at', $todayDate);
        // })
        //     ->when($request->status != null, function ($q) use ($request) {
        //         $q->where('status_message', $request->status)->paginate(10);
        //     })
        //     ->whereDate('created_at', $todayDate)->paginate(10);


        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function OrderStatusupdate(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/order/' . $orderId)->with('message', 'Order Status Updated');
        } else {
            return redirect('admin/order/' . $orderId)->with('message', 'Order not Found');
        }
    }
    public function OrderInvoice($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.generate-invoice', compact('order'));
    }


    public function OrderInvoiceGenerate($id)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $order = Order::findOrFail($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.generate-invoice', $data);
        return $pdf->download('invoice' . $order->tracking_no . '_' . $todayDate . '.' . 'pdf');
    }
}
