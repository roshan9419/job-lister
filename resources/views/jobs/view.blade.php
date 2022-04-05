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

        .applied-btn {
            background: seagreen;
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
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <div class="heading">
            <span class="title-heading">{{ $job->title }}</span>
            <?php 
                $user = Session::get('user');
                $applicants = $job->applicants;
                if (!$applicants) $applicants = array();
            ?>
            @if ($user && $user->candidate_id && in_array($user->candidate_id, $applicants))
                <div class="applied-btn">Applied</div>              
            @else
                @if ($job->status == "CLOSED")
                    <div class="job-closed mt-2" style="color: red">No longer accepting responses!</div>    
                @else
                    @if (!($user && $user->company_id))
                        <a href="{{ route('job.apply', ['job_id' => $job->job_id]) }}" class="apply-btn">Apply Now</a>
                    @endif
                @endif
            @endif
        </div>
        <h3>{{ $job->job_location }} ({{ $job->location_type }})</h3>
        <div class="mb-5"></div>

        <h5>Skills Required</h5>
        @foreach ($job->skills_required as $skill)
        <span class="skill">{{ $skill }}</span>
        @endforeach

        <div class="mb-5"></div>

        <div class="description">
            {{ $job->description }}
        </div>
        <div class="mb-5"></div>
        @include('components.company-card')
    </div>

    <x-footer></x-footer>

</x-app-layout>