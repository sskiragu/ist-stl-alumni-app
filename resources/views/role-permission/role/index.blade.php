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
                    <div class="bg-green-500 text-white p-3 rounded">{{ session('status') }}</div>
                @endif

                <div class="card mt-3 bg-white shadow-md rounded">
                    <div class="card-header p-4 border-b">
                        <h4 class="text-xl font-semibold">
                            Roles
                            @can('create role')
                            <a href="{{ url('roles/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded float-right">Add Role</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body p-4">

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">Id</th>
                                    <th class="py-2">Name</th>
                                    <th class="py-2" style="width: 40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr class="border-b">
                                    <td class="py-2">{{ $role->id }}</td>
                                    <td class="py-2">{{ $role->name }}</td>
                                    <td class="py-2">
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">
                                            Add / Edit Role Permission
                                        </a>

                                        @can('update role')
                                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="bg-green-500 text-white px-4 py-2 rounded">
                                            Edit
                                        </a>
                                        @endcan

                                        @can('delete role')
                                        <a href="{{ url('roles/'.$role->id.'/delete') }}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">
                                            Delete
                                        </a>
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
