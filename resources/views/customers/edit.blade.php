<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-teal-800">
            {{ isset($customer) ? 'Edit Customer Details' : 'Register New Customer' }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                
                <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
                    @csrf
                    @if(isset($customer))
                        @method('PATCH')
                    @endif

                    <div class="mb-6">
                        <label for="name" class="block text-lg font-bold text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ $customer->name ?? old('name') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500 shadow-sm" required>
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-lg font-bold text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ $customer->email ?? old('email') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500 shadow-sm" required>
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="block text-lg font-bold text-gray-700 mb-2">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="{{ $customer->phone ?? old('phone') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500 shadow-sm" required>
                        @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-lg">
                            {{ isset($customer) ? 'Update Customer' : 'Register Customer' }}
                        </button>
                        @if(isset($customer))
                            <a href="{{ route('customers.index') }}" class="ml-4 text-gray-500 hover:text-gray-700 font-bold py-2.5 px-4 rounded-lg transition">Cancel</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>