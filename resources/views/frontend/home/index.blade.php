@extends('frontend.layouts.master')
@section('content')
    <input type="search" name="search" id="search" placeholder="Search by title" autocomplete="off">
    <div class="row" id="blog-cards">
        @if (count($blogs) > 0)
            @foreach ($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img loading="lazy" decoding="async" src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="Post Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <h5 class="card-title">{{ $blog->slug }}</h5>
                            <p class="card-text">{{ $blog->description }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <p>No Blogs to display</p>
            </div>
        @endif
    </div>
@endsection

@push('script')
<script>
    $(document).ready(() => {
        let timer;
        $('#search').on('keyup', () => {
            clearTimeout(timer);
            timer = setTimeout(searchBlogs, 2000);
        });
        
        const searchBlogs = () => {
            const value = $('#search').val();
            $.get("{{ route('frontend.index') }}", { 'search': value })
            .done(response => {
                const blogs = response.blogs;
                $('#blog-cards').empty();
                if (blogs.length > 0) {
                    blogs.forEach(blog => {
                        const blogCard = `<div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <img loading="lazy" decoding="async" src="{{ asset('storage/images/blogs/') }}/${blog.image}" alt="Post Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">${blog.title}</h5>
                                    <h5 class="card-title">${blog.slug}</h5>
                                    <p class="card-text">${blog.description}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>`;
                        $('#blog-cards').append(blogCard);
                    });
                } else {
                    $('#blog-cards').html('<div class="col-12 text-center"><p>No Blogs to display</p></div>');
                }
            });
        };
    });
</script>
@endpush
