<?php

namespace App\Traits;

use App\Helpers\DatatablesHelper;
use App\Helpers\QueryParamsHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

trait TransformResourceResponse
{
    /**
     * @param Collection $data
     * @return array
     * @throws Exception
     */
    protected function transformCollection(Collection $data): array
    {
        $instance = $data->first();

        $transformer = $instance->transformer;
        $result = $this->getTransformDataFromResource($data, $transformer);

//        if (!QueryParamsHelper::includeParamDatatables()) {
//            return $result;
//        }

        return $result;

        // return DatatablesHelper::response($result);
    }


    /**
     * @param Model|null $instance
     * @return array
     */
    protected function transformInstance(?Model $instance): array
    {
        if (!$instance) {
            return [];
        }

        $transformer = $instance->transformer;

        return $this->getTransformDataFromResource($instance, $transformer);
    }

    /**
     * @param Collection|Model $data
     * @param string|null $transformer
     * @return array
     */
    private function getTransformDataFromResource($data, ?string $transformer): array
    {
        if(!class_exists($transformer)){
            return $data->toArray();
        }

        $resource = $this->getResourceInstance($data, $transformer);

        if(!$resource instanceof JsonResource){
            return $data->toArray();
        }

        return $resource->toArray(request());
    }

    /**
     * @param Collection|Model $data
     * @param string $transformer
     * @return JsonResource|null
     */
    private function getResourceInstance($data, string $transformer): ?JsonResource
    {
        $resource = null;

        if ($data instanceof Model) {
            $resource = new $transformer($data);
        } else if ($data instanceof Collection) {
            $resource = $transformer::collection($data);
        }

        return $resource;
    }

}
