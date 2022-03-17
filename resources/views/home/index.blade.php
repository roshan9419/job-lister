<x-app-layout>
    <x-header></x-header>

    <style>
        #lead {
            position: relative;
            height: 92vh;
            min-height: 500px;
            max-height: 1080px;
            background: url("/images/assets/lead-bg.jpg");
            background-size: cover;
            padding: 15px;
            background-attachment: fixed;
        }

        #lead-content {
            position: absolute;
            z-index: 10;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        #lead-content h2 {
            color: #c6e2f5;
            font-weight: 500;
            font-size: 2.25em;
            margin-bottom: 15px;
        }

        #lead-overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(33, 125, 187, 0.8);
            z-index: 1;
        }

        .btn-rounded-white {
            display: inline-block;
            color: #fff;
            padding: 15px 25px;
            border: 3px solid #fff;
            background: transparent;
            border-radius: 30px;
            transition: 0.5s ease all;
        }

        .btn-rounded-white:hover {
            color: #3498db;
            background: #fff;
            text-decoration: none;
        }

        .search-container {
            padding: 15px;
            display: flex;
            justify-content:flex-end;
            outline: none;
            margin-top: 50px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: white;
        }

        .search-box {
            outline: none;
            border: none;
            width: 100%;
        }

        .job-type {
            border: none;
            outline: none;
            cursor: pointer;
            color: #4e4e4e;
            font-size: 16px;
        }

        .vertical-bar {
            background-color: rgb(150, 150, 150);
            margin-right: 10px;
            padding: 0px;
            width: 1px;
            font-size: 0%;
        }

        .heading {
            color: #374054;
        }
    </style>


    <div id="lead">
        <div id="lead-content">
            <h2>Seaching for a job?</h2>
            <h2>Find the <strong>best job</strong> that fit you</h2>

            <form action="{{ route('jobs.search') }}" method="GET">
                <div class="search-container">
                    <input class="search-box" type="text" name="q" placeholder="Job title or keyword" required autocomplete="off">
                    <div class="vertical-bar">.</div>
                    <select class="job-type" name="type">
                        <option value="Internship">Internship</option>
                        <option value="Full-time">Full-Time</option>
                        <option value="All">All</option>
                    </select>
                </div>
                <button type="submit" class="btn-rounded-white">Search Job</button>
            </form>

        </div>
        <div id="lead-overlay"></div>
    </div>

    @include('home.skills')

    <div class="container">
        <center><h2 class="heading">Recent job openings</h2></center>
        @include('jobs.list')
        <a href="{{ route('jobs.list') }}" class="btn btn-primary">See all Jobs</a>
    </div>

    <x-footer></x-footer>

</x-app-layout>