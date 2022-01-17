<?php use Illuminate\Support\Facades\Auth; ?>
@extends('layouts.frontend')
@section('content')
<div>
    <h2>Update Shipping Address</h2>
</div>
@include('frontend.checkout._update_address_form')
@endsection