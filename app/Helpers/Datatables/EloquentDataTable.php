<?php

namespace App\Helpers\Datatables;

use Yajra\DataTables\EloquentDataTable as YajraEloquentDataTable;

class EloquentDataTable extends YajraEloquentDataTable
{
    /**
     * @param $mDataSupport
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    public function response($transform = false)
    {
        try {
            $this->prepareQuery();

            $results = $this->results();

            $processed = $this->processingResults($results, $transform);

            return $this->render($processed);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception);
        }
    }

    /**
     * @param $results
     * @param boolean $transform
     * @return array
     */
    protected function processingResults($results, $transform = false)
    {
        $processor = new DataProcessor(
            $results,
            $this->getColumnsDefinition(),
            $this->templates,
            $this->request->input('start')
        );

        return $processor->processing($transform);
    }

    /**
     * Render json response.
     *
     * @param  array  $data
     * @return array
     */
    protected function render(array $data)
    {
        $output = $this->attachAppends([
            'draw'            => (int) $this->request->input('draw'),
            'recordsTotal'    => $this->totalRecords,
            'recordsFiltered' => $this->filteredRecords,
            'data'            => $data,
        ]);

        if ($this->config->isDebugging()) {
            $output = $this->showDebugger($output);
        }

        foreach ($this->searchPanes as $column => $searchPane) {
            $output['searchPanes']['options'][$column] = $searchPane['options'];
        }

        return $output;
    }
}