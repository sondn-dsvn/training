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

    public function responseWithPagination($message, $paginations)
    {
        $meta = [
            'total' => $paginations->total(),
            'lastPage' => $paginations->lastPage(),
            'currentPage' => $paginations->currentPage(),
            'path' => $paginations->path(),
            'nextPageUrl' => $paginations->nextPageUrl(),
            'prePageUrl' => $paginations->previousPageUrl(),
            'perPage' => $paginations->perPage(),
        ];
        $data = $paginations->items();
        return $this->responseSuccess($message, $data, $meta);
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
