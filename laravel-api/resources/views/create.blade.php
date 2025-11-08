    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6 border border-gray-200">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Create New Page</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{route('page.store')}}"class="space-y-6">
        @csrf

        <!-- BASIC DETAILS -->
        <div>
            <label class="block font-medium text-gray-700">Page Name</label>
            <input type="text" name="name" class="w-full mt-2 border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Page Link</label>
            <input type="text" name="link" class="w-full mt-2 border-gray-300 rounded-lg" placeholder="/about-us" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Section name</label>
            <input type="text" name="section_name" class="w-full mt-2 border-gray-300 rounded-lg" placeholder="hero ,cards" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Section Type</label>
            <select name="section_type" class="w-full mt-2 border-gray-300 rounded-lg">
                <option value="header">Header</option>
                <option value="body">Body</option>
                <option value="footer">Footer</option>
            </select>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Content</label>
            <textarea name="content" rows="5" class="w-full mt-2 border-gray-300 rounded-lg" placeholder="Write your content here..."></textarea>
        </div>

        <!-- SETTINGS -->
        <div>
            <label class="block font-medium text-gray-700">Settings</label>
            <div class="grid sm:grid-cols-2 gap-4 mt-2">
                <input type="text" name="meta_title" class="border-gray-300 rounded-lg" placeholder="Meta Title">
                <input type="text" name="meta_description" class="border-gray-300 rounded-lg" placeholder="Meta Description">
            </div>
        </div>

        <div class="flex items-center justify-between gap-6">
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="active" id="active" checked class="h-4 w-4 text-blue-600">
                <label for="active" class="text-gray-700">Active</label>
            </div>
            <div class="flex-1">
                <label class="block font-medium text-gray-700">Display Order</label>
                <input type="number" name="order" min="1" class="w-full mt-2 border-gray-300 rounded-lg" placeholder="order">
            </div>
        </div>

        <!-- 🎨 PAGE STYLING -->
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Page Styling</h2>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-gray-700">Background Color</label>
                    <input type="color" name="background_color" class="w-full mt-2 h-10 rounded border-gray-300">
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Text Color</label>
                    <input type="color" name="text_color" class="w-full mt-2 h-10 rounded border-gray-300">
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Font Size</label>
                    <input type="text" name="font_size" placeholder="e.g. 16px" class="w-full mt-2 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Padding</label>
                    <input type="text" name="padding" placeholder="e.g. 20px" class="w-full mt-2 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Margin</label>
                    <input type="text" name="margin" placeholder="e.g. 10px" class="w-full mt-2 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Border Radius</label>
                    <input type="text" name="border_radius" placeholder="e.g. 8px" class="w-full mt-2 border-gray-300 rounded-lg">
                </div>

                <div class="sm:col-span-2">
                    <label class="block font-medium text-gray-700">Font Family</label>
                    <select name="font_family" class="w-full mt-2 border-gray-300 rounded-lg">
                        <option value="Poppins">Poppins</option>
                        <option value="Roboto">Roboto</option>
                        <option value="Open Sans">Open Sans</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Arial">Arial</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="flex justify-end space-x-3 mt-6">
            <a href="#" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Page</button>
        </div>
    </form>
</div>

