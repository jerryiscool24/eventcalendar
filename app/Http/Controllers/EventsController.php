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
        $event= Event::latest()->first();
        $currentMonth = Carbon::now()->format('M Y');
        $periods = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());

        return view('events.index', compact(
            'periods', 'event', 'currentMonth'
        ));
    }

    /**
     * Store event
     *
     * @return view
     */
    public function store()
    {
        Event::create($this->validateAttribute());

        return back()->with('success', 'Event successfully saved');
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
