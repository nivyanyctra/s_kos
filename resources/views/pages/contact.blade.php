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
                <h1 class="display-3 fw-bold mb-3 text-primary">Get In <span class="text-dark">Touch</span></h1>
                <p class="lead text-muted mb-4 px-md-5">
                    Have questions or ready to book your new home? Our friendly team is here to help
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="tel:{{ $contact->phone }}" class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold rounded-3">
                        <i class="bi bi-telephone me-2"></i>Call Us
                    </a>
                    <a href="mailto:{{ $contact->email }}"
                        class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold rounded-3">
                        <i class="bi bi-envelope me-2"></i>Email Us
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Grid -->
        <div class="row g-5 mb-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-4 ps-5">
                        <h2 class="fw-bold fs-3 mb-0">
                            <i class="bi bi-chat-dots me-2"></i>Send us a message
                        </h2>
                    </div>
                    <div class="card-body p-5">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form id="contactForm" action="{{ route('messages.customer.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Full Name</label>
                                <input type="text"
                                    class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email Address</label>
                                <input type="email"
                                    class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label fw-bold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3 bg-light">+62</span>
                                    <input type="tel"
                                        class="form-control form-control-lg rounded-end-3 @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" placeholder="812-3456-7890"
                                        value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="subject" class="form-label fw-bold">Subject</label>
                                <select class="form-select form-select-lg rounded-3 @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="booking" {{ old('subject') == 'booking' ? 'selected' : '' }}>Room
                                        Booking Inquiry</option>
                                    <option value="maintenance" {{ old('subject') == 'maintenance' ? 'selected' : '' }}>
                                        Maintenance Request</option>
                                    <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>
                                        Complaint/Suggestion</option>
                                    <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General
                                        Question</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">Message</label>
                                <textarea class="form-control form-control-lg rounded-3 @error('message') is-invalid @enderror" id="message"
                                    name="message" rows="5" placeholder="How can we help you today?" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="privacyCheck" required>
                                <label class="form-check-label text-muted" for="privacyCheck">
                                    I agree to the <a href="{{ route('privacy.show') }}" target="_blank"
                                        class="text-primary text-decoration-underline">privacy
                                        policy</a> and consent to be contacted
                                </label>
                                <div class="invalid-feedback">You must agree to the terms</div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold rounded-3 shadow">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Contact Information -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 h-100">
                    <div class="card-header bg-dark text-white py-4 ps-5">
                        <h2 class="fw-bold fs-3 mb-0">
                            <i class="bi bi-geo-alt me-2"></i>Contact Details
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex mb-4">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                style="width: 50px; height: 50px; flex: 0 0 50px;">
                                <i class="fa-solid fa-map fa-fw fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Our Location</h5>
                                <p class="text-muted mb-0">{{ $contact->address }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-clock fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Business Hours</h5>
                                <p class="mb-0 text-muted">{{ $contact->business_hours }}</p>
                                {{-- <ul class="list-unstyled mb-0 text-muted">
                                    <li>Monday - Friday: 8:00 AM - 8:00 PM</li>
                                    <li>Saturday: 9:00 AM - 6:00 PM</li>
                                    <li>Sunday: 10:00 AM - 4:00 PM</li>
                                </ul> --}}
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-phone fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Phone Numbers</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="tel:{{ $contact->phone }}"
                                            class="text-decoration-none text-dark fw-medium">
                                            <i class="fa-brands fa-whatsapp me-1 text-success"></i>WhatsApp:
                                            {{ $contact->phone }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-envelope fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Email Addresses</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="mailto:{{ $contact->email }}"
                                            class="text-decoration-none text-dark fw-medium">
                                            <i class="bi bi-calendar-check me-1"></i>Bookings: {{ $contact->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <h5 class="fw-bold mb-3">Follow Us</h5>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://www.facebook.com/{{ $contact->facebook }}" target="_blank" class="btn btn-outline-primary rounded-circle p-3" title="Facebook">
                                    <i class="fa-brands fa-facebook fs-4"></i>
                                </a>
                                <a href="https://www.instagram.com/{{ $contact->instagram }}" target="_blank" class="btn btn-outline-primary rounded-circle p-3" title="Instagram">
                                    <i class="fa-brands fa-instagram fs-4"></i>
                                </a>
                                <a href="https://x.com/{{ $contact->x }}" target="_blank" class="btn btn-outline-primary rounded-circle p-3" title="Twitter">
                                    <i class="fa-brands fa-twitter fs-4"></i>
                                </a>
                                <a href="https://www.youtube.com/{{ $contact->youtube }}" target="_blank" class="btn btn-outline-primary rounded-circle p-3" title="YouTube">
                                    <i class="fa-brands fa-youtube fs-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps Section -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
            <div class="card-header bg-dark text-white py-4 ps-5">
                <h2 class="fw-bold fs-3 mb-0">
                    <i class="bi bi-map me-2"></i>Find Us On The Map
                </h2>
            </div>
            <div class="card-body p-0">
                <div class="ratio ratio-16x9">
                    {!! $contact->map_embed !!}
                </div>
                <div class="p-4 bg-light">
                    <p class="mb-1 fw-bold">{{ $contact->address }}</p>
                    <p class="text-muted mb-0">Click on the map to open in Google Maps for directions</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
            <div class="card-header bg-primary text-white py-4 ps-5">
                <h2 class="fw-bold fs-3 mb-0">
                    <i class="bi bi-question-circle me-2"></i>Frequently Asked Questions
                </h2>
            </div>
            <div class="card-body p-4">
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item border-0 mb-3 rounded-4 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button fw-bold fs-5 py-3 {{ $index > 0 ? 'collapsed' : '' }}"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body fs-5 text-muted">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .bg-light-primary {
            background-color: #eef7ff !important;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
            border-color: #6c63ff;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
        }

        .accordion-button {
            background-color: #f8f9fc !important;
            border: none;
            box-shadow: none !important;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background-color: #eef7ff !important;
            color: #6c63ff;
        }

        .accordion-button:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.9) 0%, rgba(77, 171, 247, 0.9) 100%);
        }

        @media (max-width: 768px) {
            .card-header {
                text-align: center;
            }

            .p-5 {
                padding: 1.5rem !important;
            }
        }

        .btn-outline-primary:hover {
            background-color: #6c63ff;
            color: white;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');

            if (contactForm) {
                // Real-time validation
                const inputs = contactForm.querySelectorAll(
                'input[required], select[required], textarea[required]');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('is-invalid');
                        }
                    });
                });

                const privacyCheck = document.getElementById('privacyCheck');
                if (privacyCheck) {
                    privacyCheck.addEventListener('change', function() {
                        if (this.checked) {
                            this.classList.remove('is-invalid');
                        }
                    });
                }
            }
        });
    </script>
@endpush
