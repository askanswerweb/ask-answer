<?php

namespace App\Business\Livewire;

use App\Business\Utilities\Pagination;
use App\Business\Utilities\Queries;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Tables extends Component
{
    use WithPagination, WithEvents;

    public $date_from;
    public $date_to;
    public $search;
    public $paginate = 10;
    public ?int $hasFilters = 0;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['dateRangeUpdated'];

    /**
     * @return Builder|QueryBuilder
     */
    abstract protected function query();

    protected function model($action = 'paginate')
    {
        $this->checkFilters();
        $model = $this->query();
        if (empty($model) || !method_exists($model, $action))
            return [];

        if ($action == 'paginate') {
            return Pagination::default($model, $this->perPage());
        }

        return $model->$action();
    }

    public function pagination(bool $simple = false)
    {
        if ($simple) {
            $this->checkFilters();
            return Pagination::default($this->query(), perPage: $this->perPage(), simple: true);
        }

        return $this->model();
    }

    public function get($cache_key = null, $cache_minutes = 60)
    {
        if (!$cache_key) {
            return $this->model('get');
        }

        return Cache::tags('tables')->remember($cache_key, now()->addMinutes($cache_minutes), function () {
            return $this->model('get');
        });
    }

    public function updated($name)
    {
        $factors = $this->allFactors();
        if (in_array($name, $factors))
            $this->resetPage();
    }

    public function dateRangeUpdated($startDate, $endDate)
    {
        $this->date_from = $startDate;
        $this->date_to = $endDate;
    }

    /**
     * This Array Contains The Properties That Might Affect On Pagination To Reset Page On Filter Data
     * @return array
     */
    protected function paginationFactors(): array
    {
        return [];
    }

    private function allFactors(): array
    {
        $factors = ['date_from', 'date_to', 'search'];
        return array_merge($this->paginationFactors(), $factors);
    }

    /**
     * @return Builder|QueryBuilder|array
     */
    protected function totals()
    {
        return [];
    }

    // Override Method To Change The Default
    protected function perPage(): int
    {
        return $this->paginate;
    }

    public function filter()
    {
        // Catch filter event
    }

    public function resetFilters()
    {
        $this->reset();
        $this->dispatchBrowserEvent('select2_clear');
        $this->dispatchBrowserEvent('clear-date-range');
    }

    public function dehydrate()
    {
        $this->dispatchBrowserEvent('close-filters');
    }

    protected function checkFilters()
    {
        $this->hasFilters = 0;
        foreach ($this->allFactors() as $filter) {
            try {
                if (!empty($this->{$filter})) {
                    $this->hasFilters++;
                }
            } catch (Exception $exception) {
                Log::error($exception->getMessage());
                Log::error($exception->getTraceAsString());
            }
        }
    }
}
