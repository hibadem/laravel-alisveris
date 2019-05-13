<?php

namespace App\Http\Controllers\admin\slider;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data = Slider::paginate(10);
        return view('admin.slider.index',['data'=>$data]);
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
         $insert = Slider::create($all);
         if ($insert) {
             return redirect()->back()->with('status','Slider eklendi.');
         }
         else
         {
            return redirect()->back()->with('status','Slider eklenemedi.');
         }
        
        
    }
    public function edit($id)
    {
        $data = Slider::where('id','=',$id)->get();
        return view('admin.slider.edit',['data'=>$data]);
    }
    public function update(Request $request)
    {   
        $all = $request->except('_token');
        $id = $request->route('id');
        $data = Slider::where('id','=',$id)->get();
        
         $insert = Slider::where('id','=',$id)->update($all);
         if ($insert) {
             return redirect()->back()->with('status','Slider Düzenlendi.');
         }
         else
         {
            return redirect()->back()->with('status','Slider Düzenlenemedi.');
         }
        
        
    }
    public function delete($id)
    {
        
        $data = Slider::where('id','=',$id)->delete();
        return redirect()->back();
    }
    
}
