<div class="position-relative">
    @if(!empty($label))
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    @endif

    <div class="input-group mb-5">
        <input {{ $attributes(['class' => 'form-control border']) }} placeholder="{{ $placeholder }}" id="{{ $id }}"
               autocomplete="off" />
        <span class="input-group-text border">
            <x-tooltip text="{{ __('actions.Clear') }}" id="clear_{{ $id }}">
                <i class="far fa-times-circle cursor-pointer fs-4"></i>
            </x-tooltip>
        </span>
    </div>
    <!--end::Input group-->

    @push('scripts')
        <script>
            $(document).ready(function () {
                const element = $("#{{ $id }}")
                const clear = $("#clear_{{ $id }}")

                if (!!element) {
                    // Initialize StartDate, EndDate
                    let start = @this.get('{{ $dateFrom }}');
                    let end = @this.get('{{ $dateTo }}');

                    if (start) {
                        start = moment(start, 'YYYY-MM-DD')
                    }

                    if (start) {
                        end = moment(end, 'YYYY-MM-DD')
                    }

                    // handle applying values
                    function handle_date_range(start, end) {
                        if (!start || !end || !start.isValid() || !end.isValid()) {
                            start = end = ''
                            element.val('')
                        } else {
                            start = start.format("YYYY-MM-DD")
                            end = end.format("YYYY-MM-DD")
                            element.val(start + ' - ' + end)
                        }

                        if (Boolean('{{ $withSubmit }}')) {
                            @this.set('{{ $dateFrom }}', start, true);
                            @this.set('{{ $dateTo }}', end, true);
                        } else if (Boolean('{{ $fetch }}')) {
                            @this.emit('{{ $emit }}', start, end);
                        }
                    }

                    const config = {
                        ranges: {
                            "Today": [moment(), moment()],
                            "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                            "Last 7 Days": [moment().subtract(6, "days"), moment()],
                            "Last 30 Days": [moment().subtract(29, "days"), moment()],
                            "This Month": [moment().startOf("month"), moment().endOf("month")],
                            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                        },
                        opens: '{{ $opens }}',
                        drops: '{{ $drops }}',
                        timePicker: Boolean('{{ $timePicker }}'),
                        singleDatePicker: Boolean('{{ $singleDatePicker }}'),
                        autoApply: Boolean('{{ $autoApply }}'),
                        autoUpdateInput: Boolean('{{ $autoUpdateInput }}'),
                        dir: String('{{ $dir }}')
                    }

                    const parent = "{{ $parent }}";
                    if (!!parent) {
                        config.parentEl = $(parent)
                    }

                    // avoid invalid date value by check if two values are set
                    if (!!start && !!end) {
                        config.startDate = start
                        config.endDate = end
                    }

                    // add configurations
                    element.daterangepicker(config, handle_date_range)

                    if (!start || !end) {
                        // empty input for initial value if no value specified
                        element.val('')
                    } else {
                        element.val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
                    }

                    // Events
                    element.on('apply.daterangepicker hide.daterangepicker show.daterangepicker', function (ev, picker) {
                        if (!picker.endDate.isValid() || !picker.startDate.isValid())
                            element.val('')
                    })

                    element.on('hide.daterangepicker', function (ev, picker) {
                        handle_date_range(picker.startDate, picker.endDate)
                    })

                    clear.click(() => {
                        if (element.val()) {
                            handle_date_range('', '')
                        } else {
                            try {
                                toastr.info('{{ __('validation.InputEmptyAlready') }}')
                            } catch {
                            }
                        }
                    })
                }
            })
        </script>
    @endpush
</div>
