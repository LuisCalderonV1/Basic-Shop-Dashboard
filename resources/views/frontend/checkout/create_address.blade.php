<?php use Illuminate\Support\Facades\Auth; ?>
@extends('layouts.frontend')
@section('content')
<div>
    <h2>New Shipping Address</h2>
</div>
@include('frontend.checkout._create_address_form')
@endsection