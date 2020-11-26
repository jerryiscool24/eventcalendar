<form action="/calendar" method="POST">
    @csrf

    <div class="form-group">
        <label for="event">Event</label>
        <input type="text" name="name" class="form-control" id="event" placeholder="Event name" value="{{ old('name') }}">
        @error('event')
            <p class="text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="from">From</label>
                <input type="text" name="from" class="form-control " id="from" value="{{ old('from') }}" />
                @error('from_date')
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="to">To</label>
                <input type="text" name="to" class="form-control" id="to" value="{{ old('to') }}" />
                @error('to_date')
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        @foreach (daysOfTheWeek() as $day)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{ $day }}" name="days[]" value="{{ $day }}" {{ (is_array(old('days')) && in_array($day, old('days'))) ? 'checked': '' }}>
                <label class="form-check-label" for="{{ $day }}">{{ ucwords($day) }}</label>
            </div>
        @endforeach
        @error('days')
            <p class="text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-block">Save</button>
</form>