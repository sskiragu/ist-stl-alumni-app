<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <!-- User Role Based Content -->
        @role('super-admin')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Super Admin Dashboard</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ url('roles') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Manage Roles</a>
                        <a href="{{ url('permissions') }}" class="bg-teal-500 text-white px-4 py-2 rounded">Manage Permissions</a>
                        <a href="{{ url('users') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Manage Users</a>
                    </div>
                </div>
            </div>
        </div>
        @endrole

        @role('admin')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Admin Dashboard</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ url('jobs') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Manage Jobs</a>
                    </div>
                </div>
            </div>
        </div>
        @endrole

        @role('employer')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Employer Dashboard</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ url('job-postings/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Job Posting</a>
                    </div>
                </div>
            </div>
        </div>
        @endrole

        @role('alumni')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Alumni Dashboard</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ url('portfolio') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Portfolio</a>
                        <a href="{{ url('jobs/notifications') }}" class="bg-teal-500 text-white px-4 py-2 rounded">View Job Notifications</a>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>
</x-app-layout>
