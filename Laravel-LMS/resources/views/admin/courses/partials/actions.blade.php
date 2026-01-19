<!-- DESKTOP ACTION MENU -->
<div class="action-wrapper">
    <button class="action-btn">⋮</button>

    <div class="action-menu">
        <a href="{{ route('admin.courses.edit', $course) }}">
            ✏ Edit
        </a>

        <form method="POST" action="{{ route('admin.courses.destroy', $course) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Delete this course?')">
                🗑 Delete
            </button>
        </form>
    </div>
</div>

<!-- MOBILE INLINE ACTIONS -->
<div class="action-inline">
    <a href="{{ route('admin.courses.edit', $course) }}" class="edit">
        ✏ Edit
    </a>

    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete"
            onclick="return confirm('Delete this course?')">
            🗑 Delete
        </button>
    </form>
</div>
