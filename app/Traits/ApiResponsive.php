<?php


namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponsive
{
    public function responseSuccess(string $message = "",
                                    array $data = [],
                                    array $meta = [],
                                    array $headers = [],
                                    int $status = Response::HTTP_OK)
    {
        return $this->response('Success', $message, $data, $meta, $headers, $status);
    }

    public function responseError(string $message,
                                  array $meta = [],
                                  array $headers = [],
                                  int $status = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return $this->response('Error', $message, [], $meta, $headers, $status);
    }

    private function response(string $type = "",
                             string $message = "",
                             array $data = [],
                             array $meta = [],
                             array $headers = [],
                             int $status = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'type' => $type,
            'message' => $message,
            'data' => $data,
            'meta' => $meta,
        ],  $status, $headers);
    }
}
