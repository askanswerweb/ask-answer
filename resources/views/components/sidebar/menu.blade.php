<x-sidebar.container>
    <x-sidebar.item :class="request()->route()->getName() == 'home' ? 'here show' : ''" href="{{ route('home') }}">
        <x-slot name="icon">
            <x-svg icon="layers" />
        </x-slot>
        <span>{{ __('titles.Dashboard') }}</span>
    </x-sidebar.item>

    @if(auth()->user()->isAdmin())
        <x-sidebar.heading>{{ __('titles.Users') }}</x-sidebar.heading>

        <x-sidebar.item
            :class="request()->route()->getName() == 'users.index' ? 'here show' : ''"
            :href="route('users.index')">
            <x-slot name="icon">
                <x-svg icon="users" />
            </x-slot>
            {{ __('titles.Users') }}
        </x-sidebar.item>
    @endif
    <!-- Start::Categories -->
{{--    @if(auth()->user()->is_admin || auth()->user()->can('categories'))--}}
{{--        <x-sidebar.heading>{{ __('titles.Categories') }}</x-sidebar.heading>--}}

{{--        <x-sidebar.item--}}
{{--            :class="request()->route()->getName() == 'categories.index' ? 'here show' : ''"--}}
{{--            :href="route('categories.index')">--}}
{{--            <x-slot name="icon">--}}
{{--                <x-svg icon="layout-4-blocks" />--}}
{{--            </x-slot>--}}
{{--            {{ __('titles.Categories') }}--}}
{{--        </x-sidebar.item>--}}

{{--        <x-sidebar.item--}}
{{--            :class="request()->route()->getName() == 'subcategories.index' ? 'here show' : ''"--}}
{{--            :href="route('subcategories.index')">--}}
{{--            <x-slot name="icon">--}}
{{--                <x-svg icon="git" :reverse="is_arabic()" />--}}
{{--            </x-slot>--}}
{{--            {{ __('titles.Subcategories') }}--}}
{{--        </x-sidebar.item>--}}
{{--    @endcan--}}
    <!-- End::Categories -->
</x-sidebar.container>
