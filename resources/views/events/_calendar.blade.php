<h4 class="border-bottom py-3 mb-0">{{ $currentMonth }}</h4>
@foreach ($periods as $date)
    @php
        $withEvent = false;
        if (isset($event)) {
            if ($date->between($event->from, $event->to) && in_array(strtolower($date->format('D')), $event->days)) {
                $withEvent = true;
            }
        }
    @endphp
    <div class="container-fluid">
        <div class="py-3 border-bottom row {{ $withEvent ? 'bg-success' : '' }}">
            <div class="col-2">
                {{ $date->format('D d') }}
            </div>
            <div class="col-10">
                {{ $withEvent ? $event->name : '' }}
            </div>
        </div>
    </div>
@endforeach