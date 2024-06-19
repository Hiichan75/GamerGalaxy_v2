@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($news as $newsItem)
        <div>
            <h2>{{ $newsItem->title }}</h2>
            @if ($newsItem->cover_image)
                <img src="{{ asset('storage/' . $newsItem->cover_image) }}" alt="Cover Image" style="width: 150px; height: 150px;">
            @endif
            <p>{{ $newsItem->content }}</p>
            <p>Published at: {{ $newsItem->published_at }}</p>
            @if (Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    @endforeach
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