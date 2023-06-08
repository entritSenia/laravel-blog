<x-layout :doctitle="$postTitle">
    <div class="container py-md-5 container--narrow">
        <div class="col-12 row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h2>{{ $postTitle }}</h2>
            </div>
            <div class="pt-1 col-lg-8 col-md-6 col-sm-12 justify-content-end text-right">
                @can('update', $post)
                    <span class="pt-2">
                        <a href="/post/{{ $post->id }}/edit" class="text-primary mr-2" data-toggle="tooltip"
                            data-placement="top" title="Edit"><i class="fas fa-edit" style="font-size:24px"></i></a>
                        <form class="delete-post-form d-inline" action="/post/{{ $post->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top"
                                title="Delete"><i class="fas fa-trash" style="font-size:24px"></i></button>
                        </form>
                    </span>
                @endcan
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <img style="height:500px;width:100%" src="/storage/image/{{ $postImage }}" />

        </div>

        <p class="text-muted small mb-1">
        <div class="col-12 row">
            <div><a href="/profile/{{ $post->user->username }}"><img class="avatar-tiny"
                        src="{{ $post->user->avatar }}" /></a>
            </div>
            <div>
                Posted by <a href="/profile/{{ $post->user->username }}">{{ $post->user->username }}</a> on
                {{ $post->created_at->format('j/n/Y') }}
            </div>
        </div>
        </p>

        <div class="body-content">
            {!! $post->body !!}
        </div>
    </div>
</x-layout>
