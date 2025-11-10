@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row g-5">
            <!-- Image Gallery Section -->
            <div class="col-lg-7">
                <div class="position-relative mb-4">
                    {{-- <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-4 shadow">
                            @foreach ($room->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ $image->path ? asset('storage/' . $image->path) : asset('images/room-placeholder.jpg') }}"
                                        class="d-block w-100" alt="{{ $room->name }} - Image {{ $index + 1 }}"
                                        style="height: 450px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators position-absolute bottom-0 mb-3">
                            @foreach ($room->images as $index => $image)
                                <button type="button" data-bs-target="#roomCarousel" data-bs-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"></button>
                            @endforeach
                        </div>
                    </div> --}}
                    <img src="{{ $room->image_path ? asset('storage/' . $room->image_path) : asset('images/room-placeholder.jpg') }}"
                        class="d-block w-100" alt="{{ $room->name }}" style="height: 450px; object-fit: cover;">

                    <!-- Status Badge Overlay -->
                    <span
                        class="position-absolute top-0 start-0 m-3 badge rounded-pill fs-6 p-2 fw-bold
                    @if ($room->status === 'available') bg-success
                    @elseif($room->status === 'occupied') bg-danger
                    @else bg-warning text-dark @endif">
                        {{ ucfirst($room->status) }}
                    </span>
                </div>

                <!-- Facilities Grid -->
                {{-- <div class="row row-cols-2 row-cols-md-3 g-3 mt-4">
                    @foreach ($room->facilities as $facility)
                        <div class="col">
                            <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                                <div class="me-3">
                                    <i class="bi bi-{{ $facility->icon ?? 'check2-circle' }} fs-3 text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $facility->name }}</h6>
                                    @if ($facility->description)
                                        <small class="text-muted">{{ Str::limit($facility->description, 20) }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
            </div>

            <!-- Details & Booking Section -->
            <div class="col-lg-5">
                <!-- Room Details Card -->
                <div class="card border-0 shadow-sm mb-4 rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h1 class="h2 fw-bold mb-1">{{ $room->name }}</h1>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-geo-alt me-1"></i> {{ $room->address ?? 'Jl. Contoh No. 123, Kota' }}
                                </p>
                            </div>
                            <span class="display-6 fw-bold text-primary">
                                Rp {{ number_format($room->price, 0, ',', '.') }}<small
                                    class="fs-6 text-muted">/month</small>
                            </span>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <i class="bi bi-rulers fs-4 text-primary"></i>
                                <span class="fw-bold ms-2">{{ $room->size }} m²</span>
                            </div>
                            <div>
                                <i class="bi bi-people fs-4 text-primary"></i>
                                <span class="fw-bold ms-2">{{ $room->max_occupancy }} persons</span>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3 fw-bold">Description</h5>
                        <p class="fs-5 text-muted">{{ $room->description }}</p>

                        <hr class="my-4">

                        <div class="d-grid gap-3">
                            @if ($room->status === 'available')
                                <button class="btn btn-primary btn-lg py-3 fs-5 rounded-3 fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal">
                                    <i class="bi bi-calendar-check me-2"></i> Book This Room
                                </button>
                            @else
                                <button class="btn btn-outline-secondary btn-lg py-3 fs-5 rounded-3 fw-bold" disabled>
                                    <i class="bi bi-x-circle me-2"></i> Currently Unavailable
                                </button>
                            @endif

                            <button class="btn btn-outline-primary py-3 fs-5 rounded-3 fw-bold">
                                <i class="bi bi-chat-left-text me-2"></i> Contact Owner
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Location Map -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0"><i class="bi bi-geo-alt text-primary me-2"></i> Location</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.487376245187!2d106.82512597474575!3d-6.208763393728192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3bc8ab8e73f%3A0x4c5d30c9b3b5f7e1!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1699596506103!5m2!1sen!2sid"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="p-3">
                            <p class="mb-1 fw-bold">{{ $room->address ?? 'Jl. Contoh No. 123' }}</p>
                            <p class="text-muted mb-0">Kota, Provinsi 12345</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Rooms Section -->
        <div class="mt-5 pt-4 border-top">
            <h2 class="h3 fw-bold mb-4">Similar Rooms</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($relatedRooms as $room)
                    <div class="col">
                        <a href="{{ route('rooms.show', $room->id) }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 related-room-card overflow-hidden">
                                <div class="position-relative">
                                    <img src="{{ $room->image_path ? asset('storage/' . $room->image_path) : asset('images/room-placeholder.jpg') }}"
                                        class="card-img-top" alt="{{ $room->name }}"
                                        style="height: 200px; object-fit: cover;">

                                    <span
                                        class="position-absolute top-0 end-0 m-2 badge rounded-pill
                                    @if ($room->status === 'available') bg-success
                                    @elseif($room->status === 'occupied') bg-danger
                                    @else bg-warning text-dark @endif">
                                        {{ ucfirst($room->status) }}
                                    </span>
                                </div>
                                <div class="card-body p-3">
                                    <h5 class="card-title fw-bold">{{ $room->name }}</h5>
                                    <p class="card-text text-muted mb-3">{{ Str::limit($room->description, 50) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary">Rp
                                            {{ number_format($room->price, 0, ',', '.') }}</span>
                                        <span class="badge bg-light text-dark">{{ $room->size }} m²</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header bg-primary text-white border-0 py-3 ps-4">
                    <h5 class="modal-title fw-bold fs-4">
                        <i class="bi bi-calendar-check me-2"></i> Book Room: {{ $room->name }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control form-control-lg rounded-3"
                                placeholder="Enter your full name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="tel" class="form-control form-control-lg rounded-3"
                                placeholder="0812-3456-7890">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control form-control-lg rounded-3"
                                placeholder="you@example.com">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Booking Duration</label>
                            <select class="form-select form-select-lg rounded-3">
                                <option selected>3 months</option>
                                <option>6 months</option>
                                <option>1 year</option>
                            </select>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="termsCheck" required>
                            <label class="form-check-label" for="termsCheck">
                                I agree to the <a href="#" class="text-primary text-decoration-underline">terms and
                                    conditions</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold">
                            <i class="bi bi-check-circle me-2"></i> Confirm Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .carousel-item img {
                transition: transform 0.5s ease;
            }

            .carousel-item.active img {
                transform: scale(1.05);
            }

            .related-room-card {
                transition: all 0.3s ease;
                border-radius: 16px !important;
            }

            .related-room-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
            }

            .card-img-top {
                object-fit: cover;
                height: 200px;
                transition: transform 0.3s ease;
            }

            .related-room-card:hover .card-img-top {
                transform: scale(1.03);
            }

            .modal-content {
                border: none;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            }

            .modal-header {
                border-radius: 16px 16px 0 0 !important;
            }

            @media (max-width: 768px) {
                .carousel-inner {
                    height: 300px !important;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize carousel with pause on hover
                const carousel = new bootstrap.Carousel(document.getElementById('roomCarousel'), {
                    interval: 5000,
                    pause: 'hover'
                });

                // Smooth scroll for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.querySelector(this.getAttribute('href')).scrollIntoView({
                            behavior: 'smooth'
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection
