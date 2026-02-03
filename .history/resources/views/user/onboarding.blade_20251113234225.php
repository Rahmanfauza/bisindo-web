@extends('layouts.app')

@section('title', 'Onboarding')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-white">
    <div class="w-full max-w-3xl text-center px-6">

        {{-- Swiper --}}
        <div class="swiper-container">
            <div class="swiper-wrapper">
                {{-- Slide 1 --}}
                <div class="swiper-slide">
                    <img src="/images/learn.svg" class="mx-auto mb-6 w-64">
                    <h2 class="text-2xl font-bold text-green-700">Get rewarded for learning ASL</h2>
                    <p class="text-gray-600 mt-2">Track your progress and earn points for every lesson.</p>
                </div>

                {{-- Slide 2 --}}
                <div class="swiper-slide">
                    <img src="/images/practice.svg" class="mx-auto mb-6 w-64">
                    <h2 class="text-2xl font-bold text-green-700">Practice with real conversations</h2>
                    <p class="text-gray-600 mt-2">Interactive scenarios help you build confidence.</p>
                </div>

                {{-- Slide 3 --}}
                <div class="swiper-slide">
                    <img src="/images/reward.svg" class="mx-auto mb-6 w-64">
                    <h2 class="text-2xl font-bold text-green-700">Unlock badges & rewards</h2>
                    <p class="text-gray-600 mt-2">Celebrate milestones and stay motivated.</p>
                </div>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        {{-- Get-Started button – hidden / disabled until slide 3 --}}
        <a  id="get-started"
            href="{{ route('dashboard') }}"
            class="inline-block mt-8 px-6 py-3 bg-green-600 text-white rounded-full
                   opacity-50 cursor-not-allowed pointer-events-none
                   hover:bg-green-700 transition">
            Get Started
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
const swiper = new Swiper('.swiper-container', {
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
});

const btn   = document.getElementById('get-started');
let   seen  = 0;

swiper.on('slideChange', () => {
    // mark slides as “seen” once they are reached
    if (swiper.activeIndex === 1 && seen < 1) seen = 1;
    if (swiper.activeIndex === 2 && seen < 2) seen = 2;

    // only on the 3rd slide AND after visiting the previous two
    if (swiper.activeIndex === 2 && seen === 2) {
        btn.classList.remove('opacity-50', 'cursor-not-allowed', 'pointer-events-none');
    } else {
        btn.classList.add('opacity-50', 'cursor-not-allowed', 'pointer-events-none');
    }
});
</script>
@endpush