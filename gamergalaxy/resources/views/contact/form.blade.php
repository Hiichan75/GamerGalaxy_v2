@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
<style>

    body{
        background-color: black;
        color: white;
        margin: 0;
        padding: 0;
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
