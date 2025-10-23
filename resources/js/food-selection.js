/**
 * Food Selection Component JavaScript
 * Handles food item search, selection, and management
 */

let selectedFoodItem = null;
let selectedFoodIds = new Set();

// Initialize selected food IDs from existing items
function initializeSelectedFoodIds() {
    document.querySelectorAll('.selected-food-item').forEach(item => {
        const foodId = item.getAttribute('data-food-id');
        if (foodId) {
            selectedFoodIds.add(foodId);
        }
    });
}

// Update food grid to show already added items
function updateFoodGrid() {
    document.querySelectorAll('.food-item-card').forEach(card => {
        const foodId = card.getAttribute('data-food-id');
        if (selectedFoodIds.has(foodId)) {
            card.classList.add('disabled');
            // Check if already-added indicator exists before adding
            if (!card.querySelector('.food-item-already-added')) {
                card.innerHTML = card.innerHTML.replace('</div>', '<div class="food-item-already-added">Déjà ajouté</div></div>');
            }
        } else {
            card.classList.remove('disabled');
            const alreadyAdded = card.querySelector('.food-item-already-added');
            if (alreadyAdded) {
                alreadyAdded.remove();
            }
        }
    });
}

// Food search functionality
function initializeFoodSearch() {
    const searchInput = document.getElementById('foodSearch');
    
    if (searchInput) {
        // Remove any existing event listeners to prevent duplicates
        const newSearchInput = searchInput.cloneNode(true);
        searchInput.parentNode.replaceChild(newSearchInput, searchInput);
        
        newSearchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            const foodCards = document.querySelectorAll('.food-item-card');
            
            foodCards.forEach(card => {
                const foodName = card.getAttribute('data-food-name');
                if (foodName) {
                    const name = foodName.toLowerCase();
                    if (searchTerm === '' || name.includes(searchTerm)) {
                        card.style.display = 'block';
                        card.style.visibility = 'visible';
                    } else {
                        card.style.display = 'none';
                        card.style.visibility = 'hidden';
                    }
                }
            });
        });
        
        // Also add keyup event as backup
        newSearchInput.addEventListener('keyup', function(e) {
            e.target.dispatchEvent(new Event('input'));
        });
    }
}

// Food item selection
function initializeFoodItemSelection() {
    document.querySelectorAll('.food-item-card').forEach(card => {
        card.addEventListener('click', function() {
            if (this.classList.contains('disabled')) {
                return;
            }

            // Remove previous selection
            document.querySelectorAll('.food-item-card').forEach(c => c.classList.remove('selected'));
            
            // Add selection to clicked card
            this.classList.add('selected');
            selectedFoodItem = {
                id: this.getAttribute('data-food-id'),
                name: this.getAttribute('data-food-name'),
                calories: this.getAttribute('data-food-calories'),
                protein: this.getAttribute('data-food-protein'),
                fat: this.getAttribute('data-food-fat'),
                carbs: this.getAttribute('data-food-carbs'),
                servingSize: this.getAttribute('data-food-serving-size'),
                servingType: this.getAttribute('data-food-serving-type')
            };

            // Enable add button
            const addButton = document.getElementById('addSelectedFood');
            if (addButton) {
                addButton.disabled = false;
            }
        });
    });
}

// Add selected food item
function initializeAddFoodButton() {
    const addButton = document.getElementById('addSelectedFood');
    if (addButton) {
        addButton.addEventListener('click', function() {
            if (!selectedFoodItem) return;

            const container = document.getElementById('selectedFoodItems');
            if (!container) return;
            
            const index = container.querySelectorAll('.selected-food-item').length;

            const foodItemHtml = `
                <div class="selected-food-item" data-food-id="${selectedFoodItem.id}">
                    <div class="selected-food-info">
                        <div class="selected-food-name">${selectedFoodItem.name}</div>
                        <div class="selected-food-nutrition">
                            ${selectedFoodItem.calories} cal | ${selectedFoodItem.protein}g protein | ${selectedFoodItem.fat}g fat | ${selectedFoodItem.carbs}g carbs
                        </div>
                    </div>
                    <div class="quantity-unit-group">
                    <input type="number" 
                           step="any" 
                           name="food_items[${index}][quantity]" 
                           class="quantity-input" 
                           placeholder="Quantité" 
                           required>
                        <span class="unit-display">${selectedFoodItem.servingType || 'g'}</span>
                    </div>
                    <input type="hidden" name="food_items[${index}][food_id]" value="${selectedFoodItem.id}">
                    <input type="hidden" name="food_items[${index}][unit]" value="${selectedFoodItem.servingType || 'g'}">
                    <button type="button" class="btn-remove-food" onclick="removeFoodItem(this)">&times;</button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', foodItemHtml);

            // Add to selected IDs
            selectedFoodIds.add(selectedFoodItem.id);

            // Reset selection
            selectedFoodItem = null;
            document.querySelectorAll('.food-item-card').forEach(c => c.classList.remove('selected'));
            this.disabled = true;

            // Update grid
            updateFoodGrid();
        });
    }
}

// Remove food item
function removeFoodItem(button) {
    const foodItem = button.closest('.selected-food-item');
    const foodId = foodItem.getAttribute('data-food-id');
    
    // Remove from selected IDs
    selectedFoodIds.delete(foodId);
    
    // Remove from DOM
    foodItem.remove();
    
    // Update grid
    updateFoodGrid();
    
    // Renumber remaining items
    renumberFoodItems();
}

// Renumber food items for proper form submission
function renumberFoodItems() {
    const container = document.getElementById('selectedFoodItems');
    if (!container) return;
    
    container.querySelectorAll('.selected-food-item').forEach((item, index) => {
        const quantityInput = item.querySelector('input[name*="[quantity]"]');
        const unitInput = item.querySelector('input[name*="[unit]"]');
        const foodIdInput = item.querySelector('input[name*="[food_id]"]');
        
        if (quantityInput) quantityInput.setAttribute('name', `food_items[${index}][quantity]`);
        if (unitInput) unitInput.setAttribute('name', `food_items[${index}][unit]`);
        if (foodIdInput) foodIdInput.setAttribute('name', `food_items[${index}][food_id]`);
    });
}

// Initialize all food selection functionality
function initializeFoodSelection() {
    initializeSelectedFoodIds();
    updateFoodGrid();
    initializeFoodSearch();
    initializeFoodItemSelection();
    initializeAddFoodButton();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeFoodSelection();
    
    // Fallback initialization with delay in case of timing issues
    setTimeout(function() {
        const searchInput = document.getElementById('foodSearch');
        if (searchInput && !searchInput.hasAttribute('data-initialized')) {
            searchInput.setAttribute('data-initialized', 'true');
            initializeFoodSelection();
        }
    }, 1000);
});

// Make functions globally available for onclick handlers
window.removeFoodItem = removeFoodItem;
