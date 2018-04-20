<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		//\Illuminate\Auth\AuthenticationException::class,
		//\Illuminate\Auth\Access\AuthorizationException::class,
		\Symfony\Component\HttpKernel\Exception\HttpException::class,
		//\Illuminate\Database\Eloquent\ModelNotFoundException::class,
		//\Illuminate\Session\TokenMismatchException::class,
		//\Illuminate\Validation\ValidationException::class,
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param \Exception $exception
	 *
	 * @throws \Exception
	 */
	public function report(Exception $exception)
	{
		if (app()->bound('sentry') && $this->shouldReport($exception)) {
				app('sentry')->captureException($exception, [
					'extra' => [
						'php_version' => PHP_VERSION,
						'culprit_url' => url()->current(),
						'tags'        => ['culprit_url' => url()->current()],
					],
				]);
		}

		parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $exception) {
		return parent::render($request, $exception);
	}

	/**
	 * Convert an authentication exception into an unauthenticated response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Illuminate\Auth\AuthenticationException $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected function unauthenticated($request, AuthenticationException $exception) {
		if($request->expectsJson()) {
			return response()->json(['error' => 'Unauthenticated.'], 401);
		}

		if(collect($exception->guards())->contains('admin')) {
			return redirect()->guest('/app/admin/login');
		}

		if(collect($exception->guards())->contains('user')) {
			return redirect()->guest('/app/user/login');
		}

		if(collect($exception->guards())->contains('seo')) {
			return redirect()->guest('/app/seo/login');
		}

		if(collect($exception->guards())->contains('editor')) {
			return redirect()->guest('/app/editor/login');
		}

		if(collect($exception->guards())->contains('analyst')) {
			return redirect()->guest('/app/analyst/login');
		}

		return redirect()->guest(route('/app/user/login'));
	}
}