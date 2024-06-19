@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('forum.create') }}" class="btn btn-primary">Create Post</a>
    </div>
    @foreach($posts as $post)
        <div class="post mb-4">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p><strong>Posted by:</strong> {{ $post->user->name }}</p>

            <!-- Reply Button -->
            <button class="btn btn-secondary btn-sm toggle-replies" data-post-id="{{ $post->id }}">View Replies</button>

            <!-- Replies Container -->
            <div class="replies mt-3" id="replies-{{ $post->id }}" style="display: none;">
                @foreach($post->replies as $reply)
                    <div class="reply p-2 border mb-2">
                        <p>{{ $reply->content }}</p>
                        <p><small>Reply by: {{ $reply->user->name }}</small></p>
                    </div>
                @endforeach

                <!-- Reply Form -->
                <form action="{{ route('forum.reply', $post->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="reply" class="form-control" rows="2" placeholder="Write your reply..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                </form>
            </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-replies').forEach(function (button) {
        button.addEventListener('click', function () {
            var postId = this.getAttribute('data-post-id');
            var repliesDiv = document.getElementById('replies-' + postId);
            if (repliesDiv.style.display === 'none') {
                repliesDiv.style.display = 'block';
                this.textContent = 'Hide Replies';
            } else {
                repliesDiv.style.display = 'none';
                this.textContent = 'View Replies';
            }
        });
    });
});
</script>
@endsection
