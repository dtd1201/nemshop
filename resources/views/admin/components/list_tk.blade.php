@if($data)
<label class="control-label" for="">Tài khoản</label>
<select name="user_id" class="form-control custom-select select-user">
    <option value="">-- Chọn tài khoản --</option>
    @if(isset($data) && $data->count()>0 )
    @foreach($data as $item)
    <option value="{{ $item->id }}">{{ $item->name }} @if($item->username) ({{ $item->username }}) @endif</option>
    @endforeach
    @endif
</select>
@endif