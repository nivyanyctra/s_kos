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
                    <a href="tel:+622112345678" class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold rounded-3">
                        <i class="bi bi-telephone me-2"></i>Call Us
                    </a>
                    <a href="mailto:hello@kostkita.com" class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold rounded-3">
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
                        <form id="contactForm">
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Full Name</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="name"
                                    placeholder="John Doe" required>
                                <div class="invalid-feedback">Please enter your name</div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control form-control-lg rounded-3" id="email"
                                    placeholder="you@example.com" required>
                                <div class="invalid-feedback">Please enter a valid email address</div>
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label fw-bold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-start-3 bg-light">+62</span>
                                    <input type="tel" class="form-control form-control-lg rounded-end-3" id="phone"
                                        placeholder="812-3456-7890" required>
                                </div>
                                <div class="invalid-feedback">Please enter a valid phone number</div>
                            </div>

                            <div class="mb-4">
                                <label for="subject" class="form-label fw-bold">Subject</label>
                                <select class="form-select form-select-lg rounded-3" id="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="booking">Room Booking Inquiry</option>
                                    <option value="maintenance">Maintenance Request</option>
                                    <option value="complaint">Complaint/Suggestion</option>
                                    <option value="general">General Question</option>
                                </select>
                                <div class="invalid-feedback">Please select a subject</div>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">Message</label>
                                <textarea class="form-control form-control-lg rounded-3" id="message" rows="5"
                                    placeholder="How can we help you today?" required></textarea>
                                <div class="invalid-feedback">Please enter your message</div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="privacyCheck" required>
                                <label class="form-check-label text-muted" for="privacyCheck">
                                    I agree to the <a href="#" class="text-primary text-decoration-underline">privacy
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

                <!-- Response Message -->
                <div id="formResponse" class="alert alert-success mt-4 d-none rounded-4 shadow-sm">
                    <h5 class="alert-heading fw-bold mb-2">
                        <i class="bi bi-check-circle me-2"></i>Thank you for contacting us!
                    </h5>
                    <p class="mb-0">We've received your message and will get back to you within 24 hours. For urgent
                        inquiries, please call us directly at <a href="tel:+622112345678" class="alert-link">+62 21 1234
                            5678</a>.</p>
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
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-geo-alt fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Our Location</h5>
                                <p class="text-muted mb-0">Jl. Sudirman No. 123, Jakarta Pusat 10220</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-clock fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Business Hours</h5>
                                <ul class="list-unstyled mb-0 text-muted">
                                    <li>Monday - Friday: 8:00 AM - 8:00 PM</li>
                                    <li>Saturday: 9:00 AM - 6:00 PM</li>
                                    <li>Sunday: 10:00 AM - 4:00 PM</li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-telephone fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Phone Numbers</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a href="tel:+622112345678" class="text-decoration-none text-dark fw-medium">
                                            <i class="bi bi-telephone me-1"></i>Office: +62 21 1234 5678
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+6281234567890" class="text-decoration-none text-dark fw-medium">
                                            <i class="bi bi-whatsapp me-1 text-success"></i>WhatsApp: +62 812-3456-7890
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-envelope fs-3 text-primary"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Email Addresses</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a href="mailto:hello@kostkita.com"
                                            class="text-decoration-none text-dark fw-medium">
                                            <i class="bi bi-envelope me-1"></i>General: hello@kostkita.com
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:booking@kostkita.com"
                                            class="text-decoration-none text-dark fw-medium">
                                            <i class="bi bi-calendar-check me-1"></i>Bookings: booking@kostkita.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <h5 class="fw-bold mb-3">Follow Us</h5>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-outline-primary rounded-circle p-3" title="Facebook">
                                    <i class="bi bi-facebook fs-4"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle p-3" title="Instagram">
                                    <i class="bi bi-instagram fs-4"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle p-3" title="Twitter">
                                    <i class="bi bi-twitter fs-4"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle p-3" title="YouTube">
                                    <i class="bi bi-youtube fs-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-body p-4 text-center bg-danger bg-opacity-10 rounded-4">
                        <i class="bi bi-exclamation-triangle fs-1 text-danger mb-3"></i>
                        <h4 class="fw-bold text-danger mb-2">Emergency Contact</h4>
                        <p class="text-muted mb-3">For urgent maintenance or security issues</p>
                        <a href="tel:+62811123456" class="btn btn-danger btn-lg px-4 py-3 fw-bold rounded-3 shadow">
                            <i class="bi bi-telephone me-2"></i>+62 811-1234-56
                        </a>
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.487376245187!2d106.82512597474575!3d-6.208763393728192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3bc8ab8e73f%3A0x4c5d30c9b3b5f7e1!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1699596506103!5m2!1sen!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="p-4 bg-light">
                    <p class="mb-1 fw-bold">Jl. Sudirman No. 123, Jakarta Pusat 10220</p>
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
                    @foreach ([
            [
                'question' => 'What documents are required for booking?',
                'answer' => 'We require a copy of your ID card (KTP), student/work ID if applicable, and a recent photo. For foreign nationals, we require passport copy and resident permit.',
            ],
            [
                'question' => 'What is the payment process?',
                'answer' => 'We require a security deposit equivalent to one month\'s rent and the first month\'s payment upfront. Subsequent payments can be made monthly via bank transfer or our mobile app.',
            ],
            [
                'question' => 'Are utilities included in the rent?',
                'answer' => 'Yes, all our rooms include water, electricity (up to 200 kWh/month), high-speed internet (100 Mbps), and access to common facilities like laundry and kitchen areas.',
            ],
            [
                'question' => 'Can I bring my own furniture?',
                'answer' => 'Our rooms come fully furnished with bed, wardrobe, desk, and chair. You\'re welcome to bring personal items like bedding, lamps, or decorations, but major furniture changes require prior approval.',
            ],
            [
                'question' => 'What is your visitor policy?',
                'answer' => 'Visitors are welcome until 10:00 PM. For overnight guests, we require prior notification and a small additional fee. All visitors must register at the front desk with valid ID.',
            ],
        ] as $index => $faq)
                        <div class="accordion-item border-0 mb-3 rounded-4 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button fw-bold fs-5 py-3 {{ $index > 0 ? 'collapsed' : '' }}"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body fs-5 text-muted">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Quick Contact CTA -->
        <div class="card border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="row g-0">
                <div class="col-lg-6 bg-primary text-white d-flex align-items-center p-5">
                    <div>
                        <h2 class="fw-bold mb-3 display-6">Need Immediate Assistance?</h2>
                        <p class="lead opacity-90 mb-4">Our dedicated support team is available 24/7 for urgent matters</p>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-whatsapp fs-2"></i>
                                </div>
                                <div>
                                    <p class="mb-0 opacity-75">WhatsApp Support</p>
                                    <h4 class="mb-0 fw-bold">+62 812-3456-7890</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-telephone fs-2"></i>
                                </div>
                                <div>
                                    <p class="mb-0 opacity-75">Emergency Hotline</p>
                                    <h4 class="mb-0 fw-bold">+62 811-1234-56</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="bi bi-chat-left-dots fs-2"></i>
                                </div>
                                <div>
                                    <p class="mb-0 opacity-75">Live Chat</p>
                                    <h4 class="mb-0 fw-bold">Available 8AM-10PM</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-light">
                    <img src="{{ asset('images/contact-illustration.svg') }}" class="img-fluid"
                        alt="Contact Illustration" style="max-width: 80%;">
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
            const formResponse = document.getElementById('formResponse');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Simple validation
                    let isValid = true;
                    const inputs = contactForm.querySelectorAll(
                        'input[required], select[required], textarea[required]');

                    inputs.forEach(input => {
                        if (!input.value.trim()) {
                            isValid = false;
                            input.classList.add('is-invalid');
                        } else {
                            input.classList.remove('is-invalid');
                        }
                    });

                    const privacyCheck = document.getElementById('privacyCheck');
                    if (!privacyCheck.checked) {
                        isValid = false;
                        privacyCheck.classList.add('is-invalid');
                    } else {
                        privacyCheck.classList.remove('is-invalid');
                    }

                    if (isValid) {
                        // In a real application, you would submit the form data to your server
                        contactForm.reset();
                        formResponse.classList.remove('d-none');
                        contactForm.scrollIntoView({
                            behavior: 'smooth'
                        });

                        // Hide response after 10 seconds
                        setTimeout(() => {
                            formResponse.classList.add('d-none');
                        }, 10000);
                    }
                });

                // Real-time validation
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('is-invalid');
                        }
                    });
                });

                privacyCheck.addEventListener('change', function() {
                    if (this.checked) {
                        this.classList.remove('is-invalid');
                    }
                });
            }
        });
    </script>
@endpush
