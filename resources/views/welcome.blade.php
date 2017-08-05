@extends('layouts.home')

@section('pageTitle', '360 Product Photography')

@section('content')
<div class="container-fluid main">
    <section id="home">@include('layouts.home.splash')</section>
    <section id="results">@include('layouts.home.getresults')</section>
    <section id="ourwork">@include('layouts.home.ourwork')</section>
    <section id="howwork">@include('layouts.home.howwork')</section>
    <section id="pricing">@include('layouts.home.pricing')</section>
    <section id="contact">@include('layouts.home.enquiry')</section>
    <section id="free">@include('layouts.home.free')</section>
    <section id="gallery">@include('layouts.home.gallery')</section>
</div>
<!--end of main container-->

@endsection