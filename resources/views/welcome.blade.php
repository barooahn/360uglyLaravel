@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <section id="home">
            </section>
             @include('layouts.home.splash')
            <section id="our-work">
            </section>
            @include('layouts.home.our-work')
            <section id="results">
            </section>
            @include('layouts.home.get-results')
            <section id="how-work">
            </section>
            @include('layouts.home.how-work')
            <section id="pricing">
            </section>
            @include('layouts.home.pricing')
            <section id="contact">
            </section>
            @include('layouts.home.contact')
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
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-primary full-screen" type="button">
                                Full Screen
                            </button>
                        </div>
                    </div>
                </div>
            </div>

@endsection