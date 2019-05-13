<?php

namespace App\Http\Controllers\admin\yayinevi;
use App\Helper\mHelper;
use App\Yayinevi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){
        $data = Yayinevi::paginate(10);
        return view('admin.yayinevi.index',['data'=>$data]);
    }
    public function create(){
        return view('admin.yayinevi.create');
    }
    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink']=mHelper::permalink($all['name']);
        
        $insert=Yayinevi::create($all);
        if($insert){
            return redirect()->back()->with('status','Yayınevi başarıyla eklendi.');
        }
        else {
            return redirect()->back()->with('status','Yayınevi eklenemedi.');
        }
    }

    public function edit($id){
        $control = Yayinevi::where('id','=',$id)->count();
        if ($control!=0) {
            $data=Yayinevi::where('id','=',$id)->get();
        return view('admin.yayinevi.edit',['data'=>$data]);
        }
        else {
            return redirect('/');
        }        
    }
    public function update(Request $request){
        $id=$request->route('id');
        $control = Yayinevi::where('id','=',$id)->count();
        if ($control!=0) {
            $all=$request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Yayinevi::where('id','=',$id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Yayınevi güncellendi');
            }
            else {
                return redirect()->back()->with('status','Yayınevi güncellenmesi başarısız oldu.');
            }
        }
        else {
            return redirect('/');
        }  
    }
    public function delete($id)
    {
        $control = Yayinevi::where('id','=',$id)->count();
        if ($control!=0) {
                $delete = Yayinevi::where('id','=',$id)->delete();
                return redirect()->back();
        }
        else {
            return redirect('/');
        }     
    }
}
  
    
