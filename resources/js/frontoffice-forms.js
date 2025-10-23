/**
 * Frontoffice Forms JavaScript
 * Handles all frontoffice form interactions for meals and meal plans
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize form functionality
    initImagePreview();
    initFoodItemManagement();
    initMealPlanAssignmentGrid();
    initFormValidation();
});

/**
 * Image preview functionality
 */
function initImagePreview() {
    const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
    
    imageInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                previewImage(file, input);
            }
        });
    });

    // Remove image buttons
    document.addEventListener('click', function(e) {
        if (e.target.closest('#remove-image')) {
            removeImagePreview(e.target.closest('#remove-image'));
        }
    });
}

function previewImage(file, input) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const previewContainer = input.parentNode.querySelector('.image-preview');
        if (previewContainer) {
            const previewImg = previewContainer.querySelector('#preview-img');
            if (previewImg) {
                previewImg.src = e.target.result;
                previewContainer.style.display = 'block';
            }
        }
    };
    reader.readAsDataURL(file);
}

function removeImagePreview(button) {
    const imageInput = button.closest('.form-group').querySelector('input[type="file"]');
    const previewContainer = button.closest('.image-preview');
    
    if (imageInput) {
        imageInput.value = '';
    }
    if (previewContainer) {
        previewContainer.style.display = 'none';
    }
}

/**
 * Food item management for meals
 */
function initFoodItemManagement() {
    const foodSearchInputs = document.querySelectorAll('#food-search');
    
    foodSearchInputs.forEach(input => {
        setupFoodSearch(input);
    });

    // Remove food item buttons
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-food')) {
            e.target.closest('.food-item-card').remove();
        }
    });
}

function setupFoodSearch(input) {
    const addButton = input.parentNode.parentNode.querySelector('#add-food-btn');
    const foodItemsList = input.closest('.food-selection-container').querySelector('#food-items-list');
    
    let selectedFoodItem = null;
    let foodItemIndex = window.foodItemIndex || foodItemsList.children.length;

    input.addEventListener('input', function() {
        const searchTerm = input.value.toLowerCase();
        if (searchTerm.length < 2) {
            selectedFoodItem = null;
            addButton.disabled = true;
            addButton.innerHTML = '<i class="fas fa-plus me-1"></i>Ajouter';
            return;
        }

        // Get available food items from global variable
        const availableFoodItems = window.availableFoodItems || [];
        const matchingFoods = availableFoodItems.filter(food => 
            food.name.toLowerCase().includes(searchTerm)
        );

        if (matchingFoods.length > 0) {
            selectedFoodItem = matchingFoods[0];
            addButton.disabled = false;
            addButton.innerHTML = `<i class="fas fa-plus me-1"></i>Ajouter "${selectedFoodItem.name}"`;
        } else {
            selectedFoodItem = null;
            addButton.disabled = true;
            addButton.innerHTML = '<i class="fas fa-plus me-1"></i>Ajouter';
        }
    });

    addButton.addEventListener('click', function() {
        if (!selectedFoodItem) return;

        // Check if food item already exists
        const existingItem = foodItemsList.querySelector(`[data-food-id="${selectedFoodItem.id}"]`);
        if (existingItem) {
            alert('Cet ingrédient est déjà ajouté au repas.');
            return;
        }

        const foodItemCard = createFoodItemCard(selectedFoodItem, foodItemIndex);
        foodItemsList.appendChild(foodItemCard);
        
        foodItemIndex++;
        input.value = '';
        selectedFoodItem = null;
        addButton.disabled = true;
        addButton.innerHTML = '<i class="fas fa-plus me-1"></i>Ajouter';
    });
}

