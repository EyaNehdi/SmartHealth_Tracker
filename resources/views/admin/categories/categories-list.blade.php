@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>

        @forelse ($categories as $categorie)
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="ms-card">
                <div class="ms-card-body">
                    <div class="media fs-14">
                        <div class="media-body">
                            <h6>{{ $categorie->nom }}</h6>
                            <div class="dropdown float-right">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="ms-dropdown-list">
                                        <a class="media p-2" href="{{ route('admin.categories.edit', $categorie->id) }}">
                                            <div class="media-body"><span>Edit</span></div>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="media p-2" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 m-0">
                                                <div class="media-body"><span>Delete</span></div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <p class="fs-12 my-1 text-disabled">{{ Str::limit($categorie->description, 80) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No categories available.</p>
        @endforelse

    </div>
</div>

@endsection
