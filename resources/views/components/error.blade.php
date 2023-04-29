@props(['error'])

@error($error)
<div {{ $attributes->merge(['class' => 'fv-plugins-message-container invalid-feedback']) }}>
    {{ $message }}
</div>
@enderror
