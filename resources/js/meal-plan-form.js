/**
 * Meal Plan Form JavaScript
 * Handles dynamic grid generation and meal assignment functionality
 */

class MealPlanForm {
    constructor() {
        this.totalDaysInput = document.getElementById('total_days');
        this.generateGridBtn = document.getElementById('generate-grid-btn');
        this.mealAssignmentGrid = document.getElementById('meal-assignment-grid');
        this.mealSearchInput = document.getElementById('meal-search');
        this.mealsGrid = document.getElementById('meals-grid');
        
        // Get data from HTML data attributes
        this.mealsSection = document.querySelector('.meals-selection-section');
        this.availableMeals = this.parseDataAttribute('data-meals') || [];
        this.mealTimes = this.parseDataAttribute('data-meal-times') || ['breakfast', 'snack', 'lunch', 'dinner'];
        this.mealTimeLabels = this.parseDataAttribute('data-meal-time-labels') || ['Breakfast', 'Snack', 'Lunch', 'Dinner'];
        this.assignments = this.parseDataAttribute('data-assignments') || {};
        
        this.selectedCell = null; // Track selected cell for assignment
        this.assignmentIndex = 0; // Track assignment index for form fields
        
        this.init();
    }

    parseDataAttribute(attributeName) {
        try {
            const data = this.mealsSection?.getAttribute(attributeName);
            return data ? JSON.parse(data) : null;
        } catch (error) {
            console.error(`Error parsing ${attributeName}:`, error);
            return null;
        }
    }

    init() {
        this.bindEvents();
        this.autoGenerateGrid();
    }

    bindEvents() {
        // Generate grid button
        if (this.generateGridBtn) {
            this.generateGridBtn.addEventListener('click', () => this.generateGrid());
        }

        // Auto-generate grid when total days changes
        if (this.totalDaysInput) {
            this.totalDaysInput.addEventListener('change', () => this.autoGenerateGrid());
        }

        // Meal search functionality
        if (this.mealSearchInput) {
            this.mealSearchInput.addEventListener('input', (e) => this.filterMeals(e.target.value));
        }

        // Handle meal selection and grid interactions
        document.addEventListener('click', (e) => {
            // Remove meal from cell
            if (e.target.closest('.btn-remove-meal')) {
                e.stopPropagation();
                const cell = e.target.closest('.meal-cell');
                this.removeMealFromCell(cell);
                return;
            }
            
            // Click on grid cell to select it for assignment
            if (e.target.closest('.meal-cell')) {
                const cell = e.target.closest('.meal-cell');
                this.selectCell(cell);
                return;
            }
            
            // Click on meal card to assign it to selected cell
            if (e.target.closest('.btn-add-meal') || e.target.closest('.meal-card')) {
                const mealCard = e.target.closest('.meal-card');
                if (mealCard) {
                    this.assignMealToSelectedCell(mealCard);
                }
                return;
            }
        });
    }

    autoGenerateGrid() {
        const totalDays = parseInt(this.totalDaysInput?.value);
        if (totalDays && totalDays >= 1 && totalDays <= 365) {
            this.generateGrid();
        }
    }

    generateGrid() {
        const totalDays = parseInt(this.totalDaysInput?.value);
        if (!totalDays || totalDays < 1) {
            this.showNotification('Please enter a valid number of days (1-365)', 'error');
            return;
        }
        
        this.renderGrid(totalDays);
        this.updateGridSummary();
    }

    renderGrid(totalDays) {
        let gridHTML = this.buildGridSummary(totalDays);
        gridHTML += this.buildGridTable(totalDays, this.mealTimes, this.mealTimeLabels);
        
        this.mealAssignmentGrid.innerHTML = gridHTML;
        this.mealAssignmentGrid.style.display = 'block';
        
        this.bindGridEvents();
    }

    buildGridSummary(totalDays) {
        return `
            <div class="grid-summary">
                <div class="summary-item">
                    <div class="summary-value" id="total-assignments">0</div>
                    <div class="summary-label">Assignments</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value" id="total-days-display">${totalDays}</div>
                    <div class="summary-label">Days</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value" id="total-slots">${totalDays * 4}</div>
                    <div class="summary-label">Total Slots</div>
                </div>
            </div>
        `;
    }

    buildGridTable(totalDays, mealTimes, mealTimeLabels) {
        // Reset assignment index for form field naming
        this.assignmentIndex = 0;
        
        let tableHTML = `
            <div class="table-responsive">
                <table class="grid-table">
                    <thead>
                        <tr>
                            <th class="day-header">Day</th>
        `;
        
        mealTimeLabels.forEach(label => {
            tableHTML += `<th class="meal-time-header">${label}</th>`;
        });
        
        tableHTML += '</tr></thead><tbody>';
        
        for (let day = 1; day <= totalDays; day++) {
            tableHTML += `<tr><td class="day-header">Day ${day}</td>`;
            
            mealTimes.forEach(mealTime => {
                tableHTML += this.buildGridCell(day, mealTime);
            });
            
            tableHTML += '</tr>';
        }
        
        tableHTML += '</tbody></table></div>';
        
        return tableHTML;
    }

