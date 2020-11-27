<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Show calendar
     *
     * @return view
     */
    public function index()
    {
        $currentMonth = Carbon::now()->format('M Y');
        return view('events.index', compact('currentMonth'));
    }

    /**
     * Store event
     *
     * @return view
     */
    public function store()
    {
        $attributes = $this->validateAttribute();

        Event::create($attributes);

        return response()->json([
            'status' => 200,
            'message' => 'Event successfully saved',
            'calendar' => view('events._calendar', ['event' => (object) $attributes])->render()
        ]);
    }

    /**
     * Validate attribute
     *
     * @return array
     */
    protected function validateAttribute()
    {
        return request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'from' => ['required', 'date', 'date_format:Y-m-d', 'before:to'],
            'to'   => ['required', 'date', 'date_format:Y-m-d', 'after:from'],
            'days'    => ['required']
        ]);
    }
}
