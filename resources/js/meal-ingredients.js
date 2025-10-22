/**
 * Meal Ingredients Management JavaScript
 * Handles dynamic ingredient addition/removal for meals
 */

class MealIngredientsManager {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        this.modal = document.getElementById('addIngredientModal');
        this.form = document.getElementById('addIngredientForm');
        this.previewDiv = document.getElementById('nutritional-preview');
        
        this.init();
    }

    init() {
        this.bindEvents();
        this.setupNutritionalPreview();
    }

    bindEvents() {
        // Form submission
        this.form?.addEventListener('submit', (e) => this.handleAddIngredient(e));
        
        // Remove ingredient buttons
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('btn-remove-ingredient')) {
                this.handleRemoveIngredient(e);
            }
        });
    }

    setupNutritionalPreview() {
        const foodItemSelect = document.getElementById('food_item_id');
        const quantityInput = document.getElementById('quantity');
        
        if (foodItemSelect && quantityInput) {
            foodItemSelect.addEventListener('change', () => this.updateNutritionalPreview());
            quantityInput.addEventListener('input', () => this.updateNutritionalPreview());
        }
    }

    updateNutritionalPreview() {
        const foodItemSelect = document.getElementById('food_item_id');
        const quantityInput = document.getElementById('quantity');
        
        const selectedOption = foodItemSelect.options[foodItemSelect.selectedIndex];
        const quantity = parseFloat(quantityInput.value) || 0;
        
        if (selectedOption.value && quantity > 0) {
            const calories = parseFloat(selectedOption.dataset.calories) || 0;
            const protein = parseFloat(selectedOption.dataset.protein) || 0;
            const fat = parseFloat(selectedOption.dataset.fat) || 0;
            const carbs = parseFloat(selectedOption.dataset.carbs) || 0;
            const servingSize = selectedOption.dataset.servingSize || '100g';
            
            // Parse serving size (simplified calculation)
            const servingAmount = parseFloat(servingSize.replace(/[^\d.]/g, '')) || 100;
            const multiplier = quantity / servingAmount;
            
            document.getElementById('preview-calories').textContent = Math.round(calories * multiplier);
            document.getElementById('preview-protein').textContent = (protein * multiplier).toFixed(1) + 'g';
            document.getElementById('preview-fat').textContent = (fat * multiplier).toFixed(1) + 'g';
            document.getElementById('preview-carbs').textContent = (carbs * multiplier).toFixed(1) + 'g';
            
            this.previewDiv.style.display = 'block';
        } else {
            this.previewDiv.style.display = 'none';
        }
    }

    async handleAddIngredient(e) {
        e.preventDefault();
        
        const formData = new FormData(this.form);
        formData.append('meal_id', this.container.dataset.mealId);
        
        try {
            const response = await fetch(this.container.dataset.addUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                await this.loadIngredientsList();
                this.closeModal();
                this.resetForm();
                this.showNotification('Food item added successfully!', 'success');
            } else {
                this.showNotification(data.message || 'Error adding food item', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showNotification('Error adding food item', 'error');
        }
    }

    async handleRemoveIngredient(e) {
        const foodItemId = e.target.dataset.foodId;
        const removeUrl = this.container.dataset.removeUrl.replace('FOOD_ID', foodItemId);
        
        if (confirm('Are you sure you want to remove this ingredient?')) {
            try {
                const response = await fetch(removeUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    await this.loadIngredientsList();
                    this.showNotification('Ingredient removed successfully!', 'success');
                } else {
                    this.showNotification(data.message || 'Error removing ingredient', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showNotification('Error removing ingredient', 'error');
            }
        }
    }

    async loadIngredientsList() {
        try {
            const response = await fetch(this.container.dataset.listUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const html = await response.text();
            this.container.innerHTML = html;
        } catch (error) {
            console.error('Error loading ingredients:', error);
        }
    }

    closeModal() {
        const modalInstance = bootstrap.Modal.getInstance(this.modal);
        modalInstance?.hide();
    }

    resetForm() {
        this.form.reset();
        this.previewDiv.style.display = 'none';
    }

    showNotification(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert ${alertClass} alert-dismissible fade show position-fixed`;
        alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(alertDiv);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.parentNode.removeChild(alertDiv);
            }
        }, 3000);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('ingredients-container')) {
        new MealIngredientsManager('ingredients-container');
    }
});
