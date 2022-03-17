<x-app-layout>
    <style>
        .heading {
            font-size: 3rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgb(54, 54, 54);
            margin: 20px;
            text-align: center;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .card {
            width: 200px;
            align-items: center;
            padding: 20px;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            border-radius: 10px;
        }
        .card img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        .title {
            font-size: 1rem;
            font-weight: bold;
            color: rgb(63, 63, 63);
        }
        .card:hover {
            transform: scale(1.1);
            background: royalblue;
        }
        .card:hover img {
            filter: brightness(100)
        }
        .card:hover .title {
            color: white;
        }
    </style>

    <x-header></x-header>

    <div class="heading">Who you are?</div>

    <div class="cards">
        <a href="{{ route('candidate.register') }}" class="card">
            <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="">
            <div class="title">
                Candidate
            </div>
        </a>
        <a href="{{ route('company.register') }}" class="card">
            <img src="https://storage.googleapis.com/stateless-main-bizlatinhub/2020/10/company-incorporation.svg" alt="">
            <div class="title">
                Company
            </div>
        </a>
    </div>
</x-app-layout>