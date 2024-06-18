<x-app-layout>

    <div class="container mx-auto mt-5">
        <a href="{{ url('roles') }}" class="bg-blue-500 text-white px-4 py-2 rounded mx-1">Roles</a>
        <a href="{{ url('permissions') }}" class="bg-teal-500 text-white px-4 py-2 rounded mx-1">Permissions</a>
        <a href="{{ url('users') }}" class="bg-yellow-500 text-white px-4 py-2 rounded mx-1">Users</a>
    </div>

    <div class="container mx-auto mt-2">
        <div class="flex flex-col">
            <div class="w-full">

                @if (session('status'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('status') }}</div>
                @endif

                <div class="bg-white shadow-md rounded mt-3">
                    <div class="px-6 py-4 border-b">
                        <h4 class="text-xl font-semibold">
                            Permissions
                            @can('create permission')
                            <a href="{{ url('permissions/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded float-right">Add Permission</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="p-6">

                        <table class="min-w-full bg-white border">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border">Id</th>
                                    <th class="py-2 px-4 border">Name</th>
                                    <th class="py-2 px-4 border" style="width: 40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $permission->id }}</td>
                                    <td class="py-2 px-4">{{ $permission->name }}</td>
                                    <td class="py-2 px-4">
                                        @can('update permission')
                                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="bg-green-500 text-white px-4 py-2 rounded">Edit</a>
                                        @endcan

                                        @can('delete permission')
                                        <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
