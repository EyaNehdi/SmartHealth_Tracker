@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('admin.food.add') }}" class="btn btn-primary">
                    Add Food Item
                </a>
            </div>
            <div class="row">
                @forelse ($foods as $food)
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="ms-card shadow-sm h-100">
                        <div class="ms-card-body d-flex">
                            <div class="mr-3 align-self-center">
                                <img src="{{ $food->image ? asset('storage/' . $food->image) : asset('assets2/img/food-placeholder.png') }}"
                                    alt="{{ $food->name }}" class="ms-img-round" style="width: 75px; height: 75px; object-fit: cover;">
                            </div>
                            <div class="media-body flex-grow-1">
                                <h5 class="mb-1">{{ $food->name }}</h5>

                                <p class="fs-12 text-truncate text-muted">{{ Str::limit($food->description, 100) }}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="nutrition fs-13 text-muted">
                                        <span>Calories: {{ $food->calories }} kcal</span> |
                                        <span>Protein: {{ $food->protein }} g</span> |
                                        <span>Fat: {{ $food->fat }} g</span> |
                                        <span>Carbs: {{ $food->carbs }} g</span>
                                    </div>

                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons fs-18">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="ms-dropdown-list px-2">
                                                <a href="{{ route('admin.food.show', $food->id) }}" class="dropdown-item">View Details</a>
                                                <a href="{{ route('admin.food.edit', $food->id) }}" class="dropdown-item">Edit</a>
                                                <form action="{{ route('admin.food.destroy', $food->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger p-0">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <p class="fs-12 mt-1">Serving size: {{ $food->serving_size ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">No food items available.</p>
                @endforelse
            </div>

        </div>
    </div>
</div>

@endsection