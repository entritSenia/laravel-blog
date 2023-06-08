{{-- <a href="/post/{{ $post->id }}" class="list-group-item list-group-item-action">
    <img class="avatar-tiny" src="{{ $post->user->avatar }}" />
    <strong>{{ $post->title }}</strong>
    @if (!isset($hideAuthor))
        by {{ $post->user->username }}
    @endif
    on {{ $post->created_at->format('j/n/Y') }}</span>
</a> --}}
<article class="entry entry-list">
    <div class="row align-items-center">
        <div class="col-md-5">
            <figure class="entry-media">
                <a href="/post/{{ $post->id }}">
                    {{-- <img src="{{ $post->user->avatar }}" alt="image desc"> --}}
                    <img src="/storage/image/{{ $post->image }}" alt="image desc">
                </a>
            </figure><!-- End .entry-media -->
        </div><!-- End .col-md-5 -->

        <div class="col-md-7">
            <div class="entry-body">
                <div class="entry-meta">
                    <span class="entry-author">
                        @if (!isset($hideAuthor))
                            by <a href="#"> {{ $post->user->username }}</a>
                        @endif
                    </span>
                    <span class="meta-separator">|</span>
                    <a href="#">{{ $post->created_at->format('j/n/Y') }}</a>
                    {{-- <span class="meta-separator">|</span> --}}
                    {{-- <a href="#">2 Comments</a> --}}
                </div><!-- End .entry-meta -->

                <h2 class="entry-title">
                    <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                </h2><!-- End .entry-title -->

                {{-- <div class="entry-cats">
                    in <a href="#">Lifestyle</a>,
                    <a href="#">Shopping</a>
                </div><!-- End .entry-cats --> --}}

                <div class="entry-content">
                    <p>{!! $post->body !!}</p>
                    <a href="/post/{{ $post->id }}" class="read-more">Continue Reading</a>
                </div><!-- End .entry-content -->
            </div><!-- End .entry-body -->
        </div><!-- End .col-md-7 -->
    </div><!-- End .row -->
</article><!-- End .entry -->
