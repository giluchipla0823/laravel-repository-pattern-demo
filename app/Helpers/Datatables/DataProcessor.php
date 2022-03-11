<?php

namespace App\Helpers\Datatables;

use App\Traits\TransformResourceResponse;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Processors\DataProcessor as YajraDataProcessor;

class DataProcessor extends YajraDataProcessor
{

    use TransformResourceResponse;

    public function processing($transform = false)
    {
        $this->output = [];

        foreach ($this->results as $row) {
            /* @var Model $row */
            $this->output[] = $transform ? $this->transformInstance($row) : $row;
        }

        return $this->output;
    }
}
