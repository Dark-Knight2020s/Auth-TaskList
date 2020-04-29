@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        New Task
                    </div>
                    <br>

                    {{-- Display status of work --}}
                    @if (session('status'))
                        <div class="alert alert-success col-md-10 offset-md-1 ">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Display erroroffset-md-1s  --}}
                    @if ($errors->any())
                        <div class="alert alert-danger col-md-10 offset-md-1 ">
                                    
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                                       
                        </div>
                    @endif

                    <div class="card-body">

                    @if (isset($task_edit))

                            <!-- Update Task Form -->
                            <form action="{{url('update/'.$task_edit->id)}}" method="POST" class="form-horizontal">        
                                @csrf
                                @method('PATCH')

                                <!-- Task Name -->
                                <div class="form-group row">
                                    <label for="task-name" class="col-md-4 col-form-label text-md-right">Task</label>
                                    <div class="col-md-6">
                                        <input id="task-name" type="text" class="form-control" name="name" value={{$task_edit->name}}>
                                    </div>
                                </div>
                                
                                <!-- Update Task Button -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-pencil fa-fw"></i> Update Task
                                        </button>
                                    </div>
                                </div>
                            </form>

                    @else
                            
                            <!-- New Task Form -->
                            <form action="{{route('store')}}" method="POST" class="form-horizontal">        
                                @csrf

                                <!-- Task Name -->
                                <div class="form-group row">
                                    <label for="task-name" class="col-md-4 col-form-label text-md-right">Task</label>
                                    <div class="col-md-6">
                                        <input id="task-name" title="Enter Task Name" type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                
                                <!-- Add Task Button -->
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-plus"></i>Add Task
                                        </button>
                                    </div>
                                </div>
                            </form>










                    @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <br>
        <!-- Current Tasks -->
        {{-- To check if database is empty using count, or use ( $com > 0 ) that we sent from index function
        sum, max, and other aggregate methods provided by the query builder. --}}
    @if (count($tasks) ?? '' > 0)
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Current Tasks
                        </div>

                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                        <tbody>

                            @foreach ($tasks as $key => $task)

                                <tr>
                                    {{-- if we want to print serial Task --}}
                                    {{-- <td>{{$key+1}}</td> --}}
                                    <td class="table-text">
                                        <div><a href="{{route('task', $task->id)}}" >{{$task->name ?? ''}}</a></div>
                                    </td>

                                    <td>&nbsp;</td>

                                    <!-- Task Delete Button --> 
                                    <td>
                                        <form action="{{url('delete/'.$task->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                        </form>                                 
                                    </td>

                                    <td>&nbsp;</td>

                                    <!-- Task Update Button -->
                                    <td>
                                            {{--   Note :
                                                I wrote the action with url in this way to can avoid error  http://127.0.0.1:8000/edit/edit/51
                                                when double click or click another edit button ,benifits can we switch between update tasks 
                                            --}}
                                        <form action="{{url('edit/'.$task->id)}}" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-pencil fa-fw"></i> Edit
                                                </button>
                                        </form>                                  
                                    </td>

                                </tr>
                        
                            @endforeach
                                
                        </tbody>
                    </table>


                    </div>
                </div>
            </div>
        </div>
    @endif                
    
@endsection

