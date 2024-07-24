<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class DiscountCodeController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $discountCodes = DiscountCode::where('code', 'like', "%{$request->search}%")->paginate();
        } else {
            $discountCodes = DiscountCode::where('code', '!=', null)->paginate();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $discountCodes = DiscountCode::onlyTrashed()->where('title', 'like', "%{$request->search}%")->paginate();
            } else {
                $discountCodes = DiscountCode::onlyTrashed()->paginate();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/DiscountCodes', [
            'discountCodes' => $discountCodes,
            'links' => $discountCodes->links(),
            'filters' => $filters,
        ]);
    }

    public function store(DiscountCode $discountCode, Request $request) {

        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
        ],
        [
            'code.required' => 'Please enter a discount code',
            'type.required' => 'Please select a Type',
            'value.required' => 'Please enter a Discount Value',
        ]);


        $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');

        $newDiscountCode = DiscountCode::create([
            'code' => $request->code,
            'enabled' => 1,
            'type' => $request->type,
            'value' => $request->value,
            'start_date' => $start_date,
            'end_date' => $end_date,      
        ]);


        return redirect()->route('discount-codes.index')->with('message', 'Discount Code Added Successfully');

    }

    public function update(DiscountCode $discountCode, Request $request) {

        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
        ],
        [
            'code.required' => 'Please enter a discount code',
            'type.required' => 'Please select a Type',
            'value.required' => 'Please enter a Discount Value',
        ]);

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        
        $discountCode->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'start_date' => $start_date,
            'end_date' => $end_date,   
        ]);

       return redirect()->route('discount-codes.index')->with('message', 'Discount Code Updated Successfully');

    }

    public function updateStatus($discountCodeId) {
        $discountCode = DiscountCode::find($discountCodeId);

        $discountCode->enabled = !$discountCode->enabled;

        $discountCode->save();

        return redirect()->route('discount-codes.index')->with('message', 'Discount Code Status Updated Successfully');
    }

    public function delete(DiscountCode $discountCode) {
        $discountCode->delete();

        return redirect()->route('discount-codes.index')->with('message', 'Discount Code Deleted Successfully');
    }

    public function restore($discountCodeId) {
        DiscountCode::onlyTrashed()->where('id', '=', $discountCodeId)->restore();

        return redirect()->route('discount-codes.index')->with('message', 'Discount Code Restored Successfully');
    }

    public function forceDelete($discountCodeId)
    {
        $discountCode = DiscountCode::onlyTrashed()->find($discountCodeId);

        $discountCode->forceDelete();

        return redirect()->route('discount-codes.index')->with('message', 'Discount Code Destroyed Successfully');
    }
}
