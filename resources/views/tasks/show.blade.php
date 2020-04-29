@extends('layouts.app')
@section('title', 'Task List')

@section('content') 

    <div class="flex-center  full-height">
        <div class="m-b-md">

            <table class="table table-striped task-table" style="width:20cm">
                        <thead>
                            <h1>Task</h1>
                        </thead> 

                <tbody>
                        <tr >
                            <td><h2>ID</h2></td>
                            <td><h2>NAME</h2></td>
                            <td><h2>Created_at</h2></td>
                            <td><h2>Updated_at</h2></td>
                        </tr>
                        <tr>
                            <td>
                                <!-- Task ID --> 
                                <h4>{{$task_show->id}}</h4>                    
                            </td>    

                            <!-- Task NAME --> 
                            <td>                    
                                <h4>{{$task_show->name}}</h4>                                           
                            </td>
                            
                            <!--Created_at Task -->
                            <td>           
                                <h4>{{$task_show->created_at}}</h4>                            
                            </td> 

                            <!--Updated_at Task -->
                            <td>
                                <h4>{{$task_show->updated_at}}</h4>         
                            </td>       
                        
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection