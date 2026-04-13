<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-800">Create New Prescription Order</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <form action="{{ route('prescriptions.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="patient_name" class="block text-lg font-bold text-gray-700 mb-2">Patient Name</label>
                        <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" 
                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" placeholder="Enter patient name" required>
                        @error('patient_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="customer_id" class="block text-lg font-bold text-gray-700 mb-2">Select Customer</label>
                        <select id="customer_id" name="customer_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" required>
                            <option value="">-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="medicines" class="block text-lg font-bold text-gray-700 mb-2">Select Medicines</label>
                        <p class="text-sm text-gray-500 mb-2">Hold Ctrl (or Cmd) to select multiple.</p>
                        <select id="medicines" name="medicines[]" multiple required 
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" style="height: 200px;">
                            @foreach($medicines as $medicine)
                                <option value="{{ $medicine->id }}" {{ is_array(old('medicines')) && in_array($medicine->id, old('medicines')) ? 'selected' : '' }}>
                                    {{ $medicine->name }} ({{ $medicine->category->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('medicines') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-lg">
                            Create Order & Save Prescription
                        </button>
                        <a href="{{ route('prescriptions.index') }}" class="ml-4 text-gray-500 hover:text-gray-700 font-bold py-2.5 px-4 rounded-lg transition">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>