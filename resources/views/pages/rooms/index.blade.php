@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">
                <span class="text-primary">Our Premium Rooms</span>
            </h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Discover comfortable and well-equipped rooms designed for your convenience and relaxation
            </p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($rooms as $room)
                <div class="col">
                    <a href="{{ route('rooms.show', $room->name) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 room-card overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ $room->image_path ? asset('storage/' . $room->image_path) : asset('images/room-placeholder.jpg') }}"
                                    class="card-img-top room-image" alt="{{ $room->name }}"
                                    style="height: 220px; object-fit: cover;">

                                <!-- Status Badge -->
                                <span
                                    class="position-absolute top-0 end-0 m-3 badge rounded-pill
                                @if ($room->status === 'available') bg-success
                                @elseif($room->status === 'occupied') bg-danger
                                @else bg-warning text-dark @endif">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </div>

                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h2 class="h5 fw-bold text-dark mb-0">{{ $room->name }}</h2>
                                    <span class="fs-4 fw-bold text-primary">
                                        Rp {{ number_format($room->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="d-flex align-items-center text-muted mb-3">
                                    <i class="bi bi-rulers me-2"></i>
                                    <span>{{ $room->size }} m²</span>
                                </div>

                                <p class="card-text text-muted mb-4"
                                    style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $room->description }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- <div class="d-flex flex-wrap gap-2">
                                        @foreach ($room->facilities->take(3) as $facility)
                                            <div class="facility-icon" title="{{ $facility->name }}">
                                                <i class="bi bi-{{ $facility->icon ?? 'building' }} fs-5 text-primary"></i>
                                            </div>
                                        @endforeach
                                        @if ($room->facilities->count() > 3)
                                            <div class="facility-icon bg-light text-dark" title="More facilities">
                                                <span class="fw-bold">+{{ $room->facilities->count() - 3 }}</span>
                                            </div>
                                        @endif
                                    </div> --}}
                                    <span class="text-primary fw-medium d-flex align-items-center">
                                        View details
                                        <i class="bi bi-arrow-right ms-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 bg-light rounded-4">
                        <i class="bi bi-house-door display-1 text-secondary mb-3"></i>
                        <h3 class="text-muted mb-2">No rooms available</h3>
                        <p class="text-muted">Check back later for new room listings</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @push('styles')
        <style>
            .room-card {
                transition: all 0.3s ease;
                border-radius: 16px !important;
                overflow: hidden;
            }

            .room-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12) !important;
            }

            .room-image {
                transition: transform 0.5s ease;
            }

            .room-card:hover .room-image {
                transform: scale(1.05);
            }

            .facility-icon {
                width: 36px;
                height: 36px;
                border-radius: 12px;
                background: #eef7ff;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .card-body {
                background: #fff;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cards = document.querySelectorAll('.room-card');

                cards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.zIndex = '10';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.zIndex = '1';
                    });
                });
            });
        </script>
    @endpush
@endsection
