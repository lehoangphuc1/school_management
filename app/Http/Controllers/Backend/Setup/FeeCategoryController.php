<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function FeeCatView()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    }
    public function FeeCatAdd()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }
    public function FeeCatStore(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);
        $data = new FeeCategory();
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Thêm khoản phí thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function FeeCatEdit(Request $rq, $id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
    }
    public function FeeCatUpdate(Request $rq, $id)
    {
        $data = FeeCategory::find($id);
        $validatedData = $rq->validate([
            'name' => 'required|unique:fee_categories,name,' . $data->id,
        ]);
        $data->name = $rq->name;
        $data->save();
        $notification = array(
            'message' => 'Sửa khoản phí thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function FeeCatDelete($id)
    {
        $user = FeeCategory::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Xóa khoản phí thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
}
