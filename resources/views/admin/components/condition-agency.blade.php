@foreach ($listCondition as $condition)
    @if ($condition['condition']==$dataCondition->condition)
        @if($dataCondition->condition == 3)
        <div data-condition="{{ $dataCondition->condition }}" class="badge badges-@if ($dataCondition->condition<0)danger @else{{ $dataCondition->condition }}@endif">
            {{ $condition['name'] }}
        </div>
        @else
        <span data-condition="{{ $dataCondition->condition }}" class="badge badges-@if ($dataCondition->condition<0)danger @else{{ $dataCondition->condition }}@endif">
            {{ $condition['name'] }}
        </span>
        @endif
    @endif
@endforeach

