<x-app-layout>
    @include('components.header')

    <style>
        .heading {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .title-heading {
            font-size: 2.2rem;
            font-weight: bolder;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
        .apply-btn {
            background: royalblue;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 1rem;
            height: min-content;
        }
        .apply-btn:hover {
            color: rgb(184, 184, 184)
        }
        .skill {
            margin-right: 5px;
            background: royalblue;
            color: white;
            padding: 3px 6px;
            border-radius: 10%;
            font-size: 0.8rem;
            font-weight: bold
        }
    </style>

    <div class="container">
        <div class="heading">
            <span class="title-heading">{{ $job->title }}</span>
            <a href="#" class="apply-btn">Apply Now</a>
        </div>
        <h3>{{ $job->job_location }}, ({{ $job->location_type }})</h3>
        <div class="mb-5"></div>

        <h5>Skills Required</h5>
        @foreach ($job->skills_required as $skill)
            <span class="skill">{{ $skill }}</span>
        @endforeach

        <div class="mb-5"></div>

        <div class="description">
            {{ $job->description }}
        </div>
    </div>
</x-app-layout>