<x-sidebar.container>
{{--    <x-sidebar.item :class="request()->route()->getName() == 'home' ? 'here show' : ''" href="{{ route('home') }}">--}}
{{--        <x-slot name="icon">--}}
{{--            <x-svg icon="layers" />--}}
{{--        </x-slot>--}}
{{--        <span>{{ __('titles.Dashboard') }}</span>--}}
{{--    </x-sidebar.item>--}}

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

    <x-sidebar.heading>{{ __('titles.Questions') }}</x-sidebar.heading>

    <x-sidebar.item
        :class="request()->route()->getName() == 'questions.index' ? 'here show' : ''"
        :href="route('questions.index')">
        <x-slot name="icon">
            <x-svg icon="question-circle" />
        </x-slot>
        {{ __('titles.Questions') }}
    </x-sidebar.item>
</x-sidebar.container>
