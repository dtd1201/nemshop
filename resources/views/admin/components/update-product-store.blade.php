@if($product_id)
<form  action="{{ route('admin.store.updateQuantityProduct',['id'=> $product_id]) }}"  data-url="{{ route('admin.store.updateQuantityProduct',['id'=> $product_id]) }}" data-ajax="submit" data-id='{{$product_id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <div class="form-group">
        <input type="text"
            class="form-control"
            value="{{ $product_name }}" readonly name="name"
            placeholder="Tên sản phẩm">
    </div>
    <div class="form-group">
        <input type="text"
            class="form-control"
            value="{{ $lo_hang_name }}" readonly name="name_lo_hang"
            placeholder="Tên lô hàng">
    </div>
    <div class="form-group">
        <input type="number" min="1"
            class="form-control"
            value="1" name="quantity"
            placeholder="Nhập số lượng" required>
    </div>
    <button type="submit" class="form-control btn-info" name="submit">Gửi thông tin</button>
</form>
@endif