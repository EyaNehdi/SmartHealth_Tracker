@extends('shared.layouts.frontoffice')

@section('page-title', 'My Groups - SmartHealth Tracker')

@section('content')
    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">My Groups</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">My Groups</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape"
                    data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- groups-area -->
        <section class="blog__post-area section-py-150">
            <div class="container">
                <div class="row">
                    <!-- Left: Bubble-style group list -->
                    <div class="col-md-4">
                        <div class="inner-blog-post-wrap">
                            <h3 class="mb-4">Your Joined Groups</h3>
                            @if (session('success'))
                                <p class="text-success">{{ session('success') }}</p>
                            @endif
                            @forelse($challenges as $challenge)
                                <div class="group-bubble mb-3 p-3 rounded-full shadow-lg text-center"
                                    style="background: linear-gradient(135deg, #34d399, #60a5fa); cursor: pointer;"
                                    data-challenge-id="{{ $challenge->id }}"
                                    onclick="loadChat({{ $challenge->id }})">
                                    @if ($challenge->image)
                                        <img src="{{ asset('storage/' . $challenge->image) }}" alt="Challenge Image"
                                            class="rounded-full w-16 h-16 mx-auto mb-2">
                                    @else
                                        <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}"
                                            alt="img" class="rounded-full w-16 h-16 mx-auto mb-2">
                                    @endif
                                    <h4 class="title text-white text-sm">{{ $challenge->titre }}</h4>
                                    <p class="text-white text-xs">{{ $challenge->participations_count }} Participants</p>
                                    @if (auth()->id() === $challenge->created_by)
                                        <span class="badge bg-secondary text-xs">Creator</span>
                                    @endif
                                </div>
                            @empty
                                <p>You haven't joined any groups yet.</p>
                            @endforelse
                        </div>
                    </div>
                    <!-- Right: Chat area -->
                    <div class="col-md-8">
                        <div id="chat-area" class="shadow-lg p-4 rounded-lg"
                            style="background: #f0f9ff; min-height: 500px;">
                            <h3 id="chat-title" class="mb-4">Select a group to start chatting</h3>
                            <ul id="messages" class="list-unstyled mb-4"></ul>
                            <div class="input-group">
                                <input type="text" id="message" class="form-control" placeholder="Type a message..."
                                    disabled>
                                <button id="sendBtn" class="btn btn-primary" disabled>Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- groups-area-end -->
    </main>
    <!-- Meta tags for JavaScript -->
    <meta name="user-id" content="{{ auth()->id() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
