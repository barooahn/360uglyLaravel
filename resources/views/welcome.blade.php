@extends('layouts.home')

@section('pageTitle', '360 Product Photography')

@section('content')
    <div class="container-fluid main">
            <section id="home">
             @include('layouts.home.splash')
            </section>
            <section id="ourwork">
            @include('layouts.home.ourwork')
            </section>
            <section id="results">
            @include('layouts.home.getresults')
            </section>
            <section id="howwork">
            @include('layouts.home.howwork')
            </section>
            <section id="pricing">
            @include('layouts.home.pricing')
            </section>
            <section id="contact">
            @include('layouts.home.enquiry')
            </section>
        <!--end of main container-->
        <!-- Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li>
                                <a href="/#ourwork">
                                    Our Work
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#results">
                                    Get Results
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#howwork">
                                    How It Works
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#pricing">
                                    Pricing
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#contact">
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted small">
                            Copyright © 360Ugly {{ date("Y") }}. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>

@endsection