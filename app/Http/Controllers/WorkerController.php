<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\StoreRequest;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $workers =  Worker::all();
        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        //$worker = Worker::find($id);
        return view('worker.show', compact('worker'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('worker.create');
    }

    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(StoreRequest $request, Worker $worker): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);

        return redirect()->route('workers.index');
    }

    public function destroy(int $id): string
    {
        $worker = Worker::find($id);
        if(!is_null($worker)) {
            $workerName = $worker->name;
            $worker->delete();
            return "Worker $workerName was deleted successfully";
        }
        return "Worker with id = $id was not found";
    }
}
