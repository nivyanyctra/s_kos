@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center mb-4">{{ $privacy->title }}</h1>
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <p>By accessing or using our services, you agree to be bound by these Privacy Policy.</p>
                        {!! $privacy->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
