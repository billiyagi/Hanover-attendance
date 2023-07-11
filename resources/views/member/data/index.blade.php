@extends('layouts.main.member')

@section('title', 'Present')

@section('content')

@php
    $currentMonth = date('F');
    $currentYear = date('Y');
@endphp

<div class="month">
  <ul>
    <li>{{ $currentMonth }}<br><span style="font-size:18px">{{ $currentYear }}</span></li>
  </ul>
</div>


<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  @foreach($days as $day)
    @php
      $hasAttendance = false;
      $attendanceData = $day['attendanceData'];

      if ($attendanceData) {
        $hasAttendance = $attendanceData->present_in && $attendanceData->present_out;
      }
    @endphp
    <li class="{{ $hasAttendance ? 'green' : ($attendanceData ? 'red' : '') }}" data-toggle="modal" data-target="#attendanceModal">{{ $day['day'] }}</li>
  @endforeach
</ul>

<div class="mx-8 my-3">
  <p class="mb-4">Keterangan</p>
  <p>
    <span class="rounded-full w-4 h-4 bg-green-500 inline-block mr-4"></span>
    Hadir
  </p>
  <p>
    <span class="rounded-full w-4 h-4 bg-red-500 inline-block mr-4"></span>
    Alpha
  </p>
</div>
@endsection