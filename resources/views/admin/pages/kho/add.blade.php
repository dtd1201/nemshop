@extends('admin.layouts.main')
@section('title',"Nhập kho")

@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>"Kho","key"=>"Nhập kho"])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">
                    @if(session("alert"))
                    <div class="alert alert-success">
                        {{session("alert")}}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                    @endif
                    
                    <div class="card card-outline card-primary">
                        <div class="card-header d-flex" style="justify-content: space-between;">
                            <h3 class="card-title">
                                Nhập kho
                            </h3>
                            <form action="{{route('admin.store.importKhoHang')}}" class="form-inline" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" style="max-width: 250px">
                                    <input type="file" class="form-control-file" name="fileExcel" accept=".xlsx" required>
                                  </div>
                                <input type="submit" value="Import Execel" class=" btn btn-info ml-1">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <form id="form-add-product" action="{{route('admin.store.storeNhapKhoHang')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="">Tên lô hàng</label>
                                            <input type="text"
                                            class="form-control"
                                            value="{{ old('name_lo_hang') }}"  name="name_lo_hang"
                                            placeholder="Nhập tên lô hàng mới"
                                            required="" 
                                            >
                                            @error('name_lo_hang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label>
                                            <br>
                                            <select id="product_id" class="form-control input-product custom-select select-2-init @error('name')
                                                is-invalid
                                                @enderror">
                                                <option value="">--- Chọn sản phẩm ---</option>
                                                @if(isset($product) && $product->count()>0 )
                                                @foreach($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->masp }})</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label>
                                            <br>
                                            <button id="addProduct" type="button" class="btn btn-primary">Thêm sản phẩm <i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="loadListProduct">
                                    
                                </div>

                                <div class="form-group">
                                    <button id="button-submit" type="button" class="btn btn-primary">Chấp nhận</button>
                                    <button id="button-reset" type="reset" class="btn btn-danger">Làm lại</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
    var arrayProduct = [];
    $(document).on('click', '#addProduct', function () {
        event.preventDefault();
        let id_prod = $('#product_id').val();
        id_prod = parseInt(id_prod);
        checkNumber = Number.isInteger(id_prod);
        console.log(id_prod);
        
        if (arrayProduct.length !== 0) {
            const check = checkUnique(arrayProduct, id_prod);
            if (check) {
                alert("Không thể nhập sản phẩm trùng nhau!");
                return;
            }
        }
        
        let urlRequest = "{{ route('admin.store.addProduct') }}";
        if(id_prod != '' && checkNumber === true){
            
            arrayProduct.push(id_prod);
            console.log(arrayProduct);
            
            $.ajax({
                type: "GET",
                url: urlRequest,
                data:{
                    id_prod:id_prod, 
                },
                dataType: "json",
                success: function (response) {
                    if (response.code == 200) {
                        $("#loadListProduct").append(response.html);
                        $('.select_price').number( true, 0,'.',',' );
                        $('.select_price').on('change',function(){ 
                            let price_show = $(this).val();
                            $(this).next().val(price_show);
                        });
                    }
                },
            });
        } else {
            alert("Bạn chưa chọn sản phẩm!");
        }
    });

    $(document).on('click', '.remove-product', function () {
        $(this).parents('.item').remove();
        let product_id = $(this).parents('.item').find('.product_id').val();
        product_id = parseInt(product_id);
        arrayProduct = arrayProduct.filter(item => item !== product_id);
        console.log(arrayProduct);
    });

    $("#button-submit").click(function() {
        let name_lo_hang = $('input[name = name_lo_hang]').val();
        if (name_lo_hang == '') {
            alert("Bạn chưa nhập tên lô!");
        } else if (arrayProduct.length == 0) {
            alert("Bạn chưa chọn sản phẩm!");
        } else if (array_is_unique(arrayProduct, arrayProduct.length) === 1){
            alert("Không thể nhập sản phẩm trùng nhau!");
        } else {
            $("#form-add-product").submit();
        }
    });

    $("#button-reset").click(function() {
        arrayProduct = [];
        $("#loadListProduct").find('.item').remove();
    });

    function checkUnique(array, id) {
        console.log('array', array);
        console.log('id', id);
        let check = false;
        array.filter(item => {
            if (item == id) {
                check = true;
            }
        });
        console.log('check', check);
        return check;
    }

    function array_is_unique( array, size){
    //flag =  1 =>  tồn tại phần tử trùng nhau
    //flag =  0 =>  không tồn tại phần tử trùng nhau
    let flag = 0;
    for (let i = 0; i < size - 1; ++i) {
        for (let j = i + 1; j < size; ++j) {
            if (array[i] == array[j]) {
                /*Tìm thấy 1 phần tử trùng là đủ và dừng vòng lặp*/
                flag = 1;
                break;
            }
        }
    }

    return flag;
}

</script>

@endsection
