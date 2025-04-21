@extends('layouts/main')

@section('container')
    <!-- Hero Section -->
    <section class="about-hero position-relative">
        <div class="container-fluid p-0">
            <div class="hero-overlay d-flex align-items-center justify-content-center text-center" style="background-image: url('{{ asset('img/background_about.png') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
                <div style="background-color: rgba(0,0,0,0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
                <div class="position-relative" style="z-index: 2;">
                    <h1 class="display-4 fw-bold text-white mb-2">About</h1>
                    <h2 class="display-3 fw-bold text-white">Sushe</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title mb-4">Our Story</h2>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/our_story.png') }}" alt="Our Story" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Sushi Gallery Section -->
    <section class="sushi-gallery py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="gallery-item rounded overflow-hidden shadow-sm">
                        <img src="{{ asset('img/sushi_1.png') }}" alt="Sushi Gallery" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="gallery-item rounded overflow-hidden shadow-sm">
                        <img src="{{ asset('img/sushi_2.png') }}" alt="Sushi Gallery" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="gallery-item rounded overflow-hidden shadow-sm">
                        <img src="{{ asset('img/sushi_3.png') }}" alt="Sushi Gallery" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="gallery-item rounded overflow-hidden shadow-sm">
                        <img src="{{ asset('img/sushi_4.png') }}" alt="Sushi Gallery" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section class="team-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title mb-3">Our Team</h2>
                    <p class="team-subtitle">
                        Meet the passionate individuals who drive our vision forward.
                    </p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                {{-- Member 1 --}}
                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                    <div class="team-card bg-white rounded shadow-sm p-3">
                        <div class="team-image mb-3">
                            <img src="{{ asset('img/yansu.jpg') }}" alt="Team Member" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-center">
                            <h5 class="member-name fw-bold">Ryan S.</h5>
                            <p class="member-position text-muted small">160422024</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/yan_su28/" class="text-decoration-none"><i class="bi bi-instagram"></i> yan_su28</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 2 -->
                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                    <div class="team-card bg-white rounded shadow-sm p-3">
                        <div class="team-image mb-3">
                            <img src="{{ asset('img/nadya.jpg') }}" alt="Team Member" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-center">
                            <h5 class="member-name fw-bold">Nadya E.</h5>
                            <p class="member-position text-muted small">160722011</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/nadya_eliana/" class="text-decoration-none"><i class="bi bi-instagram"></i> nadya_eliana</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 3 -->
                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                    <div class="team-card bg-white rounded shadow-sm p-3">
                        <div class="team-image mb-3">
                            <img src="{{ asset('img/dzaki.jpg') }}" alt="Team Member" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-center">
                            <h5 class="member-name fw-bold">M. Dzakiy</h5>
                            <p class="member-position text-muted small">160722023</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/dzakiy_kiyy/" class="text-decoration-none"><i class="bi bi-instagram"></i> dzakiy_kiyy</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 4 -->
                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                    <div class="team-card bg-white rounded shadow-sm p-3">
                        <div class="team-image mb-3">
                            <img src="{{ asset('img/arvin.png') }}" alt="Team Member" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-center">
                            <h5 class="member-name fw-bold">Arvin T.</h5>
                            <p class="member-position text-muted small">160822003</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/arvfin/" class="text-decoration-none"><i class="bi bi-instagram"></i> arvfin</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Member 5 -->
                <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                    <div class="team-card bg-white rounded shadow-sm p-3">
                        <div class="team-image mb-3">
                            <img src="{{ asset('img/michelle.png') }}" alt="Team Member" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-center">
                            <h5 class="member-name fw-bold">Michelle A.</h5>
                            <p class="member-position text-muted small">160822008</p>
                            <div class="social-icons">
                                <a href="https://www.instagram.com/_michelleee_.7/" class="text-decoration-none"><i class="bi bi-instagram"></i> _michelleee_.7</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection