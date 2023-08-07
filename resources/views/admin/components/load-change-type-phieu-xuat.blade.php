
@if($type == 2)
<div class="form-group">
    <label for="">Tên đại lý</label>
    <br>
    <select class="form-control custom-select select-2-init" name="agency" required="">
        <option value="">--- Chọn đại lý ---</option>
        @if(isset($agency) && $agency->count()>0 )
        @foreach($agency as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
        @endif
    </select>
</div>
@else
<div class="form-group">
    <label for="">Tên user</label>
    <br>
    <select class="form-control custom-select select-2-init" name="user" required="">
        <option value="">--- Chọn user ---</option>
        @if(isset($user) && $user->count()>0 )
        @foreach($user as $item)
        <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->username }})</option>
        @endforeach
        @endif
    </select>
</div>
@endif