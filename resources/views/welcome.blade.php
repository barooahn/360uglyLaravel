@extends('layouts.home')

@section('pageTitle', '360 Product Photography')

@section('content')

    <section id="home">@include('layouts.home.splash')</section>
    <section id="results">@include('layouts.home.getresults')</section>
    <section id="ourwork">@include('layouts.home.ourwork')</section>
    <section id="howwork">@include('layouts.home.howwork')</section>
    <section id="pricing">@include('layouts.home.pricing')</section>
    <section id="enquiry">@include('layouts.home.enquiry')</section>
    <section id="enquiry2">@include('layouts.home.enquiry2')</section>
    <section id="free">@include('layouts.home.free')</section>
    <section id="gallery">@include('layouts.home.gallery')</section>
    
@endsection