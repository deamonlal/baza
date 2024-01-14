<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        return Worker::all();
    }

    public function show(int $id): Worker
    {
        return Worker::find($id);
    }

    public function create(): string
    {
        $workers = [
            'name' => 'Dima',
            'surname' => 'Barabanov',
            'email' => 'dima@mail.ru',
            'age' => '23',
            'description' => 'No description',
            'is_married' => 'false',
        ];
        Worker::create($workers);

        return 'Worker was created';
    }

    public function update(int $id): string
    {
        $worker = Worker::first();

        $worker->update([
            'name' => 'Deamon',
            'surname' => 'Barbarian'
        ]);

        return "Worker $worker->name updated successfully";
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
