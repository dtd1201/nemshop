@if($user)
<form  action="{{ route('admin.user_frontend.storeMinusPoint',['id'=> $user->id]) }}"  data-url="{{ route('admin.user_frontend.storeMinusPoint',['id'=> $user->id]) }}" data-ajax="submit" data-id='{{$user->id}}' data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
    @csrf
    <div class="form-group">
        <input type="text"
            class="form-control"
            value="{{ $user->username }}" readonly name="username">
    </div>
    <div class="form-group">
        <input type="number" min="1"
            class="form-control"
            value="1" name="point"
            placeholder="Nhập số điểm" required>
    </div>
    <div class="form-group">
        <label>Lý do</label>
        <input type="text"
            class="form-control"
            name="content"
            placeholder="Lý do">
    </div>
    <button type="submit" class="form-control btn-info" name="submit">Gửi thông tin</button>
</form>
@endif