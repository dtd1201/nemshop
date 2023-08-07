<div class="row item">
    <div class="col-lg-3 col-md-12 col-12">
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input 
            type="text"
            class="form-control"
            name="product[{{$index}}][name]"
            value="{{ $product->name }}"
            required=""
            readonly="" 
            >
            <input 
            type="hidden"
            class="form-control product_id"
            value="{{ $index }}"
            required=""
            readonly=""
            >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-12 col-12">
        <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input
            type="text"
            class="form-control"
            name="product[{{$index}}][masp]"
            value="{{ $product->masp }}"
            required=""
            readonly="" 
            >
            @error('masp')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-12 col-12">
        <div class="form-group">
            <label for="">Nhập số lượng sản phẩm</label>
            <input
            type="number"
            class="form-control"
            value="1"
            placeholder="Nhập số lượng sản phẩm"
            name="product[{{$index}}][quantity]"
            required="" 
            >
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-12 col-12">
        <div class="form-group">
            <label for="">Giá nhập</label>
            <input
            type="text"
            class="form-control select_price"
            value="0"
            placeholder="Nhập số lượng sản phẩm"
            required=""
            >
            <input
            type="hidden"
            class="form-control"
            value="0"
            name="product[{{$index}}][cost]"
            >
            @error('cost')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-12 col-12">
        <div class="form-group">
            <label for="">Hạn sử dụng</label>
            <input 
            type="date"
            value="{{ Carbon::now()->addYears(1)->format('Y-m-d') }}" 
            class="form-control @error('han_su_dung') is-invalid @enderror"
            name="product[{{$index}}][han_su_dung]"
            required="">
            @error('han_su_dung')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-1 col-md-12 col-12">
        <div class="form-group">
            <label for="">&nbsp;</label>
            <br>
            <button type="button" class="btn btn-danger remove-product"><i class="fas fa-trash-alt"></i></button>
        </div>
    </div>
</div>