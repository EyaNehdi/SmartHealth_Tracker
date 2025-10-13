@extends('shared.layouts.frontoffice')

@section('page-title', 'Challenges - SmartHealth Tracker')

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
                            <h2 class="title">Objectifs</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index-2.html">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Objectif</span>
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

        <!-- blog-post-area -->
        <section class="blog__post-area section-py-150">
            <div class="container">
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="inner-blog-post-wrap">
                            <div class="blog__post-item-four">
                                <a href="{{ route('challenges.create') }}">Créer un nouveau challenge</a>

                                @if (session('success'))
                                    <p style="color:green">{{ session('success') }}</p>
                                @endif
                                @forelse($allChallenges as $challenge)
                                    @if ($challenge->image)
                                        <div class="blog__post-thumb-four">
                                            <br>
                                            <img src="{{ asset('storage/' . $challenge->image) }}"
                                                alt="Challenge Image">
                                        </div>
                                    @else
                                        <div class="blog__post-thumb-four">
                                            <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}"
                                                alt="img">
                                        </div>
                                    @endif



                                    <div class="blog__post-content-four">
                                        <div class="blog__post-meta blog__post-meta-three">
                                            <ul class="list-wrap">
                                                <li>
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.1111 2V4.80003M5.88888 2V4.80003M2 7.59992H16M3.55556 3.39988H14.4444C15.3036 3.39988 16 4.02668 16 4.79989V14.6C16 15.3732 15.3036 16 14.4444 16H3.55556C2.69645 16 2 15.3732 2 14.6V4.79989C2 4.02668 2.69645 3.39988 3.55556 3.39988Z"
                                                            stroke="currentColor" stroke-width="1.1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <a href="blog-details.html"> {{ $challenge->dateDebut }} </a>
                                                    <span> - </span>
                                                    <a href="blog-details.html"> {{ $challenge->dateFin }} </a>

                                                </li>
                                                <li
                                                    class="flex items-center gap-3 bg-gray-100 rounded-xl px-4 py-2 w-max shadow-lg">
                                                    <!-- Participants Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-10 h-10 text-green-500" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                                    </svg>

                                                    <!-- Number + Text side by side -->
                                                    <div class="flex flex-col">
                                                        <span
                                                            class="text-xl font-bold">{{ $challenge->participations_count }}</span>
                                                        <span class="text-sm text-gray-700">Participants</span>
                                                    </div>
                                                </li>






                                            </ul>
                                        </div>
                                        <h2 class="title"><a href="blog-details.html">{{ $challenge->titre }}</a>
                                        </h2>
                                        <p>{{ $challenge->description }}</p>

                                        {{-- Edit & Delete buttons only for creator --}}
                                        @if (auth()->id() === $challenge->created_by)
                                            <a href="{{ route('challenges.edit', $challenge->id) }}"
                                                class="tg-btn tg-btn-three">Edit</a>

                                            <form action="{{ route('challenges.destroy', $challenge->id) }}"
                                                method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tg-btn tg-btn-three"
                                                    onclick="return confirm('Are you sure you want to delete this challenge?')">Delete</button>
                                            </form>
                                        @endif


                                        @if (auth()->id() === $challenge->created_by)
                                            <span class="badge bg-secondary">Vous êtes le créateur</span>
                                        @elseif($challenge->isParticipatedBy(auth()->id()))
                                            <span class="badge bg-warning">Vous avez déjà participé</span>
                                        @else
                                            <a href="#" class="tg-btn tg-btn-three" data-bs-toggle="modal"
                                                data-bs-target="#participationModal{{ $challenge->id }}">
                                                Participer
                                            </a>
                                        @endif
                                        <!-- Participation Modal -->
                                        <div class="modal fade" id="participationModal{{ $challenge->id }}"
                                            tabindex="-1"
                                            aria-labelledby="participationModalLabel{{ $challenge->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('participations.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="challenge_id"
                                                            value="{{ $challenge->id }}">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="participationModalLabel{{ $challenge->id }}">
                                                                Participer au challenge: {{ $challenge->titre }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->id() }}">
                                                            <p><strong>Utilisateur :</strong>
                                                                {{ auth()->user()->name }}</p>


                                                            <div class="mb-3">
                                                                <label for="comment{{ $challenge->id }}"
                                                                    class="form-label">Commentaire</label>
                                                                <textarea name="comment" id="comment{{ $challenge->id }}" class="form-control"></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="image{{ $challenge->id }}"
                                                                    class="form-label">Image</label>
                                                                <input type="file" name="image"
                                                                    id="image{{ $challenge->id }}"
                                                                    class="form-control" accept="image/*">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Participer</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                @empty
                                    <li>Vous n'avez créé aucun challenge.</li>
                                @endforelse
                            </div>

                        </div>
                        <nav class="pagination__wrap mt-40">
                            <ul class="list-wrap">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="shop.html">2</a></li>
                                <li><a href="shop.html">3</a></li>
                                <li><a href="shop.html">4</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-30">
                        <aside class="blog__sidebar">
                            <div class="sidebar__widget">
                                <form action="{{ route('challenges.index') }}" method="GET" class="blog__search">
                                    <input type="text" name="query" placeholder="Search"
                                        value="{{ $search ?? '' }}">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M17 17L13.5247 13.5247M15.681 8.3405C15.681 12.3945 12.3945 15.681 8.3405 15.681C4.28645 15.681 1 12.3945 1 8.3405C1 4.28645 4.28645 1 8.3405 1C12.3945 1 15.681 4.28645 15.681 8.3405Z"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>


                            @if ($mostParticipated)
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">le plus populaire objectif</h4>
                                    <div class="rc-post-wrap">
                                        <div class="rc-post-item">
                                            <div class="thumb">
                                                <br>
                                                <img src="{{ asset('storage/' . $mostParticipated->image) }}"
                                                    alt="Challenge Image">
                                            </div>
                                            <div class="content">
                                                <span class="date">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.1111 2V4.80003M5.88888 2V4.80003M2 7.59992H16M3.55556 3.39988H14.4444C15.3036 3.39988 16 4.02668 16 4.79989V14.6C16 15.3732 15.3036 16 14.4444 16H3.55556C2.69645 16 2 15.3732 2 14.6V4.79989C2 4.02668 2.69645 3.39988 3.55556 3.39988Z"
                                                            stroke="currentColor" stroke-width="1.1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    {{ $mostParticipated->dateDebut }} -
                                                    {{ $mostParticipated->dateFin }}
                                                </span>
                                                <h2 class="title"><a
                                                        href="blog-details.html">{{ $mostParticipated->titre }}</a>
                                                </h2>
                                                ({{ $mostParticipated->participations_count }} participants)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Categories</h4>
                                <div class="bs-cat-list">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html">sport <span>(02)</span></a></li>
                                        <li><a href="blog.html">fitness <span>(08)</span></a></li>
                                        <li><a href="blog.html">régime <span>(05)</span></a></li>
                                        <li><a href="blog.html">sleep <span>(02)</span></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar__widget">
                                <div class="sidebar__contact">
                                    <h4 class="title">We Have More Than Years Marketing Experience</h4>
                                    <p>It is a long established fact that reader will be distracted.</p>
                                    <a href="contact.html" class="tg-btn tg-btn-three">Contact With Us</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-post-area-end -->

    </main>
@endsection
