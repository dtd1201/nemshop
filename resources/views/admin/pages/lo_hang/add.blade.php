@extends('admin.layouts.main')
@section('title',"Thêm lô hàng")

@section('content')
<div class="content-wrapper">
   @include('admin.partials.content-header',['name'=>"Lô hàng","key"=>"Thêm lô hàng"])
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               @if(session("alert"))
               <div class="alert alert-success">
                  {{session("alert")}}
               </div>
               @elseif(session('error'))
               <div class="alert alert-warning">
                  {{session("error")}}
               </div>
               @endif
               <form action="{{route('admin.store.storeLoHang')}}" method="POST">
                  @csrf
                  <div class="card card-outline card-primary">
                     <div class="card-header">
                        <h3 class="card-title">
                          Thêm lô hàng
                        </h3>
                     </div>
                     <div class="card-body table-responsive p-3">
                        <div class="form-group">
                            <label for="">Tên lô hàng</label>
                            <input
                               type="text"
                               class="form-control"
                               value="{{ old('name') }}"  name="name"
                               placeholder="Nhập lô hàng VD: 02052023"
                               required
                               >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>
                         <div class="form-group">
                            <label for="">Chú thích</label>
                            <textarea class="form-control" value="{{ old('description') }}"  name="description" placeholder="Nhập chú thích"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary">Chấp nhận</button>
                           <button type="reset" class="btn btn-danger">Làm lại</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('js')

@endsection
