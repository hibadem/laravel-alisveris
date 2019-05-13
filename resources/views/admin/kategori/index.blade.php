@extends('layouts.admin')
@section('content')
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <a href="{{route('admin.kategori.create')}}" class="btn btn-success">Yeni Kategori Ekle</a>
               <div class="card">
                   <div class="card-header" data-background-color="green">
                       <h4 class="title">Kategoriler</h4>
                       <p class="category">Burada eklenen kategoriler listesini bulabilirsiniz.</p>
                   </div>
                   <div class="card-content table-responsive">
                       <table class="table">
                           <thead class="text-primary">
                               <tr><th>İsim</th>
                               <th>Düzenle</th>
                               <th>Sil</th>
                               
                           </tr></thead>
                           <tbody>
                          
                           @foreach ($data as $key=>$value)                                                           
                               <tr>
                                   <td>{{$value['name']}}</td>
                                   <td><a href="{{route('admin.kategori.edit',['id'=>$value['id']])}}">Düzenle</td>                                   
                                   <td><a href="{{route('admin.kategori.delete',['id'=>$value['id']])}}">Sil</td>
                               </tr>
                              @endforeach
                              
                           </tbody>                            
                       </table>
                       {{$data->links()}}
                   </div>
               </div>
           </div>
           
       </div>
   </div>
</div>
@endsection