function createFoodItemCard(foodItem, index) {
    const card = document.createElement('div');
    card.className = 'food-item-card';
    card.setAttribute('data-food-id', foodItem.id);
    
    card.innerHTML = `
        <div class="food-item-info">
            <h6 class="food-item-name">${foodItem.name}</h6>
            <small class="food-item-nutrition text-muted">
                ${foodItem.calories || 0} cal | ${foodItem.protein || 0}g prot
            </small>
        </div>
        <div class="food-item-quantity">
            <input type="number" 
                   name="food_items[${index}][quantity]" 
                   class="form-control quantity-input" 
                   value="100" 
                   step="0.01" 
                   min="0.01" 
                   required>
            <select name="food_items[${index}][unit]" class="form-select unit-select">
                <option value="g" selected>g</option>
                <option value="kg">kg</option>
                <option value="ml">ml</option>
                <option value="l">l</option>
                <option value="pieces">pièces</option>
                <option value="cups">tasses</option>
                <option value="tbsp">c. à soupe</option>
                <option value="tsp">c. à café</option>
            </select>
        </div>
        <input type="hidden" name="food_items[${index}][food_id]" value="${foodItem.id}">
        <button type="button" class="btn btn-outline-danger btn-sm remove-food">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    return card;
}

/**
 * Meal plan assignment grid functionality
 */
function initMealPlanAssignmentGrid() {
    const assignmentGrid = document.querySelector('#assignment-grid');
    if (!assignmentGrid) return;

    const mealSearchInput = document.querySelector('#meal-search');
    const addMealBtn = document.querySelector('#add-meal-btn');
    const totalDaysInput = document.querySelector('#total_days');
    
    if (!mealSearchInput || !addMealBtn || !totalDaysInput) return;

    let selectedMeal = null;
    let totalDays = parseInt(totalDaysInput.value) || 7;
    let assignments = window.existingAssignments || {};

    const mealTimes = ['breakfast', 'lunch', 'dinner', 'snack'];
    const mealTimeLabels = {
        'breakfast': 'Petit-déjeuner',
        'lunch': 'Déjeuner', 
        'dinner': 'Dîner',
        'snack': 'Collation'
    };

    // Make selectedMeal available globally
    window.selectedMeal = selectedMeal;
    window.availableMeals = window.availableMeals || [];

    // Initialize grid when total days changes
    totalDaysInput.addEventListener('input', function() {
        totalDays = parseInt(this.value) || 7;
        generateAssignmentGrid();
    });

    // Meal search functionality
    mealSearchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        if (searchTerm.length < 2) {
            selectedMeal = null;
            window.selectedMeal = null;
            addMealBtn.disabled = true;
            addMealBtn.innerHTML = '<i class="fas fa-plus me-1"></i>Sélectionner un repas';
            return;
        }

        const matchingMeals = window.availableMeals.filter(meal => 
            meal.name.toLowerCase().includes(searchTerm)
        );

        if (matchingMeals.length > 0) {
            selectedMeal = matchingMeals[0];
            window.selectedMeal = selectedMeal;
            addMealBtn.disabled = false;
            addMealBtn.innerHTML = `<i class="fas fa-plus me-1"></i>Sélectionner "${selectedMeal.name}"`;
        } else {
            selectedMeal = null;
            window.selectedMeal = null;
            addMealBtn.disabled = true;
            addMealBtn.innerHTML = '<i class="fas fa-plus me-1"></i>Sélectionner un repas';
        }
    });

    // Generate assignment grid
    function generateAssignmentGrid() {
        assignmentGrid.innerHTML = '';
        
        // Create header row
        const headerRow = document.createElement('div');
        headerRow.className = 'assignment-row assignment-header';
        
        const dayHeader = document.createElement('div');
        dayHeader.className = 'assignment-cell assignment-day-header';
        dayHeader.textContent = 'Jour';
        headerRow.appendChild(dayHeader);
        
        mealTimes.forEach(mealTime => {
            const cell = document.createElement('div');
            cell.className = 'assignment-cell assignment-meal-header';
            cell.textContent = mealTimeLabels[mealTime];
            headerRow.appendChild(cell);
        });
        
        assignmentGrid.appendChild(headerRow);
        
        // Create day rows
        for (let day = 1; day <= totalDays; day++) {
            const row = document.createElement('div');
            row.className = 'assignment-row';
            
            // Day number cell
            const dayCell = document.createElement('div');
            dayCell.className = 'assignment-cell assignment-day';
            dayCell.textContent = `Jour ${day}`;
            row.appendChild(dayCell);
            
            // Meal time cells
            mealTimes.forEach(mealTime => {
                const cell = document.createElement('div');
                cell.className = 'assignment-cell assignment-meal';
                cell.dataset.day = day;
                cell.dataset.mealTime = mealTime;
                
                const cellContent = document.createElement('div');
                cellContent.className = 'meal-assignment-content';
                
                const assignmentKey = `${day}_${mealTime}`;
                if (assignments[assignmentKey]) {
                    const meal = assignments[assignmentKey];
                    cellContent.innerHTML = `
                        <div class="assigned-meal">
                            <div class="meal-name">${meal.meal_name || meal.name}</div>
                            <div class="meal-calories">${meal.total_calories || 0} cal</div>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-assignment">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                } else {
                    cellContent.innerHTML = `
                        <div class="empty-assignment">
                            <i class="fas fa-plus text-muted"></i>
                            <small class="text-muted">Cliquer pour ajouter</small>
                        </div>
                    `;
                }
                
                cell.appendChild(cellContent);
                row.appendChild(cell);
            });
            
            assignmentGrid.appendChild(row);
        }
    }

    // Handle cell clicks for meal assignment
    assignmentGrid.addEventListener('click', function(e) {
        const cell = e.target.closest('.assignment-meal');
        if (!cell) return;
        
        if (e.target.closest('.remove-assignment')) {
            removeMealFromCell(cell);
            return;
        }
        
        if (!selectedMeal) {
            alert('Veuillez d\'abord sélectionner un repas à ajouter.');
            return;
        }
        
        assignMealToCell(cell, selectedMeal);
    });

    function assignMealToCell(cell, meal) {
        const day = cell.dataset.day;
        const mealTime = cell.dataset.mealTime;
        const assignmentKey = `${day}_${mealTime}`;
        
        assignments[assignmentKey] = meal;
        
        const cellContent = cell.querySelector('.meal-assignment-content');
        cellContent.innerHTML = `
            <div class="assigned-meal">
                <div class="meal-name">${meal.name}</div>
                <div class="meal-calories">${meal.total_calories || 0} cal</div>
                <button type="button" class="btn btn-sm btn-outline-danger remove-assignment">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        updateAssignmentInputs();
    }

    function removeMealFromCell(cell) {
        const day = cell.dataset.day;
        const mealTime = cell.dataset.mealTime;
        const assignmentKey = `${day}_${mealTime}`;
        
        delete assignments[assignmentKey];
        
        const cellContent = cell.querySelector('.meal-assignment-content');
        cellContent.innerHTML = `
            <div class="empty-assignment">
                <i class="fas fa-plus text-muted"></i>
                <small class="text-muted">Cliquer pour ajouter</small>
            </div>
        `;
        
        updateAssignmentInputs();
    }

    function updateAssignmentInputs() {
        const assignmentInputs = document.querySelector('#assignment-inputs');
        if (!assignmentInputs) return;

        assignmentInputs.innerHTML = '';
        
        Object.keys(assignments).forEach(key => {
            const [day, mealTime] = key.split('_');
            const meal = assignments[key];
            
            const dayInput = document.createElement('input');
            dayInput.type = 'hidden';
            dayInput.name = `assignments[${key}][day_number]`;
            dayInput.value = day;
            
            const mealTimeInput = document.createElement('input');
            mealTimeInput.type = 'hidden';
            mealTimeInput.name = `assignments[${key}][meal_time]`;
            mealTimeInput.value = mealTime;
            
            const mealIdInput = document.createElement('input');
            mealIdInput.type = 'hidden';
            mealIdInput.name = `assignments[${key}][meal_id]`;
            mealIdInput.value = meal.id;
            
            assignmentInputs.appendChild(dayInput);
            assignmentInputs.appendChild(mealTimeInput);
            assignmentInputs.appendChild(mealIdInput);
        });
    }

    // Initialize grid on page load
    generateAssignmentGrid();
}

/**
 * Basic form validation
 */
function initFormValidation() {
    const forms = document.querySelectorAll('.meal-form, .meal-plan-form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(form)) {
                e.preventDefault();
                alert('Veuillez corriger les erreurs dans le formulaire.');
                return;
            }
        });
    });
}

function validateForm(form) {
    const requiredInputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;
    
    requiredInputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    // Special validations
    const foodItems = form.querySelectorAll('.food-item-card');
    if (foodItems.length === 0 && form.classList.contains('meal-form')) {
        isValid = false;
        alert('Veuillez ajouter au moins un ingrédient.');
    }

    return isValid;
}