@extends('shared.layouts.backoffice')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="material-icons">home</i> Home</a></li>
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
                            <p class="fs-12 my-1 text-disabled">{{ Str::limit($categorie->description, 80) }}</p>

                            <div class="mt-2 d-flex gap-2">
                                <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-sm btn-primary">
                                    <i class="material-icons fs-16">edit</i> Modifier
                                </a>
                                
                                <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="material-icons fs-16">delete</i> Supprimer
                                    </button>
                                </form>
                            </div>
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
