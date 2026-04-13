<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight">
            {{ __('Pharmacy Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                
                <div class="flex justify-between items-center mb-8">
                    <p class="text-gray-600">Logged in as: <span class="font-bold text-blue-600">{{ ucfirst(auth()->user()->role) }}</span></p>
                    
                    @if(auth()->user()->role == 'admin')                    
                        <a href="{{ route('medicines.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out shadow-md">
                            + Add New Medicine
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-2">
                        <thead>
                            <tr class="text-gray-500 uppercase text-xs tracking-wider">
                                <th class="px-6 py-3">Medicine Name</th>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicines as $medicine)
                            <tr class="bg-gray-50 hover:bg-blue-50 transition duration-200">
                                <td class="px-6 py-4 font-medium text-gray-900 border-l-4 border-blue-500 rounded-l-lg">{{ $medicine->name }}</td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded uppercase">
                                        {{ $medicine->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right rounded-r-lg">
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold mr-4">Edit</a>
                                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700 font-bold" onclick="return confirm('Delete this medicine?')">Delete</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 italic text-sm">Read Only</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>