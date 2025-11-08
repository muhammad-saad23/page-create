
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">All Pages</h1>

    <table class="w-full border-collapse border border-gray-300">
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
            @foreach ($pages as $page)
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
            @endforeach
        </tbody>
    </table>
</div>

