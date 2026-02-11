@extends('layouts.app')

@section('title', 'Home - IsyaraLearn')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-green-600 mb-6">Dashboard</h1>
        
        <!-- Simple content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-green-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Progress Belajar</h2>
                <p>Lihat progress pembelajaran bahasa isyarat Anda.</p>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Materi Terbaru</h2>
                <p>Akses materi pembelajaran terbaru.</p>
            </div>
        </div>
    </div>
</div>
@endsection