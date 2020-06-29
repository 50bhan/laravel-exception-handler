<?php

namespace Sharifi\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;
use Illuminate\Contracts\View\Factory;
use Whoops\Run as Whoops;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($e instanceof BaseException) {
            return $this->prepareCustomException($e, $request);
        }
    }

    private function prepareCustomException(BaseException $e, $request)
    {
        $id = '123467';
        $statusCode = $e->getStatusCode();
        $message = $e->getMessage();
        $details = $e->getDetails();

        if (config('app.debug-json')) {
            return new JsonResponse(['errors' => [$message]], $statusCode, array_merge($request->header(), ['Content-Type' => 'application/json']));
        }

        if (config('app.debug') && class_exists(Whoops::class)) {
            // 'IGNITION'
        }
        switch ($request->header('Accept')) {
            case 'application/json':
            case 'application/vnd.api+json':
                return new JsonResponse(['errors' => [$message]], $statusCode, array_merge($request->header(), ['Content-Type' => 'application/json']));
            case 'text/html':
                $factory = app()->make(Factory::class);
                if($factory->exists('errors.{statusCode}')){
                    $view = $factory->make("errors.{$statusCode}", ['message' => $message]);
                    return $view->render();
                }
            default:
                $path = __DIR__ . '/resources/error.html';
                return new Response(file_get_contents(realpath($path)));
        }
    }
}
