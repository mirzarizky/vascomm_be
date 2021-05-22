<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            List User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Role
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">

                                                    <a href="{{ route('user.show', $user) }}">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 w-10 h-10">
                                                                <img class="w-10 h-10 rounded-full" loading="lazy"
                                                                    src="{{ $user->getFirstMediaUrl('profile_photo') ?: asset('img/avatar.jpg') }}"
                                                                    alt="{{ $user->name }}">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->name }}
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    {{ $user->email }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if ($user->isApproved())
                                                        <span
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                            Approved
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                            Unapproved Yet
                                                        </span>

                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    @forelse ($user->roles as $role)
                                                        <div class="capitalize">{{ $role->name }}</div>
                                                    @empty
                                                        <div class="capitalize">User</div>
                                                    @endforelse
                                                </td>
                                            </tr>
                                        @endforeach

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                                <div class="px-4 py-6">{{ $users->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
