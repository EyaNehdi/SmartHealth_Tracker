@forelse($meals as $meal)
<tr>
    <td>
        <a href="{{ route('admin.meals.show', $meal->id) }}" title="View {{ $meal->name }} Details">
            <div class="meal-image-wrapper">
                <img src="{{ $meal->image ? asset('storage/' . $meal->image) : asset('assets/placeholder.png') }}"
                    alt="{{ $meal->name }}"
                    loading="lazy">
            </div>
        </a>
    </td>
    <td>
        <span class="meal-name">{{ $meal->name }}</span>
    </td>
    <td>
        <span class="meal-type-badge">{{ ucfirst($meal->meal_type) }}</span>
    </td>
    <td>
        <div class="action-buttons">
            <a href="{{ route('admin.meals.show', $meal->id) }}"
                class="btn-custom btn-view"
                title="View {{ $meal->name }} Details">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.25rem;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                View
            </a>
            <a href="{{ route('admin.meals.edit', $meal->id) }}"
                class="btn-custom btn-edit"
                title="Edit {{ $meal->name }}">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.25rem;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <form action="{{ route('admin.meals.destroy', $meal->id) }}"
                method="POST"
                style="display:inline-block; margin: 0;"
                onsubmit="return confirm('Are you sure you want to delete {{ addslashes($meal->name) }}? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="btn-custom btn-delete"
                    title="Delete {{ $meal->name }}">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.25rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="4" class="empty-state">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <h4 style="margin: 0.5rem 0;">No meals found</h4>
        <p style="margin: 0;">Try adjusting your search or add a new meal to get started.</p>
    </td>
</tr>
@endforelse 
