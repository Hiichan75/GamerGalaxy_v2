@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
        }

        header {
            background-color: #1a1a1a;
            padding: 1em;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 1em;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 2em;
        }

        .gamelist {
            position: relative;
            width: 100%;
            height: 50vh;
            overflow: hidden;
            background: #000;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 1em;
            box-sizing: border-box;
        }

        .gamelist h2 {
            margin: 0;
            padding-bottom: 1em;
            text-align: center;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #fff;
            animation: twinkle 2s infinite;
            border-radius: 50%;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
    </style>
    <section class="gamelist">
        <h2>Every gamer on this website:</h2>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </section>
    <script>
        function generateStars() {
            const numStars = 1000;
            const container = document.querySelector('.gamelist');

            function createStar() {
                var star = document.createElement('div');
                star.classList.add('star');
                star.style.left = Math.random() * 100 + 'vw';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.animationDuration = Math.random() * 2 + 1 + 's';
                return star;
            }

            for (let i = 0; i < numStars; i++) {
                var star = createStar();
                container.appendChild(star);
            }
        }
        window.addEventListener('load', generateStars);
    </script>
</div>
        
@endsection
