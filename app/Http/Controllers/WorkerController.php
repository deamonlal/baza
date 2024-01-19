<?php

namespace App\Http\Controllers;

use App\Http\Filters\WorkerFilter;
use App\Http\Requests\Worker\IndexFilterRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Models\Worker;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function index(IndexFilterRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        $filter = app()->make(WorkerFilter::class, ['queryParams' => array_filter($data)]);
        $workers =  Worker::filter($filter)->paginate(3);
//        dd($workers);
        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //$worker = Worker::find($id);
        return view('worker.show', compact('worker'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('worker.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(StoreRequest $request, Worker $worker): RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);

        return redirect()->route('workers.index');
    }

    public function destroy(Worker $worker): string
    {
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
