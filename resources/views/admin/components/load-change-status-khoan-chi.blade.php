@can('khoan-chi-active')
<a  class="btn btn-sm {{ $data->status==1 ? 'btn-success': 'btn-warning lb-change-status-khoan-chi' }}" data-value="{{ $data->status }}"  style="width:88px;">{{ $data->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</a>
@else
<a  class="btn btn-sm {{ $data->status==1 ? 'btn-success': 'btn-warning' }}" data-value="{{ $data->status }}"  style="width:88px;">{{ $data->status == 1 ? 'Đã duyệt' : 'Chờ duyệt' }}</a>
@endcan