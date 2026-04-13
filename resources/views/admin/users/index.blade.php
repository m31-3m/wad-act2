<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-purple-800">System Access Control</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl overflow-hidden border border-gray-100">
                <div class="p-6 bg-purple-50 border-b border-purple-100">
                    <h3 class="text-purple-800 font-bold">Registered Staff & Admins</h3>
                </div>
                
                <table class="w-full text-left">
                    <tbody class="divide-y divide-gray-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-6">
                                <div class="font-bold text-gray-800">{{ $user->name }}</div>
                                <div class="text-xs text-gray-400">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-6 text-right">
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" class="inline-flex items-center">
                                        @csrf @method('PATCH')
                                        <select name="role" class="bg-gray-50 border-none text-xs rounded-lg focus:ring-purple-500">
                                            <option value="pharmacist" {{ $user->role == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button class="ml-3 text-purple-600 font-bold text-xs hover:underline">Update</button>
                                    </form>
                                @else
                                    <span class="bg-purple-600 text-white text-[10px] px-2 py-1 rounded-full uppercase font-black">Active Admin</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>