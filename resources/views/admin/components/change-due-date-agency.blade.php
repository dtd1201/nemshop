@if($data)
<form  action="{{ route('admin.agency.storeChangeDueDateAgency',['id'=> $data->id]) }}"  data-url="{{ route('admin.agency.storeChangeDueDateAgency',['id'=> $data->id]) }}" data-ajax="submit" data-id='{{$data->id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <div class="form-group">
        <label>Ngày đáo hạn</label>
        <input type="datetime-local" class="form-control" placeholder="Ngày đáo hạn" name="due_date" value="{{ $data->due_date }}">
    </div>
    <button type="submit" class="form-control btn-info" name="submit">Cập nhật</button>
</form>
@endif