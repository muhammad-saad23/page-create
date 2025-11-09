<!-- Tailwind via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">All Pages</h1>

    <!-- Filter Section -->
    <div class="mb-4 flex items-center gap-3">
        <label for="category" class="font-medium">Section Type:</label>
        <select id="category" class="border rounded px-3 py-2">
            <option value="">-- Select Section Type --</option>
            @foreach($pages as $page)
                <option value="{{ $page->section_type }}">{{ $page->section_type }}</option>
            @endforeach
        </select>

    </div>

    <!-- Pages Table -->
    <table class="w-full border-collapse border border-gray-300" id="list">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Link</th>
                <th class="border p-2">Active</th>
                <th class="border p-2">Order</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pages as $page)
                <tr>
                    <td class="border p-2">{{ $page->id }}</td>
                    <td class="border p-2">{{ $page->name }}</td>
                    <td class="border p-2">{{ $page->link }}</td>
                    <td class="border p-2">
                        @if($page->active)
                            <span class="text-green-600 font-semibold">Active</span>
                        @else
                            <span class="text-red-600 font-semibold">Inactive</span>
                        @endif
                    </td>
                    <td class="border p-2">{{ $page->order }}</td>
                    <td class="border p-2 space-x-2">
                        <a href="{{ route('page.show', $page->link) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('page.edit', $page->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('page.destroy', $page->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 p-4">No Pages Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Filter Script -->
<script>
document.getElementById('category').addEventListener('change', function() {
    const sectionType = this.value;

    fetch(`{{ route('page.filter') }}?section_type=${sectionType    }`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
                console.log('Fetched data:', data); // ✅ Debug line

        const tbody = document.querySelector('#list tbody');
        tbody.innerHTML = ''; // clear previous rows

        const pages=data.pages ?? data


        if (!Array.isArray(pages) || pages.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-gray-500 p-4">No pages found</td>
            </tr>`;
        return;
    }

        pages.forEach(page => {
            const activeBadge = page.active
                ? '<span class="text-green-600 font-semibold">Active</span>'
                : '<span class="text-red-600 font-semibold">Inactive</span>';

            const row = `
                <tr>
                    <td class="border p-2">${page.id}</td>
                    <td class="border p-2">${page.name}</td>
                    <td class="border p-2">${page.link}</td>
                    <td class="border p-2">${activeBadge}</td>
                    <td class="border p-2">${page.order}</td>
                    <td class="border p-2 space-x-2">
                        <a href="/page/${page.link}" class="text-blue-600 hover:underline">View</a>
                        <a href="/page/${page.id}/edit" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="/page/${page.id}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    })
    .catch(error => {
        console.error('Error fetching pages:', error);
    });
});
</script>
