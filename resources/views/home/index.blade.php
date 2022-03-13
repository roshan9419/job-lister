<x-app-layout>
    @include('components.header')
    <div class="container">
        @if (session('user'))
            <div>Welcome, {{ session('user')->name }}!</div>
            <img src="{{ session('user')->photo_url }}" alt="">

            @if (isset(session('user')->company_id))
                <a href="/company/{{session('user')->company_id}}/dashboard" class="btn btn-outline-primary">Go to Dashboard</a>
            @endif

        @else
            <div>Welcome to Job Lister!</div>
        @endif
        <br>
        <a href="/companies" class="btn btn-primary">Check all companies</a>
    </div>
</x-app-layout>