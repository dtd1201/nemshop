@if($data->products()->count()>0)
    <a class="btn btn-sm {{ $data->status==1 ? 'btn-success': 'btn-warning lb-change-status-phieu-xuat' }}" data-value="{{ $data->status }}"  style="width:88px;">{{ $data->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</a>
@else
    <a class="btn btn-sm {{ $data->status==1 ? 'btn-success': 'btn-warning lb-import-product' }}" data-value="{{ $data->status }}"  style="width:88px;">{{ $data->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</a>
@endif
