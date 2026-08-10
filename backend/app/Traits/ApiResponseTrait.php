<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponseTrait
{
    public function success($data = [], string $message = "Success", int $code = 200)
    {
        return response()->json(['status' => true, 'message' => $message, 'data' => $data], $code);
    }
    public function error(string $message = 'Error', int $code = 400, $errors = null)
    {
        return response()->json(['status' => false, 'message' => $message, 'errors' => $errors], $code);
    }
    public function paginateResponse(LengthAwarePaginator $paginator, string|callable|null $resource = null): array
    {

        if (is_callable($resource)) {
            // If it's a callback function, use it to map the items
            $items = $paginator->getCollection()->map($resource);
        } else {
            $items = $resource ? $resource::collection($paginator) : $paginator->items();
        }
        return [
            'items' => $items,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ]
        ];
    }
}
