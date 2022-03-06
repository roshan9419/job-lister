<x-app-layout>
    @if (session('name'))
        <div>Welcome, {{ session('name') }}!</div>
        <img src="https://lh3.googleusercontent.com/a-/AOh14GiXxLzoHgbOzM8gSPuVDUI4aiIme-HzeEeaWuix-A=s96-c" alt="">
    @else
        <div>Welcome to Job Lister!</div>        
    @endif
</x-app-layout>