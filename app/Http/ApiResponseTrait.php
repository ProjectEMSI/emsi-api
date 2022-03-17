<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait ApiResponseTrait
{
    protected function successResponse(
        array|Collection $data = [],
        ?string $message = null,
        int $code = 200,
        ?string $status = 'Success.',
        bool $attachDataOnRoot = false
    ): JsonResponse {
        return $this->response($data, $message, $code, $status, $attachDataOnRoot);
    }

    protected function errorResponse(
        array|Collection $data = [],
        ?string $message = null,
        int $code = 400,
        ?string $status = 'Error.',
        bool $attachDataOnRoot = false
    ): JsonResponse {
        return $this->response($data, $message, $code, $status, $attachDataOnRoot);
    }

    protected function noContentResponse(
        array|Collection $data = [],
        ?string $message = null,
        int $code = 204,
        ?string $status = 'No content.',
    ): JsonResponse {
        return $this->response($data, $message, $code, $status);
    }

    private function response(
        array|Collection $data = [],
        ?string $message = null,
        int $code = 200,
        ?string $status = null,
        bool $attachDataOnRoot = false
    ): JsonResponse {
        $responseData = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        if ($attachDataOnRoot) {
            $data = $data instanceof Collection ? $data->toArray() : $data;
            $responseData = array_merge($responseData, $data);
        }

        return response()->json($responseData, $code);
    }
}
