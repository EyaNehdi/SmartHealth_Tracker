@extends('shared.layouts.frontoffice')

@section('page-title', $meal->name . ' - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">{{ $meal->name }}</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('meals.front.index') }}">Repas</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>{{ $meal->name }}</span>
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

        <!-- meal-details-area -->
        <section class="meal-details-area section-py-150">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <div class="meal-details-content">
                            <!-- Meal Image -->
                            <div class="meal-image mb-4">
                                @if($meal->image)
                                    <img src="{{ asset('storage/' . $meal->image) }}" 
                                         alt="{{ $meal->name }}" 
                                         class="img-fluid w-100 rounded">
                                @else
                                    <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}" 
                                         alt="{{ $meal->name }}" 
                                         class="img-fluid w-100 rounded">
                                @endif
                            </div>

                            <!-- Meal Description -->
                            <div class="meal-description mb-4">
                                <h3 class="mb-3">Description</h3>
                                <p class="text-muted">{{ $meal->description }}</p>
                            </div>

                            <!-- Ingredients -->
                            <div class="meal-ingredients mb-4">
                                <h3 class="mb-3">Ingrédients</h3>
                                @if($meal->foodItems->count() > 0)
                                    <div class="ingredients-list">
                                        @foreach($meal->foodItems as $foodItem)
                                            <div class="ingredient-item d-flex align-items-center mb-3 p-3 bg-light rounded">
                                                <div class="ingredient-icon me-3">
                                                    <i class="fas fa-apple-alt text-primary fa-2x"></i>
                                                </div>
                                                <div class="ingredient-info flex-grow-1">
                                                    <h6 class="mb-1">{{ $foodItem->name }}</h6>
                                                    <small class="text-muted">
                                                        Quantité: {{ $foodItem->pivot->quantity }} {{ $foodItem->pivot->unit ?? 'g' }}
                                                    </small>
                                                </div>
                                                <div class="ingredient-nutrition text-end">
                                                    <small class="d-block">
                                                        <strong>{{ number_format($foodItem->calories) }}</strong> cal
                                                    </small>
                                                    <small class="d-block text-muted">
                                                        {{ number_format($foodItem->protein) }}g prot
                                                    </small>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">Aucun ingrédient ajouté.</p>
                                @endif
                            </div>

                            <!-- Recipe -->
                            @if($meal->recipe)
                                <div class="meal-recipe mb-4">
                                    <h3 class="mb-3">Instructions de préparation</h3>
                                    <div class="recipe-content p-4 bg-light rounded">
                                        {!! nl2br(e($meal->recipe)) !!}
                                    </div>
                                </div>
                            @endif

                            <!-- Recipe Attachment -->
                            @if($meal->recipe_attachment)
                                <div class="meal-attachment mb-4">
                                    <h3 class="mb-3">Recette détaillée</h3>
                                    @if(filter_var($meal->recipe_attachment, FILTER_VALIDATE_URL))
                                        <a href="{{ $meal->recipe_attachment }}" target="_blank" class="btn btn-outline-primary">
                                            <i class="fas fa-external-link-alt me-2"></i>Voir la recette complète
                                        </a>
                                    @else
                                        <a href="{{ asset('storage/' . $meal->recipe_attachment) }}" target="_blank" class="btn btn-outline-primary">
                                            <i class="fas fa-download me-2"></i>Télécharger la recette
                                        </a>
                                    @endif
                                </div>
                            @endif

                            <!-- Back Button -->
                            <div class="mt-5">
                                <a href="{{ route('meals.front.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Retour aux repas
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="meal-sidebar">
                            <!-- Nutrition Facts -->
                            <div class="nutrition-card mb-4 p-4 bg-white rounded shadow-sm">
                                <h4 class="mb-4 text-center">Valeurs Nutritionnelles</h4>
                                
                                <div class="nutrition-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-fire text-danger me-3 fa-lg"></i>
                                        <span>Calories</span>
                                    </div>
                                    <strong>{{ number_format($meal->total_calories) }} kcal</strong>
                                </div>

                                <div class="nutrition-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-drumstick-bite text-primary me-3 fa-lg"></i>
                                        <span>Protéines</span>
                                    </div>
                                    <strong>{{ number_format($meal->total_protein) }}g</strong>
                                </div>

                                <div class="nutrition-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bread-slice text-warning me-3 fa-lg"></i>
                                        <span>Glucides</span>
                                    </div>
                                    <strong>{{ number_format($meal->total_carbs) }}g</strong>
                                </div>

                                <div class="nutrition-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-droplet text-info me-3 fa-lg"></i>
                                        <span>Lipides</span>
                                    </div>
                                    <strong>{{ number_format($meal->total_fats) }}g</strong>
                                </div>
                            </div>

                            <!-- Meal Info -->
                            <div class="meal-info-card p-4 bg-white rounded shadow-sm">
                                <h4 class="mb-4 text-center">Informations</h4>
                                
                                <div class="info-item mb-3">
                                    <i class="fas fa-clock text-success me-2"></i>
                                    <strong>Temps de préparation:</strong>
                                    <span class="d-block ms-4">{{ $meal->preparation_time }} minutes</span>
                                </div>

                                <div class="info-item mb-3">
                                    <i class="fas fa-utensils text-primary me-2"></i>
                                    <strong>Moment du repas:</strong>
                                    <span class="d-block ms-4 text-capitalize">
                                        @switch($meal->meal_time)
                                            @case('breakfast')
                                                Petit-déjeuner
                                                @break
                                            @case('lunch')
                                                Déjeuner
                                                @break
                                            @case('dinner')
                                                Dîner
                                                @break
                                            @case('snack')
                                                Collation
                                                @break
                                            @default
                                                {{ $meal->meal_time }}
                                        @endswitch
                                    </span>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-apple-alt text-danger me-2"></i>
                                    <strong>Ingrédients:</strong>
                                    <span class="d-block ms-4">{{ $meal->foodItems->count() }} ingrédient(s)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- meal-details-area-end -->

    </main>
@endsection

@push('frontoffice-styles')
<style>
.meal-sidebar .nutrition-card,
.meal-sidebar .meal-info-card {
    border: 1px solid #e0e0e0;
}

.meal-sidebar h4 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 20px;
}

.nutrition-item,
.info-item {
    font-size: 15px;
}

.ingredient-item {
    transition: all 0.3s ease;
}

.ingredient-item:hover {
    background-color: #e8f4fd !important;
    transform: translateX(5px);
}

.recipe-content {
    line-height: 1.8;
    white-space: pre-line;
}

.meal-image img {
    max-height: 500px;
    object-fit: cover;
}
</style>
@endpush

