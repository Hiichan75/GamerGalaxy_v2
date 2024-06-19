@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($categories as $category)
        <div>
            <h2>{{ $category->name }}</h2>
            @foreach($category->faqs as $faq)
                <div>
                    <h4>{{ $faq->question }}</h4>
                    <p>{{ $faq->answer }}</p>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            @endforeach
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
