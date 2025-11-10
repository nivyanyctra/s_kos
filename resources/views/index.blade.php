@extends('layouts.app')
@section('content')
    <!-- Hero Section with Video Background -->
    <section class="position-relative vh-100 d-flex align-items-center overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <video class="w-100 h-100 object-fit-cover" autoplay muted loop playsinline>
                <source src="{{ asset('videos/kost-hero.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        </div>

        <div class="container position-relative z-index-1 text-center text-white py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-3 fw-bold mb-4" data-aos="fade-up">
                        Your Comfortable <span class="text-primary">Home Away From Home</span>
                    </h1>
                    <p class="lead mb-5" data-aos="fade-up" data-aos-delay="200">
                        Experience modern living with premium amenities, 24/7 security, and a vibrant community designed for
                        students and young professionals
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('rooms.index') }}"
                            class="btn btn-primary btn-lg px-5 py-3 fw-bold rounded-3 shadow-lg">
                            <i class="bi bi-house-door me-2"></i>View Rooms
                        </a>
                        <a href="#contact" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold rounded-3">
                            <i class="bi bi-chat-dots me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-absolute bottom-0 start-0 w-100 text-center py-3 bg-dark bg-opacity-50 text-white">
            <a href="#featured-rooms" class="text-white text-decoration-none d-inline-block animate-bounce">
                <i class="bi bi-chevron-down fs-1"></i>
            </a>
        </div>
    </section>

    <!-- Featured Rooms Section -->
    <section id="featured-rooms" class="py-6 bg-light">
        <div class="container">
            <div class="text-center mb-6" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Featured <span class="text-primary">Rooms</span></h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Discover our most popular rooms with modern amenities and prime locations
                </p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($featuredRooms as $room)
                    <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('rooms.show', $room->id) }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 room-card overflow-hidden rounded-4">
                                <div class="position-relative">
                                    <img src="{{ $room->image_path ? asset('storage/' . $room->image_path) : asset('images/room-placeholder.jpg') }}"
                                        class="card-img-top" alt="{{ $room->name }}"
                                        style="height: 250px; object-fit: cover;">

                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge rounded-pill fs-6 p-2 fw-bold
                                    @if ($room->status === 'available') bg-success
                                    @elseif($room->status === 'occupied') bg-danger
                                    @else bg-warning text-dark @endif">
                                        {{ ucfirst($room->status) }}
                                    </span>

                                    @if ($room->is_featured)
                                        <span class="position-absolute top-0 start-0 m-3 badge bg-primary rounded-pill">
                                            <i class="bi bi-star-fill me-1"></i>Featured
                                        </span>
                                    @endif
                                </div>

                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h3 class="h5 fw-bold mb-0">{{ $room->name }}</h3>
                                        <span class="fs-5 fw-bold text-primary">
                                            Rp {{ number_format($room->price, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center text-muted mb-3">
                                        <i class="bi bi-rulers me-2"></i>
                                        <span>{{ $room->size }} m²</span>
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-people me-2"></i>
                                        <span>{{ $room->max_occupancy }} persons</span>
                                    </div>

                                    <p class="card-text text-muted mb-4"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $room->description }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex gap-2">
                                            @foreach ($room->facilities->take(3) as $facility)
                                                <i class="bi bi-{{ $facility->icon ?? 'check2-circle' }} text-primary fs-5"
                                                    title="{{ $facility->name }}"></i>
                                            @endforeach
                                        </div>
                                        <span class="text-primary fw-medium d-flex align-items-center">
                                            View details →
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('rooms.index') }}" class="btn btn-outline-primary btn-lg px-5 py-3 fw-bold rounded-3">
                    View All Rooms <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-6">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <div class="ratio ratio-16x9 rounded-4 shadow overflow-hidden">
                            <img src="{{ asset('images/why-choose-us.jpg') }}" class="w-100 h-100 object-fit-cover"
                                alt="Why Choose Us">
                        </div>
                        <div class="position-absolute bottom-0 end-0 m-4 bg-white rounded-3 p-3 shadow-sm border">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                    style="width: 45px; height: 45px;">
                                    <i class="bi bi-award fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0">100% Satisfaction</h5>
                                    <small class="text-muted">Guaranteed</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="display-5 fw-bold mb-4">Why <span class="text-primary">Choose Us?</span></h2>
                    <p class="lead text-muted mb-5">
                        We've redefined boarding house living with premium amenities and exceptional service
                    </p>

                    <div class="row g-4">
                        @foreach ([['icon' => 'bi-shield-check', 'title' => '24/7 Security', 'desc' => 'CCTV surveillance, access control, and security personnel ensure your safety around the clock'], ['icon' => 'bi-wifi', 'title' => 'High-Speed Internet', 'desc' => '100 Mbps fiber optic connection in all rooms and common areas for seamless work and entertainment'], ['icon' => 'bi-thermometer-sun', 'title' => 'AC & Hot Water', 'desc' => 'Comfortable climate control and instant hot water in every room']] as $feature)
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="{{ $feature['icon'] }} fs-3 text-primary"></i>
                                    </div>
                                    <h4 class="fw-bold mb-0">{{ $feature['title'] }}</h4>
                                </div>
                                <p class="text-muted">{{ $feature['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('about') }}" class="btn btn-primary mt-4 px-4 py-3 fw-bold rounded-3">
                        Learn More About Us <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-6 bg-light">
        <div class="container">
            <div class="text-center mb-6" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">What Our <span class="text-primary">Tenants Say</span></h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Real experiences from our valued community members
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-4 shadow">
                            @foreach ([['name' => 'Rina Permata', 'role' => 'Student @ UI', 'text' => 'Living at KostKita has been a game-changer for my studies. The quiet study areas and fast internet helped me maintain my GPA while enjoying a vibrant community.', 'img' => 'tenant-1.jpg'], ['name' => 'Ahmad Fauzi', 'role' => 'Software Engineer', 'text' => 'As a remote worker, I need reliable facilities. KostKita\'s co-working space, backup power, and high-speed internet make it the perfect place to live and work.', 'img' => 'tenant-2.jpg'], ['name' => 'Maya Sari', 'role' => 'Medical Intern', 'text' => 'The 24/7 security and cleanliness standards give me peace of mind after long hospital shifts. The community events also helped me make friends in a new city.', 'img' => 'tenant-3.jpg']] as $index => $testimonial)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} bg-white p-5">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 mb-4 mb-md-0">
                                            <div class="text-center">
                                                <img src="{{ asset('images/' . $testimonial['img']) }}"
                                                    class="rounded-circle mb-3" alt="{{ $testimonial['name'] }}"
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
                                                    <i class="bi bi-quote text-primary"
                                                        style="font-size: 3rem; opacity: 0.2;"></i>
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
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center g-4" data-aos="fade-up">
                @foreach ([['value' => '250+', 'label' => 'Happy Tenants'], ['value' => '15', 'label' => 'Prime Locations'], ['value' => '98%', 'label' => 'Retention Rate'], ['value' => '24/7', 'label' => 'Support']] as $stat)
                    <div class="col-md-3">
                        <div class="py-4">
                            <h2 class="display-4 fw-bold mb-2">{{ $stat['value'] }}</h2>
                            <p class="mb-0 opacity-90">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-6">
        <div class="container">
            <div class="card border-0 rounded-4 overflow-hidden shadow-lg">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="h-100 w-100 bg-dark"
                            style="background: url('{{ asset('images/contact-bg.jpg') }}') center/cover;"></div>
                    </div>
                    <div class="col-lg-6 bg-primary text-white">
                        <div class="p-5 d-flex flex-column justify-content-center h-100">
                            <div class="mb-4" data-aos="fade-right">
                                <h2 class="fw-bold mb-3 display-5">Ready to Find <br>Your New Home?</h2>
                                <p class="lead opacity-90 mb-0">
                                    Book a free tour today and experience KostKita for yourself
                                </p>
                            </div>

                            <div class="mb-4" data-aos="fade-right" data-aos-delay="200">
                                <div class="d-flex mb-3">
                                    <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-geo-alt fs-3"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 opacity-75">Visit Us</p>
                                        <h5 class="mb-0 fw-bold">Jl. Sudirman No. 123</h5>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-telephone fs-3"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 opacity-75">Call Us</p>
                                        <h5 class="mb-0 fw-bold">+62 21 1234 5678</h5>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px;">
                                        <i class="bi bi-whatsapp fs-3"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 opacity-75">WhatsApp</p>
                                        <h5 class="mb-0 fw-bold">+62 812 3456 7890</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto" data-aos="fade-right" data-aos-delay="400">
                                <a href="{{ route('contact') }}"
                                    class="btn btn-light btn-lg px-4 py-3 fw-bold rounded-3 shadow">
                                    <i class="bi bi-chat-dots me-2"></i>Schedule a Tour
                                </a>
                                <p class="mt-3 mb-0 opacity-75 small">We respond within 1 hour during business hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        :root {
            --primary: #6c63ff;
            --light-primary: #f0f0ff;
        }

        .bg-light-primary {
            background-color: var(--light-primary) !important;
        }

        .room-card {
            transition: all 0.4s ease;
            border-radius: 16px !important;
            overflow: hidden;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
        }

        .vh-100 {
            min-height: 100vh;
        }

        .py-6 {
            padding-top: 6rem !important;
            padding-bottom: 6rem !important;
        }

        .mb-6 {
            margin-bottom: 6rem !important;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        /* AOS Animation Styling */
        [data-aos] {
            opacity: 0;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        [data-aos].aos-animate {
            opacity: 1;
            transform: translate(0);
        }

        @media (max-width: 992px) {
            .vh-100 {
                min-height: auto;
                height: auto;
                padding: 5rem 0;
            }

            .py-6 {
                padding-top: 4rem !important;
                padding-bottom: 4rem !important;
            }

            .mb-6 {
                margin-bottom: 4rem !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS animations
            AOS.init({
                duration: 800,
                once: true,
                easing: 'ease-in-out-quad'
            });

            // Initialize carousel
            const testimonialCarousel = new bootstrap.Carousel(document.getElementById('testimonialCarousel'), {
                interval: 8000,
                pause: 'hover'
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Video background fallback
            const video = document.querySelector('video');
            if (video) {
                video.addEventListener('error', function() {
                    this.parentElement.style.backgroundImage =
                        'url({{ asset('images/hero-fallback.jpg') }})';
                    this.style.display = 'none';
                });
            }
        });
    </script>
@endpush
