@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Kalender Cuti</h1>
</div>
<div class="row">
  <div class="col">
    <div class="card shadow p-2">
        <div id='calendar'></div>
    </div>
  </div>
</div>
@endsection