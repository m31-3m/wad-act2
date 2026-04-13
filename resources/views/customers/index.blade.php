<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-teal-800">Customer Management</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <div class="flex justify-between items-center mb-8">
                    <p class="text-gray-500 text-sm">Review and manage your pharmacy clients.</p>
                    @if(auth()->user()->role == 'admin')                    
                        <a href="{{ route('customers.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-lg">
                            + Register Customer
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-teal-600 uppercase text-xs font-bold tracking-widest border-b">
                                <th class="px-6 py-4">Full Name</th>
                                <th class="px-6 py-4">Contact Info</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($customers as $customer)
                            <tr class="hover:bg-teal-50/50 transition duration-150">
                                <td class="px-6 py-5 font-semibold text-gray-800">{{ $customer->name }}</td>
                                <td class="px-6 py-5">
                                    <div class="text-sm text-gray-600">{{ $customer->email }}</div>
                                    <div class="text-xs text-gray-400">{{ $customer->phone }}</div>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="text-teal-600 hover:text-teal-900 font-bold mr-4">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="text-red-400 hover:text-red-600 font-bold">Remove</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Read Only</span>
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