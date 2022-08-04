<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Graduate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\GraduateImport;
use Excel;

class GraduateController extends Controller
{
    public function index()
    {
        $graduates = Graduate::orderBy('numberGraduate')->paginate(100);
        return view('graduate.index', compact('graduates'));
    }

    public function addamployee()
    {
       
        return view('graduate.addamployee');
    }


    public function branch()
    {
        $graduates = Graduate::select('description', DB::raw('count(*) as cnt'))->groupBy('description')->get();

        return view('graduate.branch', compact('graduates'));
    }
    public function description($description)
    {
        $graduates = Graduate::where('description',$description)->orderBy('numberGraduate')->paginate(100);

        return view('graduate.description', compact('graduates','description'));
    }

    public function store()
    {

        if (!request('studentCode') || !request('numberGraduate') || !request('name') || !request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }
        if (request('type_photo') == 1) {
            if (!request('photo_url')) {
                alert()->error('ผิดพลาด', 'ใส่ URL ด้วย');
                return back();
            }else{
                $photo = request('photo_url');
            }
        }else{
            if (!request('photo_server')) {
                alert()->error('ผิดพลาด', 'เพิ่มรูปภาพด้วย');
                return back();
            }else{
                $photo = request('photo_server')->store('graduate','public');
            }
        }
        Graduate::create([
            'studentCode'=> request('studentCode'),
            'numberGraduate'=> request('numberGraduate'),
            'name'=> request('name'),
            'description'=> request('description'),
            'type_photo'=> request('type_photo'),
            'photo'=> $photo,
            'stauts'=>request('status')
        ]);

        alert()->success('สำเร็จ', 'เพิ่มรายการเรียบร้อย');
        return back();
    }

    public function update(Graduate $graduate)
    {

        if (!request('description')) {
            alert()->error('ผิดพลาด', 'ข้อมูลไม่ครบ');
            return back();
        }

        if (request('background')) {
            Storage::disk('public')->delete($graduate->background);
        } else {
            $background = $graduate->background;
        }

        $graduate->update(array_merge(request()->all(), ['background' => $background]));
        alert()->success('สำเร็จ', 'แก้ไขรายการเรียบร้อย');
        return back();
    }

    public function print($description)
    {
        if(!request('ids')){
            alert()->error('ผิดพลาด', 'ไม่ได้เลือกรายการ');
            return back();
        }
        $branch = Branch::where('status',1)->where('description',$description)->first();
        if(!$branch){
            alert()->error('ผิดพลาด', 'ไม่พบสาขาปริญญา');
            return back();
        }

        $graduates = Graduate::whereIn('id',request('ids'))->get();
        $count = ($graduates->count() / 10);
        $pages = [];
        for ($x = 0; $x <= $count; $x++) {
            $pages[] = $x;
        }

        return view('graduate.print', compact('graduates','branch','pages'));
    }

    public function import()
    {
        Excel::import(new GraduateImport, request()->file('excel_file'));
        alert()->success('สำเร็จ', 'นำเข้าแล้ว');
        return back();
    }

    public function search()
    {
        $value = request('value');
        $graduates = Graduate::where('name', 'like', '%' . $value . '%')->get();
        if($graduates->count() < 1){
            $graduates = Graduate::where('numberGraduate', 'like', '%' . $value . '%')->get();
        }
        if($graduates->count() < 1){
            $graduates = Graduate::where('studentCode', 'like', '%' . $value . '%')->get();
        }
        return view('graduate.search', compact('graduates','value'));
    }
}
