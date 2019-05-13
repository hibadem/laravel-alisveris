<?php

namespace App\Http\Controllers\admin\kategori;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoriler;

class indexController extends Controller
{
    public function index(){
        $data = Kategoriler::paginate(10);
        return view('admin.kategori.index',['data'=>$data]);
    }
    public function create(){
        return view('admin.kategori.create');
    }
    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink']=mHelper::permalink($all['name']);
        
        $insert=Kategoriler::create($all);
        if($insert){
            return redirect()->back()->with('status','Kategori başarıyla eklendi.');
        }
        else {
            return redirect()->back()->with('status','Kategori eklenemedi.');
        }
    }

    public function edit($id){
        $control = Kategoriler::where('id','=',$id)->count();
        if ($control!=0) {
            $data=Kategoriler::where('id','=',$id)->get();
        return view('admin.kategori.edit',['data'=>$data]);
        }
        else {
            return redirect('/');
        }        
    }
    public function update(Request $request){
        $id=$request->route('id');
        $control = Kategoriler::where('id','=',$id)->count();
        if ($control!=0) {
            $all=$request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Kategoriler::where('id','=',$id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Kategori güncellendi');
            }
            else {
                return redirect()->back()->with('status','Kategori güncellenmesi başarısız oldu.');
            }
        }
        else {
            return redirect('/');
        }  
    }
    public function delete($id)
    {
        $control = Kategoriler::where('id','=',$id)->count();
        if ($control!=0) {
                $delete = Kategoriler::where('id','=',$id)->delete();
                return redirect()->back();
        }
        else {
            return redirect('/');
        }     
    }
}
