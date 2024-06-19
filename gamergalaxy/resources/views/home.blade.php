@extends('layouts.app')

@section('content')
<html>
    <div class="container">
        <form action="">
            <label for=""></label>
            <input type="text">
        </form>
    </div>
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
</html>
@endsection
