<x-layout :doctitle="$doctitle">
    <div class="container py-md-5 container--narrow">
        <div class="col-12 row">
            <div class="col-4">
                <h2>
                    <img class="avatar-normal" src="{{ $sharedData['avatar'] }}" />
                    {{ $sharedData['username'] }}
                    @auth
                        @if (!$sharedData['currentlyFollowing'] and auth()->user()->username != $sharedData['username'])
                            <form class="ml-2 d-inline" action="/create-follow/{{ $sharedData['username'] }}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                                {{-- @if (auth()->user()->username == $user)
                            <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
                        @endif --}}
                            </form>
                        @endif
                        @if ($sharedData['currentlyFollowing'])
                            <form class="ml-2 d-inline" action="/remove-follow/{{ $sharedData['username'] }}"
                                method="POST">
                                @csrf
                                {{-- <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button> --}}
                                <button class="btn btn-danger btn-sm">Stop Following <i
                                        class="fas fa-user-times"></i></button>
                            </form>
                        @endif
                        @if (auth()->user()->username == $sharedData['username'])
                            <a class="edit-avatar" href="/manage-avatar" class=""><i
                                    class="fa-solid fa-circle-plus"></i></a>
                        @endif
                    @endauth
                </h2>
            </div>

            <div class="col-6 row">
                <div class="menu-wrap info col-4">
                    <ul class="menu justify-content-end">
                        <li class="menu-item-custom">
                            <a href="#">{{ $sharedData['postCount'] }}</a>
                            <div class="dd-a"><span>Posts</span></div>
                            <ul class="drop-menu">
                                @foreach ($sharedData['posts'] as $post)
                                    <li>
                                        <a href="/post/{{ $post->id }}" class="drop-menu-item"><img
                                                class="avatar-profile-posts" src="/storage/image/{{ $post->image }}"
                                                alt="image desc" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="menu-wrap info col-4">
                    <ul class="menu">
                        <li class="menu-item-custom">
                            <a href="#">{{ $sharedData['followersCount'] }}</a>
                            <div class="dd-a"><span>Followers</span></div>
                            <ul class="drop-menu">
                                @foreach ($sharedData['followers'] as $follower)
                                    <li class="mb-1">
                                        <a href="/profile/{{ $follower->userDoingTheFollowing->username }}"
                                            class="drop-menu-item">
                                            <div class="row justify-content-center">
                                                <img class="avatar-tiny"
                                                    src="{{ $follower->userDoingTheFollowing->avatar }}" />
                                                {{ $follower->userDoingTheFollowing->username }}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="menu-wrap info col-4">
                    <ul class="menu">
                        <li class="menu-item-custom">
                            <a href="#">{{ $sharedData['followingCount'] }}</a>
                            <div class="dd-a"><span>Following</span></div>
                            <ul class="drop-menu">
                                @foreach ($sharedData['followings'] as $following)
                                    <li class="mb-1">
                                        <a href="/profile/{{ $following->userBeingFollowed->username }}"
                                            class="drop-menu-item">
                                            <div class="row justify-content-center">
                                                <img class="avatar-tiny"
                                                    src="{{ $following->userBeingFollowed->avatar }}" />
                                                {{ $following->userBeingFollowed->username }}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="profile-slot-content pt-10">
            @foreach ($sharedData['posts'] as $post)
                <x-post :post="$post" hideAuthor />
            @endforeach
        </div>
    </div>
</x-layout>
