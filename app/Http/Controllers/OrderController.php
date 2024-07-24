<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(){

       
    }

    public function indexAdmin(Request $request){

        if ($request->search){
            $orders = Order::where('billing_name', 'like', "%{$request->search}%")->with('products')->get();
        } else {
            $orders = Order::with('products')->get();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $orders = Order::onlyTrashed()->where('billing_name', 'like', "%{$request->search}%")->with('products')->get();
            } else {
                $orders = Order::onlyTrashed()->with('products')->get();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/Orders', [
            'orders' => $orders,
            'filters' => $filters,
        ]);
    }

    public function show($orderId){

        $order = Order::find($orderId)->load('products');

      //  dd($order->products[0]->pivot);

        return Inertia::render('Admin/Order', [
            'order' => $order
        ]);
    }

    public function store(Order $order, Request $request) {

   
        $request->validate([
            'billing_email' => 'required',
            'billing_name' => 'required',
            'orderProducts' => 'required',
        ],
        [
            'billing_email.required' => 'Please enter a billing email',
            'billing_name.required' => 'Please enter a billing name',
            'orderProducts.required' => 'Please add some Order Products'
        ]);

        $order = Order::create([
            'user_id' => null,
            'billing_email' => $request->billing_email,
            'billing_name' => $request->billing_name,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
           // 'discount' => $request->discount,
            'tax' => ($request->orderTotal) * 0.2,
            'total' => $request->orderTotal,
            'status' => 'Complete',
            'type' => $request->type,
            'shipped' => true,
            'created_by' => Auth::user()->id,
        ]);
    
        foreach ($request->orderProducts as $orderProduct) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $orderProduct['product']['id'],
                'quantity' => $orderProduct['product']['quantity']
            ]);
        }

    

         return redirect()->route('orders.index')->with('message', 'Order Added Successfully');

    }

    // public function update(BlogPost $blogPost, Request $request) {

    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ],
    //     [
    //         'title.required' => 'Please enter a Poat Title',
    //         'content.required' => 'Please enter some Post Content'
    //     ]);

    //     $blogPost->update([
    //         'title' => $request->title,
    //         'slug' => str($request->title)->slug(),
    //         'snippet' => substr($request->content, 0, 100),
    //         'content' => $request->content,
    //         'youtube_link' => $request->youtube_link,
    //         'updated_by' => Auth::user()->id
    //     ]);

    //     if ($request->images){
    //         $blogPost->images()->delete();
    //         foreach ($request->images as $newImage) {
    //             $imageName = $blogPost->slug.rand(1, 9999).'.jpg';

    //             $image = $newImage->storeAs('blog/images',$imageName,'public');

    //             File::create([
    //                 'disk' => 'public',
    //                 'fileable_type' => 'App\Models\BlogPost',
    //                 'fileable_id' => $blogPost->id,
    //                 'url' => Storage::disk('public')->url('blog/images/' . $imageName),
    //                 'path' => 'blog/images/' . $imageName,
    //                 'original_file_name' => $imageName,
    //                 'size' => Storage::disk('public')->size('blog/images/' . $imageName),
    //                 'mime_type' => Storage::disk('public')->mimeType('blog/images/' . $imageName),
    //             ]);
    //         }
    //     }

    //     return redirect()->route('blog-posts.index')->with('message', 'Blog Post  Successfully');

    // }

    public function markAsShipped($orderId) {
        $order = Order::find($orderId);

        $order->shipped = 1;
        $order->status = 'Shipped';

        $order->save();

        return redirect()->back()->with('message', 'Order Marked As Shipped');
    }

    public function generatePDF($orderId) {
        $order = Order::with('products')->find($orderId);

        $data = [
            'order' => $order,
            'date' => Carbon::now()->format('d/m/Y'),
            'time' => Carbon::now()->format('H:i:s')
        ];

        view()->share('data', $data);

        $pdf = PDF::loadView('pdfs.invoice', $data);

       // $name = md5($order->id) . '.pdf';

        return $pdf->download('label.pdf');

       // return redirect()->back()->with('message', 'Order Label Downloaded Successfully');
    }

    public function delete(BlogPost $blogPost) {
        $blogPost->delete();

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Deleted Successfully');
    }

    // public function restore($blogPostId) {
    //     BlogPost::onlyTrashed()->where('id', '=', $blogPostId)->restore();

    //     return redirect()->route('blog-posts.index')->with('message', 'Blog Post Restored Successfully');
    // }

    // public function forceDelete($blogPostId)
    // {
    //     $blogPost = BlogPost::onlyTrashed()->find($blogPostId);

    //     $blogPost->images()->forceDelete();
       
    //     $blogPost->forceDelete();

    //     return redirect()->route('blog-posts.index')->with('message', 'Blog Post Destroyed Successfully');
    // }

}
