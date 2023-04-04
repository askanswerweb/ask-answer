<x-widgets.symbol color="info" {{ $attributes->merge(['class' => 'symbol-35px  user-select-none']) }} title="{{ $user->firstName() }}">
    {{ strtoupper($user->firstLetter()) }}
</x-widgets.symbol>
