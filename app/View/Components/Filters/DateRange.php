<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class DateRange extends Component
{
    public $id;
    public $label;
    public $placeholder;
    public $dateFrom;
    public $dateTo;
    public $emit;
    public $timePicker;
    public $singleDatePicker;
    public $autoApply;
    public $autoUpdateInput;
    public $opens;
    public $drops;
    public $fetch;
    public $clearAllTime = false;
    public $parent;
    public $defer;
    public $withSubmit;
    public $dir;

    public function __construct(
        $id = 'daterangepicker',
        $label = '',
        $placeholder = '',
        $dateFrom = 'date_from',
        $dateTo = 'date_to',
        $emit = 'dateRangeUpdated',
        $timePicker = false,
        $singleDatePicker = false,
        $autoApply = false,
        $autoUpdateInput = true,
        $opens = 'center',
        $drops = 'auto',
        $fetch = true,
        $clearAllTime = false,
        $parent = '',
        $defer = true,
        $withSubmit = true
    )
    {
        $this->id = $id ?: 'daterangepicker';
        $this->label = $label;
        $this->placeholder = $placeholder ?: __('actions.PickDateRange');
        $this->dateFrom = $dateFrom ?: 'date_from';
        $this->dateTo = $dateTo ?: 'date_to';
        $this->emit = $emit ?: 'dateRangeUpdated';
        $this->timePicker = is_null($timePicker) ? false : $timePicker;
        $this->singleDatePicker = is_null($singleDatePicker) ? false : $singleDatePicker;
        $this->autoApply = is_null($autoApply) ? false : $autoApply;
        $this->autoUpdateInput = is_null($autoUpdateInput) ? false : $autoUpdateInput;
        $this->opens = $opens ?: 'center';
        $this->drops = $drops ?: 'auto';
        $this->fetch = is_null($fetch) ? true : $fetch;
        $this->clearAllTime = is_null($clearAllTime) ? false : $clearAllTime;
        $this->parent = $parent;
        $this->defer = $defer;
        $this->withSubmit = $withSubmit;
        $this->dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    }

    public function render()
    {
        return view('components.filters.date-range');
    }
}
