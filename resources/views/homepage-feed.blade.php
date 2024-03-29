<x-layout>
    <div class="container-xxl">
        <img src="images/backgrounds/bg-1.jpg" />
    </div>
    <div class="container py-md-5 container--narrow">
        @unless ($posts->isEmpty())
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            @foreach ($posts as $post)
                                <x-post :post="$post" />
                            @endforeach
                            <div class="mt-4">
                                {{ $posts->links() }}
                            </div>
                        </div>
                        <aside class="col-lg-3">
                            <div class="sidebar">

                                <div class="widget">
                                    <h3 class="widget-title">Users</h3><!-- End .widget-title -->

                                    <ul class="posts-list">

                                        @foreach ($users as $user)
                                            <li>
                                                {{-- <figure>
                                                    <a href="/post/{{ $post->id }}">
                                                        <img src="/storage/image/{{ $post->image }}" alt="post">
                                                    </a>
                                                </figure> --}}

                                                <div>
                                                    {{-- <span>{{ $post->created_at->format('j/n/Y') }}</span> --}}
                                                    <h4><a href="/profile/{{ $user->username }}">{{ $user->username }}</a>
                                                    </h4>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->
                                {{-- <div class="widget widget-cats">
                                    <h3 class="widget-title">Following</h3><!-- End .widget-title -->

                                    <ul>
                                        @foreach ($posts as $post)
                                            <li><a href="#">{{ $post->user->username }}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- End .widget --> --}}

                                <div class="widget">
                                    <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                                    <ul class="posts-list">

                                        @foreach ($posts as $post)
                                            <li>
                                                <figure>
                                                    <a href="/post/{{ $post->id }}">
                                                        <img src="/storage/image/{{ $post->image }}" alt="post">
                                                    </a>
                                                </figure>

                                                <div>
                                                    <span>{{ $post->created_at->format('j/n/Y') }}</span>
                                                    <h4><a href="/post/{{ $post->id }}">{!! $post->body !!}</a></h4>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->

                                {{-- <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="/images/blog/sidebar/banner.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget --> --}}

                                <div class="widget">
                                    <h3 class="widget-title">Browse Posts</h3><!-- End .widget-title -->

                                    <div class="tagcloud">
                                        @foreach ($posts as $post)
                                            <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                                        @endforeach
                                    </div><!-- End .tagcloud -->
                                </div><!-- End .widget -->

                                {{-- <div class="widget widget-text">
                                    <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                                    <div class="widget-text-content">
                                        <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                                            pulvinar nunc sapien ornare nisl.</p>
                                    </div><!-- End .widget-text-content -->
                                </div><!-- End .widget --> --}}
                            </div><!-- End .sidebar -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->



            {{-- <h2 class="text-center mb-4">the latest from those you follow</h2> --}}
        @else
            <div class="text-center">
                <h2><strong>{{ auth()->user()->username }}</strong>, the people you follow haven't yet published any posts
                </h2>
                {{-- <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you
                    don&rsquo;t
                    have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top
                    menu bar to find content written by people with similar interests and then follow them.</p> --}}
            </div>
        @endunless





    </div>
</x-layout>



{{-- <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link page-link-prev" href="#" aria-label="Previous"
                    tabindex="-1" aria-disabled="true">
                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                </a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link"
                    href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item">
                <a class="page-link page-link-next" href="#" aria-label="Next">
                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </nav> --}}
