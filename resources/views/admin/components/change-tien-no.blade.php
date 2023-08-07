@if($data)
<form  action="{{ route('admin.transaction.storeChangeTienNo',['id'=> $data->id]) }}"  data-url="{{ route('admin.transaction.storeChangeTienNo',['id'=> $data->id]) }}" data-ajax="submit" data-id='{{$data->id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <div class="form-group">
        <label>Tiền nợ</label>
        <input type="text" class="form-control" id="price" value="{{ $data->tien_no }}" placeholder="Nhập giá">
        <input type="hidden" class="form-control" id="price_hide" value="{{ $data->tien_no }}" name="tien_no">
    </div>
    <button type="submit" class="form-control btn-info" name="submit">Cập nhật</button>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#price').number( true, 0,'.',',' );
        let price_show = $('#price').val();
        let price_hide = $('#price_hide').val(price_show);
    });

    $('#price').on('change',function(){ 
        let price_show = $('#price').val();
        let price_hide = $('#price_hide').val(price_show);
    });
</script>
@endif