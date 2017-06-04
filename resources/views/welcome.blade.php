@extends('layouts.home')

@section('content')
    <div class="container-fluid">
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
                                <a href="/#our-work">
                                    Our Work
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#results">
                                    Get Results
                                </a>
                            </li>
                            
                            <li>
                                <a href="/#how-works">
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
                            Copyright © Zaberweb {{ date("Y") }}. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="360Modal" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                </span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">
                                Spin with mouse or touch

                            <a class="icon-size" data-dismiss="modal">
                                <img src="images/icons/close.png">
                            </a>
                            <a class="full-screen icon-size">
                                <img src="images/icons/005-arrows.png">
                            </a>
                            <a class="zoom icon-size">
                                <img src="images/icons/003-magnifying-glass.png">
                            </a>
                                                        </h4>
                        </div>
                        <div class="modal-body">
                            <div class="loader">
                                <div class="spinner">
                                    <div class="dot1">
                                    </div>
                                    <div class="dot2">
                                    </div>
                                </div>
                                <p>
                                    Loading
                                </p>
                            </div>
                            <div class="modal-spin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection