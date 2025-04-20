@extends('layouts/main')

@section('title')
About
@endsection

@section('container')
    <section class="about-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="about-hero-title">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- About Introduction Section -->
    <section class="about-intro py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="small-title">ABOUT US</div>
                    <h2 class="section-title">
                        <span class="highlight-text">Introduction</span> To Best Digital Agency!
                    </h2>
                </div>
            </div>

            <!-- Features Row -->
            <div class="row mt-5">
                <!-- Feature 1 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon bg-red">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h4 class="feature-title">Best Price Guaranteed</h4>
                        <p class="feature-text">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon bg-dark">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h4 class="feature-title">Finance Analysis</h4>
                        <p class="feature-text">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon bg-red">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4 class="feature-title">Professional Team</h4>
                        <p class="feature-text">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section class="team-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <div class="team-badge">OUR TEAM</div>
                    <h2 class="team-title">
                        <span class="highlight-text">Team</span> Members
                    </h2>
                    <p class="team-subtitle">
                        Meet the passionate individuals who drive our vision forward.
                    </p>
                </div>
            </div>
            
            <div class="row">
                {{-- Member 1 --}}
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('img/nadya.jpg') }}" alt="Team Member" class="img-fluid">
                        </div>
                        <div class="team-info">
                            <br>
                            <h4 class="member-name">Nadya Eliana</h4>
                            <p class="member-position">160722011 | UI/UX Designer</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/nadya_eliana/"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('img/arvin.png') }}" alt="Team Member" class="img-fluid">
                        </div>
                        <br>
                        <div class="team-info">
                            <h4 class="member-name">Arvin Tantoyo</h4>
                            <p class="member-position">160822003 | UI/UX Designer</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/arvfin/"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('img/michelle.png') }}" alt="Team Member" class="img-fluid">
                        </div>
                        <br>
                        <div class="team-info">
                            <h4 class="member-name">Michelle Angelina</h4>
                            <p class="member-position">160822008 | Back End</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/_michelleee_.7/"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('img/dzaki.jpg') }}" alt="Team Member" class="img-fluid" >
                        </div>
                        <div class="team-info">
                            <br>
                            <h4 class="member-name">Muhammad Dzakiy</h4>
                            <p class="member-position">160722023 | Back</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/dzakiy_kiyy/"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
@endsection