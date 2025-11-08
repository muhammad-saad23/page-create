    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


<div class="p-6 bg-white rounded-lg shadow-md max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">{{ $page->name }}</h1>
    <p class="text-gray-500 mb-4">Link: {{ $page->link }}</p>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Content:</h2>
        <div class="border p-4 rounded-lg"
            style="
                background-color: {{ $page->styling['background_color'] ?? '#ffffff' }};
                color: {{ $page->styling['text_color'] ?? '#000000' }};
                font-size: {{ $page->styling['font_size'] ?? '16px' }};
                padding: {{ $page->styling['padding'] ?? '10px' }};
                margin: {{ $page->styling['margin'] ?? '0' }};
                border-radius: {{ $page->styling['border_radius'] ?? '0' }};
                font-family: {{ $page->styling['font_family'] ?? 'inherit' }};
            ">
            {!! $page->content !!}
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Settings:</h2>
        <p><strong>Meta Title:</strong> {{ $page->settings['meta_title'] ?? '-' }}</p>
        <p><strong>Meta Description:</strong> {{ $page->settings['meta_description'] ?? '-' }}</p>
    </div>

    <div class="flex space-x-4">
        <a href="{{ route('pages.edit', $page->id) }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>

        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Delete
            </button>
        </form>

        <a href="{{ route('pages.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
            Back
        </a>
    </div>
</div>