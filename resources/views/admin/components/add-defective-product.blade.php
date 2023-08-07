@if($data)
<form  action="{{ route('admin.store.storeDefectiveProduct',['id'=> $data->id]) }}"  data-url="{{ route('admin.store.storeDefectiveProduct',['id'=> $data->id]) }}" data-ajax="submit" data-id='{{$data->id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <div class="form-group">
        <input type="text"
            class="form-control"
            value="{{ $data->name }}" readonly name="name"
            placeholder="Tên sản phẩm">
    </div>
    <div class="form-group">
        <input type="text"
            class="form-control"
            value="{{ $data->lohang->name }}" readonly name="name_lo_hang"
            placeholder="Tên lô hàng">
    </div>
    <div class="form-group">
        <input type="number" min="1"
            class="form-control"
            value="1" name="quantity"
            placeholder="Nhập số lượng" required>
    </div>
    <div class="form-group">
        <label>Lý do</label>
        <input type="text"
            class="form-control"
            name="note"
            placeholder="Lý do">
    </div>
    <button type="submit" class="form-control btn-info" name="submit">Gửi thông tin</button>
</form>
@endif