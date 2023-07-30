@extends('layouts.main.member')

@section('title', 'Present')

@section('content')

@php
    // Ubah bagian ini untuk mengambil bulan dan tahun dari parameter query, jika ada
    $currentMonth = isset($_GET['month']) ? $_GET['month'] : date('m');
    $currentYear = isset($_GET['year']) ? $_GET['year'] : date('Y');
    
    // Ubah ini untuk mendapatkan nama bulan berdasarkan format angka bulan
    $currentMonthName = date('F', strtotime("{$currentYear}-{$currentMonth}-01"));

    // Hitung bulan sebelumnya dan bulan berikutnya
    $prevDate = date('Y-m', strtotime("{$currentYear}-{$currentMonth}-01 -1 month"));
    $nextDate = date('Y-m', strtotime("{$currentYear}-{$currentMonth}-01 +1 month"));
    $prevMonth = date('m', strtotime($prevDate));
    $prevYear = date('Y', strtotime($prevDate));
    $nextMonth = date('m', strtotime($nextDate));
    $nextYear = date('Y', strtotime($nextDate));
@endphp

<div class="month">
  <ul>
    <li>
      <a href="{{ url('/member/data?month=' . $prevMonth . '&year=' . $prevYear) }}" class="prev">&lt;</a>
      {{ $currentMonthName }}<br><span>{{ $currentYear }}</span>
      <a href="{{ url('/member/data?month=' . $nextMonth . '&year=' . $nextYear) }}" class="next">&gt;</a>
    </li>
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









<!-- <div class="month">
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
</div> -->
@endsection