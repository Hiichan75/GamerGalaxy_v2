@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create FAQ</h1>
    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea name="answer" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('admin.faq_categories.create') }}" class="btn btn-link">Add New Category</a>
        </div>
        <button type="submit" class="btn btn-primary">Add FAQ</button>
    </form>
</div>
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
</script>
@endsection
