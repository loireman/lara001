<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                @can('post-list')
                    <div class="hidden space-x-3 sm:-my-px sm:ml-2 sm:flex">
                        <a class="nav-link" href="{{ route('timetables.index') }}">
                            <x-nav-link :href="route('timetables.index')">
                                {{ __('Timetables') }}
                            </x-nav-link></a>
                    </div>
                @endcan
                @can('post-list')
                    <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            <x-nav-link :href="route('posts.index')">
                                {{ __('Posts') }}
                            </x-nav-link></a>
                    </div>
                @endcan
                @can('user-list')
                    <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <x-nav-link :href="route('users.index')">
                                {{ __('Users') }}
                            </x-nav-link></a>
                    </div>
                @endcan
                @can('role-list')
                    <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <x-nav-link :href="route('roles.index')">
                                {{ __('Roles') }}
                            </x-nav-link></a>
                    </div>
                @endcan
                @can('permission-list')
                    <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                        <a class="nav-link" href="{{ route('permissions.index') }}">
                            <x-nav-link :href="route('permissions.index')">
                                {{ __('Permission') }}
                            </x-nav-link></a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</nav>
