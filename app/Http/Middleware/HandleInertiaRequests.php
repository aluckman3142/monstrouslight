<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $categories = Category::with('sub_categories', 'sub_categories.sub_sub_categories')->where('enabled', '=', 1)->get();

        $hotdeals = Product::where('hot_deal', '=', 1)->where('enabled', '=', 1)->inRandomOrder()->limit(4)->get();

        $neworders = Order::where('status', '=', 'New')->get();

        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => [
                    'id' => Auth::user() ? Auth::user()->id : null,
                    'username' => Auth::user() ? Auth::user()->first_name : null,
                    'first_name' => Auth::user() ? Auth::user()->first_name : null,
                    'surname' => Auth::user() ? Auth::user()->surname : null,
                    'email' => Auth::user() ? Auth::user()->email : null,
                    'is_admin' => Auth::user() ? Auth::user()->is_admin : null,
                    'dob' => Auth::user() ? Auth::user()->dob : null,
                    'phone_number' => Auth::user() ? Auth::user()->phone_number : null,
                    'mobile_number' => Auth::user() ? Auth::user()->mobile_number : null,
                ]
            ],
            'neworders' => $neworders->count(),
            'categories' => $categories,
            'filters' => $filters,
            'hotdeals' => $hotdeals,
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
            'cart' => $request->session()->get('cart'),
            'code' => $request->session()->get('code'),
        ]);
    }
}
