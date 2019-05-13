<?php

namespace App\Http\Controllers\admin\kitap;
use App\Kitaplar;
use App\Yazarlar;
use App\YayinEvi;
use App\Helper\mHelper;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoriler;

class indexController extends Controller
{
    public function index(){
        $data = Kitaplar::paginate(10);
        return view('admin.kitap.index',['data'=>$data]);
    }
    public function create()
    {
        $yazar = Yazarlar::all();
        $yayinevi = Yayinevi::all();
        $kategori = Kategoriler::all();

        return view('admin.kitap.create',['yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
    }
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = Kitaplar::create($all);
        if ($insert) {
            return redirect()->back()->with('status','Kitap ekleme işlemi başarıyla tamamlandı.');
        }
        else{
            return redirect()->back()->with('status','Kitap ekleme işlemi başarısız oldu.');
        }
    }
    public function edit($id){
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        $kategori = Kategoriler::all();

        $control = Kitaplar::where('id','=',$id)->count();
        if ($control!=0) {
            $data = Kitaplar::where('id','=',$id)->get();
            return view('admin.kitap.edit',['kategori'=>$kategori,'data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi]);
        }
        else{
            return redirect('/');
        }
    }
    public function update(Request $request)
    {   
        $id = $request->route('id');
        $control = Kitaplar::where('id','=',$id)->count();
        if ($control!=0) {
           $data = Kitaplar::where('id','=',$id)->get();
           $all = $request->except('_token');
           $all['selflink'] = mHelper::permalink($all['name']);
           
           $update = Kitaplar::where('id','=',$id)->update($all);
           if ($update) {
               return redirect()->back()->with('status','Kitap güncellendi.');
           }
           else{
               return redirect()->back()->with('status','Kitap güncelleme başarısız oldu.');
           }
        }
        else{
            return redirect('/');
        }
        
    }
    public function delete($id)
    {
        
        $control = Kitaplar::where('id','=',$id)->count();
        if ($control!=0){
            $data = Kitaplar::where('id','=',$id)->get();
            File::delete('public/'.$data[0]['image']);
            Kitaplar::where('id','=',$id)->delete();
            return redirect()->back();
        }
          
    }

}
