<div wire:ignore>
    @if(!empty($label))
        <label class="form-label text-start d-block" for="{{ $id }}">
            {{ $label }}
        </label>
    @endif

    <div class="overflow-hidden flex-grow-1 position-relative">
        @if($clear)
            <x-svg icon="close" class="absolute-end-top z-index-3 bg-body border rounded-3 shadow-sm"
                   id="clear_{{ $id }}" />
        @endif

        <select
            {{ $attributes(['class' => 'form-select form-select-solid border' . ($withIcon ? ' ps-10 ' : '')]) }}
            id="{{ $id }}"
        >
            @foreach($zones as $key => $zone)
                <option value="{{ $key }}">{{ $key }}</option>
            @endforeach

        </select>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                const menu = $('#{{ $id }}');
                const clear = $('#clear_{{ $id }}');
                const model = '{{ $model }}'

                menu.select2({
                    placeholder: '{{ $placeholder }}',
                });

                const selected = @this.get(model);
                if (!!selected) {
                    if (menu.find("option[value='" + selected + "']").length) {
                        menu.val(selected).trigger('change');
                    } else {
                        menu.val(null).trigger('change');
                    }
                } else {
                    menu.val(null).trigger('change');
                }

                if (clear && clear.length) {
                    clear.click(() => {
                        menu.val(null).trigger('change');
                    })
                }

                menu.change(() => {
                    @this.set(model, menu.val(), Boolean('{{ $defer }}'));
                })
            })
        </script>
    @endpush
</div>
