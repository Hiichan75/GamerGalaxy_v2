@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Messages</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Message</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->reply ?? 'No reply yet' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>

    body{
        background-color: black;
        color: white;
        margin: 0;
        padding: 0;
    }

    .table{
        color: white;
    }
    .star {
        position: absolute;
        width: 2px;
        height: 2px;
        background: white;
        animation: twinkle 1s infinite alternate;
    }

    @keyframes twinkle {
        from {
            opacity: 1;
        }
        to {
            opacity: 0.5;
        }
    }

    .stars-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none; /* Zorgt ervoor dat de sterren niet de interactie met de rest van de pagina verstoren */
        overflow: hidden;
    }
</style>
<script>
    function generateStars() {
            const numStars = 1000;
            const container = document.querySelector('.container');

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
@endsection
