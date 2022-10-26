<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function FeeAmountView()
    {
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get(); //get tổng by categoryid
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }
    public function FeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }
    public function FeeAmountStore(Request $rq)
    {
        $countClass = count($rq->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $rq->fee_category_id;
                $fee_amount->class_id = $rq->class_id[$i];
                $fee_amount->amount = $rq->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Thêm tổng chi phí thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function FeeAmountEdit($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray()); in data ra để check
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }
    public function FeeAmountUpdate($fee_category_id, Request $rq)
    {
        if ($rq->class_id == NULL) {
            $notification = array(
                'message' => 'Bạn vui lòng chọn ít nhất 1 lớp',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit')->with($notification);
        } else {
            $countClass = count($rq->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            if ($countClass != NULL) {
                for ($i = 0; $i < $countClass; $i++) {
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $rq->fee_category_id;
                    $fee_amount->class_id = $rq->class_id[$i];
                    $fee_amount->amount = $rq->amount[$i];
                    $fee_amount->save();
                }
            }
            $notification = array(
                'message' => 'Thay đổi chi phí thành công',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }
    public function FeeAmountDetail(Request $rq, $fee_category_id)
    {
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }
}
