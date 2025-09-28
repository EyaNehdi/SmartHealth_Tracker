@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Food Items</li>
                </ol>
            </nav>
        </div>

        @forelse ($foods as $food)
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="ms-card">
                <div class="ms-card-body">
                    <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                            <img src="{{ $food->image ? asset('storage/' . $food->image) : asset('assets2/img/food-placeholder.png') }}" alt="{{ $food->name }}" class="ms-img-round">
                        </div>
                        <div class="media-body">
                            <h6>{{ $food->name }}</h6>
                            <div class="dropdown float-right">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="ms-dropdown-list">
                                        <a class="media p-2" href="{{ route('admin.food.show', $food->id) }}">
                                            <div class="media-body"><span>View Details</span></div>
                                        </a>
                                        <a class="media p-2" href="{{ route('admin.food.edit', $food->id) }}">
                                            <div class="media-body"><span>Edit</span></div>
                                        </a>
                                        <form action="{{ route('admin.food.destroy', $food->id) }}" method="POST" class="media p-2" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 m-0">
                                                <div class="media-body"><span>Delete</span></div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <p class="fs-12 my-1 text-disabled">{{ Str::limit($food->description, 80) }}</p>
                            <p>Calories: {{ $food->calories }} kcal</p>
                            <p>Protein: {{ $food->protein }} g, Fat: {{ $food->fat }} g, Carbs: {{ $food->carbs }} g</p>
                            <p>Serving size: {{ $food->serving_size ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No food items available.</p>
        @endforelse

    </div>
</div>

@endsection