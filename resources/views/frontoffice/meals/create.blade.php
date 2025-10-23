@extends('shared.layouts.frontoffice')

@section('page-title', 'Créer un Repas - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">Créer un Repas</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('meals.front.index') }}">Repas</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Créer</span>
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

        <!-- meal-create-area -->
        <section class="meal-create-area section-py-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="meal-form-container">
                            <!-- Form Header -->
                            <div class="form-header text-center mb-5">
                                <h3 class="form-title">Créer votre repas</h3>
                                <p class="form-subtitle text-muted">Partagez votre recette avec la communauté</p>
                            </div>

                            <!-- Form -->
                            <form method="POST" action="{{ route('meals.front.store') }}" 
                                  enctype="multipart/form-data" 
                                  class="meal-form" 
                                  novalidate>
                                @csrf

                                <!-- Basic Information Section -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <h4 class="section-title">
                                            <i class="fas fa-info-circle text-primary me-2"></i>
                                            Informations de base
                                        </h4>
                                    </div>
                                    
                                    <div class="section-body">
                                        <div class="row g-4">
                                            <!-- Meal Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">
                                                        Nom du repas <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           id="name" 
                                                           name="name" 
                                                           class="form-control @error('name') is-invalid @enderror" 
                                                           value="{{ old('name') }}" 
                                                           placeholder="Ex: Salade César au Poulet"
                                                           required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Meal Time -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meal_time" class="form-label">
                                                        Moment du repas <span class="text-danger">*</span>
                                                    </label>
                                                    <select id="meal_time" 
                                                            name="meal_time" 
                                                            class="form-select @error('meal_time') is-invalid @enderror" 
                                                            required>
                                                        <option value="">Sélectionnez un moment</option>
                                                        @foreach(config('meal_times.values') as $value)
                                                            <option value="{{ $value }}" {{ old('meal_time') == $value ? 'selected' : '' }}>
                                                                {{ config("meal_times.labels.{$value}") }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('meal_time')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Preparation Time -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="preparation_time" class="form-label">
                                                        Temps de préparation (minutes)
                                                    </label>
                                                    <input type="number" 
                                                           id="preparation_time" 
                                                           name="preparation_time" 
                                                           class="form-control @error('preparation_time') is-invalid @enderror" 
                                                           value="{{ old('preparation_time') }}" 
                                                           placeholder="Ex: 30"
                                                           min="0" 
                                                           max="1440">
                                                    @error('preparation_time')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Image Upload -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">
                                                        Photo du repas
                                                    </label>
                                                    <input type="file" 
                                                           id="image" 
                                                           name="image" 
                                                           class="form-control @error('image') is-invalid @enderror" 
                                                           accept="image/*">
                                                    <div class="form-text">Formats acceptés: JPG, PNG, GIF (max 2MB)</div>
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    
                                                    <!-- Image Preview -->
                                                    <div id="image-preview" class="image-preview mt-3" style="display: none;">
                                                        <img id="preview-img" src="" alt="Aperçu" class="preview-image">
                                                        <button type="button" id="remove-image" class="btn btn-sm btn-outline-danger mt-2">
                                                            <i class="fas fa-times me-1"></i>Supprimer l'image
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group mt-4">
                                            <label for="description" class="form-label">
                                                Description du repas
                                            </label>
                                            <textarea id="description" 
                                                      name="description" 
                                                      class="form-control @error('description') is-invalid @enderror" 
                                                      rows="4" 
                                                      placeholder="Décrivez votre repas, ses saveurs, ses bienfaits nutritionnels...">{{ old('description') }}</textarea>
                                            <div class="form-text">Description générale du repas, ses caractéristiques gustatives et ses bienfaits.</div>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Ingredients Section -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <h4 class="section-title">
                                            <i class="fas fa-apple-alt text-success me-2"></i>
                                            Ingrédients
                                        </h4>
                                        <p class="section-subtitle">Ajoutez les ingrédients de votre repas</p>
                                    </div>
                                    
                                    <div class="section-body">
                                        @php
                                        $existingFoodItems = old('food_items', []);
                                        @endphp
                                        
                                        @include('components.food-selection', [
                                            'foodItems' => $foodItems,
                                            'existingFoodItems' => $existingFoodItems,
                                            'errorKey' => 'food_items'
                                        ])
                                    </div>
                                </div>

                                <!-- Recipe Section -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <h4 class="section-title">
                                            <i class="fas fa-book text-warning me-2"></i>
                                            Recette (optionnel)
                                        </h4>
                                        <p class="section-subtitle">Partagez les étapes de préparation</p>
                                    </div>
                                    
                                    <div class="section-body">
                                        <div class="form-group">
                                            <label for="recipe_description" class="form-label">
                                                Instructions de préparation
                                            </label>
                                            <textarea id="recipe_description" 
                                                      name="recipe_description" 
                                                      class="form-control @error('recipe_description') is-invalid @enderror" 
                                                      rows="6" 
                                                      placeholder="Étape 1: Préchauffer le four à 180°C...">{{ old('recipe_description') }}</textarea>
                                            <div class="form-text">Instructions détaillées étape par étape pour préparer le repas.</div>
                                            @error('recipe_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Recipe Attachment and Tags -->
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="recipe_attachment" class="form-label">
                                                        Fichier de recette
                                                    </label>
                                                    <input type="file" 
                                                           id="recipe_attachment" 
                                                           name="recipe_attachment" 
                                                           class="form-control @error('recipe_attachment') is-invalid @enderror" 
                                                           accept=".pdf,.doc,.docx,.txt">
                                                    <div class="form-text">PDF, DOC, DOCX, TXT (max 10MB)</div>
                                                    @error('recipe_attachment')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tags" class="form-label">
                                                        Étiquettes
                                                    </label>
                                                    <input type="text" 
                                                           id="tags" 
                                                           name="tags" 
                                                           class="form-control @error('tags') is-invalid @enderror" 
                                                           placeholder="végétarien, sans gluten, keto, épicé..."
                                                           value="{{ old('tags') }}">
                                                    <div class="form-text">Séparez les étiquettes par des virgules (ex: végétarien, sans gluten)</div>
                                                    @error('tags')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Additional Notes -->
                                        <div class="form-group mt-3">
                                            <label for="notes" class="form-label">
                                                Notes supplémentaires
                                            </label>
                                            <textarea id="notes" 
                                                      name="notes" 
                                                      class="form-control @error('notes') is-invalid @enderror" 
                                                      rows="3" 
                                                      placeholder="Notes, conseils, variantes, substitutions d'ingrédients...">{{ old('notes') }}</textarea>
                                            <div class="form-text">Conseils supplémentaires, variantes, substitutions d'ingrédients ou suggestions de service.</div>
                                            @error('notes')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="form-actions">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <a href="{{ route('meals.front.index') }}" class="btn btn-outline-secondary w-100">
                                                <i class="fas fa-arrow-left me-2"></i>Annuler
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-save me-2"></i>Créer le repas
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- meal-create-area-end -->

    </main>
@endsection

@push('frontoffice-scripts')
<!-- Load food selection component JavaScript -->
@vite('resources/js/food-selection.js')
@endpush

@push('frontoffice-styles')
<!-- Load dedicated form styles -->
@vite('resources/css/frontoffice-forms.css')
<!-- Load food selection component styles -->
@vite('resources/css/food-selection.css')
@endpush
