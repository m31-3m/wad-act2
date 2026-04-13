<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-800">
            {{ isset($medicine) ? 'Edit Medicine' : 'Add New Medicine' }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <form action="{{ isset($medicine) ? route('medicines.update', $medicine->id) : route('medicines.store') }}" method="POST">
                    @csrf
                    @if(isset($medicine))
                        @method('PATCH')
                    @endif

                    <div class="mb-6">
                        <label for="name" class="block text-lg font-bold text-gray-700 mb-2">Medicine Name</label>
                        <input type="text" id="name" name="name" value="{{ $medicine->name ?? old('name') }}" 
                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="block text-lg font-bold text-gray-700 mb-2">Category</label>
                        <select id="category_id" name="category_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (isset($medicine) && $medicine->category_id == $category->id) || old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-lg">
                            {{ isset($medicine) ? 'Update Medicine' : 'Save Medicine' }}
                        </button>
                        @if(isset($medicine))
                            <a href="{{ route('medicines.index') }}" class="ml-4 text-gray-500 hover:text-gray-700 font-bold py-2.5 px-4 rounded-lg transition">Cancel</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>