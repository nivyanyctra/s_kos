@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <!-- Hero Section -->
        <div class="text-center py-5 mb-4 rounded-4 position-relative overflow-hidden"
            style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
                <svg viewBox="0 0 100 100" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                    <path d="M0,0 L100,0 L100,100 Z" fill="url(#gradient)"></path>
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6c63ff" stop-opacity="0.3"></stop>
                            <stop offset="100%" stop-color="#4dabf7" stop-opacity="0.1"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="position-relative z-index-1">
                <h1 class="display-3 fw-bold mb-3 text-primary">About <span class="text-dark">{{ $setting->name }}</span>
                </h1>
                <p class="lead text-muted mb-4 px-md-5">
                    Where comfort meets community - your home away from home since 2018
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-lg px-4 py-3 fw-bold rounded-3 shadow">
                        <i class="bi bi-house-door me-2"></i>View Our Rooms
                    </a>
                    <a href="#contact" class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold rounded-3">
                        <i class="bi bi-chat-dots me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>

        <!-- Story Section -->
        <div class="row align-items-center mb-5 g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="ratio ratio-16x9 rounded-4 shadow overflow-hidden">
                        <img src="{{ asset('images/about-story.jpg') }}" class="w-100 h-100 object-fit-cover"
                            alt="Our Story" style="object-position: center 30%;">
                    </div>
                    <div class="position-absolute bottom-0 end-0 m-3 bg-white rounded-3 p-3 shadow-sm border">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-award fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Trusted Since 2018</h6>
                                <small class="text-muted">Over 500 happy tenants</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="lead text-muted">Founded with a vision to redefine boarding house living in Indonesia</p>
                <p class="fs-5 mb-4">
                    KostKita began in 2018 when our founder, Budi Santoso, noticed the lack of quality, affordable boarding
                    options for students and young professionals in Jakarta. What started as a single building with 10 rooms
                    has grown into a trusted community with multiple locations across the city.
                </p>
                <p class="fs-5 mb-4">
                    We believe that everyone deserves a comfortable, safe, and inspiring place to call home. Our commitment
                    to quality, cleanliness, and community has made us the preferred choice for thousands of tenants over
                    the years.
                </p>
            </div>
        </div>

        <!-- Values Section -->
        <div class="bg-light py-5 rounded-4 mb-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Our Core Values</h2>
                    <p class="text-muted mx-auto" style="max-width: 700px;">
                        Principles that guide everything we do at {{ $setting->name }}
                    </p>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ([['icon' => 'bi-shield-check', 'title' => 'Safety First', 'desc' => '24/7 security systems and regular safety audits ensure your peace of mind.'], ['icon' => 'bi-heart-pulse', 'title' => 'Community Care', 'desc' => 'We foster a supportive environment where tenants build meaningful connections.'], ['icon' => 'bi-lightbulb', 'title' => 'Innovation', 'desc' => 'Continuously improving facilities and services using the latest technology.'], ['icon' => 'bi-hand-thumbs-up', 'title' => 'Respect', 'desc' => 'We value diversity and treat every tenant with dignity and understanding.']] as $value)
                        <div class="col">
                            <div class="card border-0 h-100 shadow-none text-center p-4 value-card">
                                <div class="mb-4">
                                    <div class="d-inline-block p-4 bg-light-primary rounded-circle mb-3">
                                        <i class="{{ $value['icon'] }} fs-1 text-primary"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-3">{{ $value['title'] }}</h4>
                                <p class="text-muted">{{ $value['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">What Our Tenants Say</h2>
                <p class="text-muted mx-auto" style="max-width: 700px;">
                    Real experiences from our valued community members
                </p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 shadow">
                    @foreach ([['name' => 'Rina Permata', 'role' => 'Student @ UI', 'text' => 'Living at KostKita has been a game-changer for my studies. The quiet study areas and fast internet helped me maintain my GPA while enjoying a vibrant community.', 'img' => 'tenant-1.jpg'], ['name' => 'Ahmad Fauzi', 'role' => 'Software Engineer', 'text' => 'As a remote worker, I need reliable facilities. KostKita\'s co-working space, backup power, and high-speed internet make it the perfect place to live and work.', 'img' => 'tenant-2.jpg'], ['name' => 'Maya Sari', 'role' => 'Medical Intern', 'text' => 'The 24/7 security and cleanliness standards give me peace of mind after long hospital shifts. The community events also helped me make friends in a new city.', 'img' => 'tenant-3.jpg']] as $index => $testimonial)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} bg-white p-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="text-center">
                                        <img src="{{ asset('images/' . $testimonial['img']) }}" class="rounded-circle mb-3"
                                            alt="{{ $testimonial['name'] }}"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                        <h5 class="fw-bold mb-0">{{ $testimonial['name'] }}</h5>
                                        <p class="text-muted mb-0">{{ $testimonial['role'] }}</p>
                                        <div class="d-flex justify-content-center mt-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative ps-md-4">
                                        <div class="position-absolute top-0 start-0 d-none d-md-block">
                                            <i class="bi bi-quote text-primary" style="font-size: 3rem; opacity: 0.2;"></i>
                                        </div>
                                        <p class="fs-4 fst-italic mb-0 ps-md-5" style="color: #495057;">
                                            "{{ $testimonial['text'] }}"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="card border-0 rounded-4 overflow-hidden shadow-lg mb-5" id="contact">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="location-map-container h-100 w-100">
                        {!! $setting->location_map !!}
                    </div>
                </div>
                <div class="col-lg-6 bg-primary text-white">
                    <div class="p-5 d-flex flex-column justify-content-center h-100">
                        <h2 class="fw-bold mb-4">Join Our Community</h2>
                        <p class="lead mb-4 opacity-90">
                            Have questions or ready to book your new home? Our team is here to help you every step of the
                            way.
                        </p>
                        <ul class="list-unstyled mb-5">
                            <li class="d-flex mb-3">
                                <i class="bi bi-geo-alt fs-4 me-3 mt-1"></i>
                                <span>{{ $setting->address }}</span>
                            </li>
                            <li class="d-flex mb-3">
                                <i class="bi bi-telephone fs-4 me-3 mt-1"></i>
                                <span>{{ $setting->phone }}</span>
                            </li>
                            <li class="d-flex mb-3">
                                <i class="bi bi-envelope fs-4 me-3 mt-1"></i>
                                <span>{{ $setting->email }}</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-clock fs-4 me-3 mt-1"></i>
                                <span>Mon - Fri: 8AM - 8PM | Sat - Sun: 9AM - 5PM</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <a href="{{ route('contact') }}"
                                class="btn btn-light btn-lg px-4 py-3 fw-bold rounded-3 shadow">
                                <i class="bi bi-chat-dots me-2"></i>Contact Us Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        :root {
            --primary: #6c63ff;
            --light-primary: #f0f0ff;
            --warning: #ffc107;
            --light-warning: #fff8e1;
        }

        .bg-light-primary {
            background-color: var(--light-primary) !important;
        }

        .bg-light-warning {
            background-color: var(--light-warning) !important;
        }

        .team-card {
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .value-card {
            transition: all 0.3s ease;
            border-radius: 20px !important;
        }

        .value-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
            background-color: white !important;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: none !important;
            width: 40px !important;
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 1.2rem !important;
            color: white !important;
        }

        @media (max-width: 992px) {
            .carousel-item {
                padding: 2rem !important;
            }
        }

        @media (max-width: 768px) {
            .display-3 {
                font-size: 2.5rem !important;
            }

            .lead {
                font-size: 1.1rem !important;
            }
        }

        .location-map-container iframe {
            width: 100% !important;
            height: 100% !important;
            border: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize carousel
            const testimonialCarousel = new bootstrap.Carousel(document.getElementById('testimonialCarousel'), {
                interval: 8000,
                pause: 'hover'
            });

            // Animate value cards on scroll
            const valueCards = document.querySelectorAll('.value-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            valueCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
@endpush
