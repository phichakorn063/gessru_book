<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    public function index()
    {
        $branchs = Branch::all();

        return view('branchs.index', compact('branchs'));
    }
    
    public function store()
    {
        if (!request('status') || !request('background') || !request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }
        $background = request('background')->store('branch','public');
        Branch::create(array_merge(request()->all(), ['background' => $background]));

        alert()->success('สำเร็จ', 'เพิ่มรายการเรียบร้อย');
        return back();
    }

    public function update(Branch $branch)
    {

        if (!request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }

        if (request('background')) {
            Storage::disk('public')->delete($branch->background);
            $background = request('background')->store('branch','public');
        } else {
            $background = $branch->background;
        }

        $branch->update(array_merge(request()->all(), ['background' => $background]));
        alert()->success('สำเร็จ', 'แก้ไขรายการเรียบร้อย');
        return back();
    }
}
