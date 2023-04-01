<div wire:ignore>
    @if($withAll && $multiple)
        <div class="input-group flex-nowrap">
            <span class="input-group-text py-2">
                <span id="check_all_{{ $id }}" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark"
                      title="{{ __('actions.SelectAll') }}">
                    <x-svg icon="select-all" class="border-hover-primary" />
                </span>
                <span style="display: none;" id="spinner_{{ $id }}"
                      class="spinner-border spinner-border-sm text-primary ms-2"></span>
            </span>
            <div class="overflow-hidden flex-grow-1 position-relative">
                @if($clear)
                    <x-svg icon="close" class="absolute-end-top z-index-3 bg-body border rounded-3 shadow-sm"
                           id="clear_{{ $id }}" />
                @endif

                <select
                    class="form-select form-select-lg form-select-solid border-start-0 rounded-start-0"
                    data-control="select2"
                    id="{{ $id }}" multiple
                >
                    <option hidden value="">{{ $title }}</option>
                </select>
            </div>
        </div>
    @else
        <div class="overflow-hidden flex-grow-1 position-relative">
            @if($clear)
                <x-svg icon="close" class="absolute-end-top z-index-3 bg-body border rounded-3 shadow-sm"
                       id="clear_{{ $id }}" />
            @endif

            <select
                class="form-select form-select-solid form-select-lg"
                data-control="select2"
                id="{{ $id }}"
                {{ $multiple ? 'multiple' : '' }}
            >
                <option hidden value="">{{ $title }}</option>
            </select>
        </div>
    @endif

    @push('scripts')
        <script>
            $(document).ready(function () {
                // Variables
                const multiSelected = '{{ $multiSelected }}';
                const selectedId = '{{ $selectedId }}'
                const selectedText = '{{ $selectedText }}'
                let url = '{{ $url }}'
                let customParams = @json($queryStrings);
                if(!customParams) {
                    customParams = {}
                }

                // Elements
                const spinner = $('#spinner_{{ $id }}');
                const checkAll = $('#check_all_{{ $id }}');
                const menu = $("#{{ $id }}")
                const isMulti = Boolean("{{ $multiple }}")
                const clear = $('#clear_{{ $id }}')

                // Config
                const config = {
                    placeholder: '{{ $title }}',
                    allowClear: true,
                    ajax: {
                        url,
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                ...customParams,
                                term: params.term || '',
                                page: params.page || 1
                            }
                        },
                        processResults: function (data) {
                            return data
                        },
                        cache: true
                    },
                    templateResult,
                    templateSelection
                };

                function templateResult(repo) {
                    if (repo.loading) {
                        return repo.text;
                    }

                    return $(`
                        <div class='select2-result-repository clearfix'>
                            <div class='select2-result-repository__title'></div>
                        </div>`)
                        .find(".select2-result-repository__title")
                        .text(templateSelection(repo))
                }

                function templateSelection(repo) {
                    return repo ? (repo.full_text || repo.text) : ''
                }

                if ('{{$parent}}') {
                    config.dropdownParent = $('{{$parent}}')
                }

                menu.select2(config);

                // ====== Start::Selected ======
                if (isMulti) {
                    let selected = @this.get(multiSelected);
                    if (!!selected) {
                        setValue(selected, arrayColumn(selected, 'id'))
                    }
                } else if (selectedId && selectedText) {
                    const full_text = selectedId + ' - ' + selectedText
                    const selected = [{id: selectedId, text: selectedText, full_text}]
                    setValue(selected, selectedId)
                }

                function setValue(data, value) {
                    if (!data || !value) {
                        return
                    }

                    config.data = data
                    menu.select2(config)
                    menu.val(value).trigger('change')
                }

                {{--// ====== End::Selected ======--}}

                menu.on('change', function () {
                    @this.set('{{ $model }}', menu.select2('val'), Boolean('{{ $defer }}'));
                });

                checkAll.click(async function () {
                    block(true)

                    try {
                        const options = {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        }
                        const data = {
                            _method: 'GET',
                            all: true
                        }

                        const response = await window.axios.post(url, data, options)
                        setValue(response.data, arrayColumn(response.data, 'id'))
                    } catch (e) {
                        block(false)
                    }
                    block(false)
                })

                const block = (on) => {
                    if (on) {
                        checkAll.hide()
                        spinner.show()
                    } else {
                        checkAll.show()
                        spinner.hide()
                    }
                }

                if (Boolean('{{ $clearEvent }}')) {
                    document.addEventListener('clear-select2', function () {
                        menu.val(null).trigger('change');
                    })
                }

                document.addEventListener('refresh_select2_{{ $id }}', function (data) {
                    setValue(data.detail, arrayColumn(data.detail, 'id'))
                })

                if (clear && clear.length) {
                    clear.click(() => {
                        menu.val(null).trigger('change');
                    })
                }
            });
        </script>
    @endpush
</div>
