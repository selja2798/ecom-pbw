<?php

namespace App\Http\Controllers;

use App\Consumer;
use App\Order;
use App\Produk;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $produk = Order::paginate(5);
        return view('order.index')->with('orders', $produk);
    }


    public function create() {
        return view('order.create')
                ->with('consumers', Consumer::all())
                ->with('produks', Produk::all());
    }


    public function store(OrderRequest $request) {
        $produk = Produk::find($request->produk);

        Order::create([
            'qty' => $request->qty,
            'consumer_id' => $request->consumer,
            'produk_id' => $request->produk,
            'total_harga' => $request->qty * $produk->harga
        ]);

        session()->flash('success', 'Order berhasil tersimpan.');

        return back();
    }


    public function update(OrderUpdateRequest $request, Order $order) {
        if ($request->status_order > 0) {
            if ($request->status_order == 3) {
                $produk = Produk::find($order->produk_id);

                if ($produk->stok >= $order->qty) {
                    $produk->stok = $produk->stok - (int)$order->qty;
                    $produk->save();
                }else{
                    session()->flash('error', 'Stok produk sudah habis');
                    return back();
                }
            }

            $status_orderToInt = (int)$request->status_order;
            $order->status_order = $status_orderToInt;

            $order->save();

            session()->flash('success', 'Status order berhasil dirubah.');
        }else{
            $order->delete();

            session()->flash('success', 'Order berhasil terhapus.');
        }
        return back();
    }
}
