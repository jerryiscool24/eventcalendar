<?php

function daysOfTheWeek()
{
    return ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
}

function currentMonthPeriods()
{
    return \Carbon\CarbonPeriod::create(
        \Carbon\Carbon::now()->startOfMonth(),
        \Carbon\Carbon::now()->endOfMonth()
    );
}