    buildGridCell(day, mealTime) {
        const cellKey = `${day}_${mealTime}`;
        const assignment = this.assignments[cellKey];
        const hasAssignment = assignment && assignment.meal_id;
        const cellClass = hasAssignment ? 'has-assignment' : 'empty-cell';
        
        // Use a sequential index for proper form field naming
        const currentIndex = this.assignmentIndex++;
        
        let cellHTML = `<td class="meal-cell ${cellClass}" data-cell-key="${cellKey}" data-day="${day}" data-meal-time="${mealTime}" data-index="${currentIndex}">`;
        
        // Hidden inputs for day_number and meal_time (always present)
        cellHTML += `<input type="hidden" name="assignments[${currentIndex}][day_number]" value="${day}">`;
        cellHTML += `<input type="hidden" name="assignments[${currentIndex}][meal_time]" value="${mealTime}">`;
        
        // Hidden input for meal_id (will be updated when meal is assigned)
        const mealIdValue = hasAssignment ? assignment.meal_id : '';
        cellHTML += `<input type="hidden" class="meal-id-input" name="assignments[${currentIndex}][meal_id]" value="${mealIdValue}">`;
        
        // Display area
        cellHTML += '<div class="cell-content">';
        
        if (hasAssignment) {
            cellHTML += `
                <div class="assigned-meal-info">
                    <span class="meal-name-display">${assignment.meal_name}</span>
                    <button type="button" class="btn-remove-meal" title="Remove meal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        } else {
            cellHTML += '<div class="empty-slot">Click to select</div>';
        }
        
        cellHTML += '</div>';
        cellHTML += '</td>';
        
        return cellHTML;
    }


    selectCell(cell) {
        // Don't select if it has an assignment (user should remove first)
        if (cell.classList.contains('has-assignment')) {
            return;
        }
        
        // Clear previous cell selection
        document.querySelectorAll('.meal-cell').forEach(c => {
            c.classList.remove('selected-cell');
        });
        
        // Mark this cell as selected
        cell.classList.add('selected-cell');
        this.selectedCell = cell;
        
        const day = cell.dataset.day;
        const mealTime = cell.dataset.mealTime;
        this.showNotification(`Cell selected: Day ${day} - ${mealTime.charAt(0).toUpperCase() + mealTime.slice(1)}. Now click on a meal to assign.`, 'info');
    }

    assignMealToSelectedCell(mealCard) {
        if (!this.selectedCell) {
            this.showNotification('Please select a cell first by clicking on an empty cell in the grid', 'info');
            return;
        }
        
        const mealId = mealCard.dataset.mealId;
        const mealName = mealCard.querySelector('.meal-name').textContent;
        
        // Find the meal details
        const selectedMeal = this.availableMeals.find(meal => meal.id == mealId);
        if (!selectedMeal) return;
        
        const cellKey = this.selectedCell.dataset.cellKey;
        const mealIdInput = this.selectedCell.querySelector('.meal-id-input');
        const cellContent = this.selectedCell.querySelector('.cell-content');
        
        // Update hidden input
        mealIdInput.value = mealId;
        
        // Update assignments tracking
        this.assignments[cellKey] = {
            meal_id: mealId,
            meal_name: selectedMeal.name
        };
        
        // Update cell visual state
        this.selectedCell.classList.remove('empty-cell', 'selected-cell');
        this.selectedCell.classList.add('has-assignment');
        
        // Update cell content
        cellContent.innerHTML = `
            <div class="assigned-meal-info">
                <span class="meal-name-display">${selectedMeal.name}</span>
                <button type="button" class="btn-remove-meal" title="Remove meal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        // Clear selection
        this.selectedCell = null;
        
        this.updateGridSummary();
        this.showNotification(`${mealName} assigned successfully!`, 'success');
    }
    
    removeMealFromCell(cell) {
        const cellKey = cell.dataset.cellKey;
        const mealIdInput = cell.querySelector('.meal-id-input');
        const cellContent = cell.querySelector('.cell-content');
        
        // Clear hidden input
        mealIdInput.value = '';
        
        // Remove from assignments tracking
        delete this.assignments[cellKey];
        
        // Update cell visual state
        cell.classList.remove('has-assignment');
        cell.classList.add('empty-cell');
        
        // Update cell content
        cellContent.innerHTML = '<div class="empty-slot">Click to select</div>';
        
        this.updateGridSummary();
        this.showNotification('Meal removed', 'success');
    }

    filterMeals(searchTerm) {
        const term = searchTerm.toLowerCase();
        const mealCards = document.querySelectorAll('.meal-card');

        mealCards.forEach(card => {
            const mealName = card.dataset.mealName;
            const mealDescription = card.dataset.mealDescription;

            if (mealName.includes(term) || mealDescription.includes(term)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    updateGridSummary() {
        const totalAssignments = Object.keys(this.assignments).length;
        const totalDays = parseInt(this.totalDaysInput?.value) || 0;
        const totalSlots = totalDays * 4;
        
        const totalAssignmentsEl = document.getElementById('total-assignments');
        const totalDaysDisplayEl = document.getElementById('total-days-display');
        const totalSlotsEl = document.getElementById('total-slots');
        
        if (totalAssignmentsEl) totalAssignmentsEl.textContent = totalAssignments;
        if (totalDaysDisplayEl) totalDaysDisplayEl.textContent = totalDays;
        if (totalSlotsEl) totalSlotsEl.textContent = totalSlots;
    }

    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        const alertClass = type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info';
        notification.className = `alert alert-${alertClass} alert-dismissible fade show`;
        notification.style.position = 'fixed';
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.zIndex = '9999';
        notification.style.minWidth = '300px';
        
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new MealPlanForm();
});
