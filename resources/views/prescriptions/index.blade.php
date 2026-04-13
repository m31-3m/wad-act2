<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-800">Prescription Orders</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <div class="flex justify-between items-center mb-8">
                    <p class="text-gray-500">History of all drug prescriptions and orders.</p>
                    
                    <!-- Task 3: Only Admin can create new prescriptions -->
                    @if(trim(strtolower(auth()->user()->role)) == 'admin')
                        <a href="{{ route('prescriptions.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-xl transition shadow-lg">
                            + Create New Prescription
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($prescriptions as $p)
                    <div class="border border-gray-100 rounded-2xl p-6 bg-white shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">{{ $p->patient_name }}</h3>
                                <p class="text-xs text-indigo-600 font-bold uppercase tracking-tighter">Customer: {{ $p->customer->name }}</p>
                            </div>
                            <span class="text-[10px] text-gray-400">{{ $p->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        <div class="space-y-2 mb-6">
                            <p class="text-xs font-bold text-gray-400 uppercase">Medicines:</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($p->medicines as $med)
                                    <span class="bg-indigo-50 text-indigo-700 text-[10px] px-2 py-1 rounded-md border border-indigo-100">
                                        {{ $med->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Task 3: Only Admin can cancel/delete orders -->
                        @if(trim(strtolower(auth()->user()->role)) == 'admin')
                            <form action="{{ route('prescriptions.destroy', $p->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="w-full py-2 text-xs font-bold text-red-500 border border-red-100 rounded-lg hover:bg-red-50 transition" onclick="return confirm('Cancel this order?')">
                                    Cancel Order
                                </button>
                            </form>
                        @else
                            <div class="w-full py-2 text-center text-xs font-bold text-gray-400 border border-gray-100 rounded-lg bg-gray-50">
                                Order Active (Read-Only)
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>