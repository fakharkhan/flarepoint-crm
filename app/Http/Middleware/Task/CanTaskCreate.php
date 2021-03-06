<?php

namespace App\Http\Middleware\Task;

use Closure;

class CanTaskCreate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->can('task-create')) {
            Session()->flash('flash_message_warning', 'Not allowed to create task');

            return redirect()->route('tasks.index');
        }

        return $next($request);
    }
}
