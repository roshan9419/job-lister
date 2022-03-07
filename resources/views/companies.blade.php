<x-app-layout>
    <h1 class="container">Companies Registered</h1>
    @foreach ($companies as $company)
        <div class="container">
            <strong>{{ $company->name }} </strong>
            <a class="btn btn-outline-primary btn-sm" href="/company/{{$company->name_slug}}/dashboard">Go to dashboard</a>
        </div>
        <br>
    @endforeach
</x-app-layout>