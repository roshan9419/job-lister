<x-app-layout>
    @include('components.header')
    @if (session('user'))
        <div>Welcome, {{ session('user')->name }}!</div>
        <img src="{{ session('user')->photo_url }}" alt="">
    @else
        <div>Welcome to Job Lister!</div>
    @endif
    <a href="/companies" class="btn btn-primary">Check all companies</a>
</x-app-layout>