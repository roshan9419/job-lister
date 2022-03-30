<x-app-layout>
<x-header></x-header>

    <style>
        .container-2 {
            margin-top: 50px;
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .about {
            font-size: 40px;
        }

        .about-sub {
            max-width: 800px;
            margin-bottom: 50px;
        }

        .company-logo {
            display: flex;
            justify-content: center;
        }
        .app-logo {
            width: 150px;
            height: 100px;
        }

        #developer {
            border-radius: 50%;
            margin: auto;
            box-shadow:
                2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
                6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
                12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
                22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
                41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
                100px 100px 80px rgba(0, 0, 0, 0.07);

        }

        q {
            max-width: 600px;
            margin: auto;
            margin-top: 30px;
        }

        .developer-name {
            margin-top: 30px;
            font-size: 16px;
            font-weight: 700;
        }

        .dev-sub {
            color: rgb(78, 78, 78);
        }
    </style>

<div class="container-2">

    <strong><p class="about">About</p></strong>
    <div class="company-logo">
        <img class="app-logo" src="/images/assets/logo.svg" alt="">
        {{-- <h1>{{ config('app.name', 'JobLister') }}</h1> --}}
    </div>
    <p class="about-sub">{{ config('app.name', 'JobLister') }} is a job portal website for companies and candidates.
        Here companies can select best and deserving candidates. Employers or candidates can find their best suitable jobs. 
        It is developed in 2022 by Roshan Kumar. It features various job posts on a wide range of job roles for helping candidates.</p>
        
        <img id="developer"
            src="https://firebasestorage.googleapis.com/v0/b/probdiscuss-qna.appspot.com/o/assets%2Fdeveloper.jpeg?alt=media"
            width="150px" height="150px" alt="" srcset="">

        <q class="text-muted">You can teach a student a lesson for a day; but if you can teach him to learn by creating curiosity, he will
        continue the learning process as long as he lives</q>
        
        <p class="developer-name">Roshan Kumar</p>
        
        <p class="dev-sub">SOFTWARE ENGINEER</p>
    </div>
    <x-footer></x-footer>

</x-app-layout>
