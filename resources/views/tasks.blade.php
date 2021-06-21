@extends('layouts.app')

@section('content')

    <div class="container-fluid pl-5">
        <h1 class="display-1 font-weight-bold">
            @if(isset($category))
                <div class="mb-5 mt-3">{{ $category }}</div>
            @else
            <div class="mb-5 mt-3">All Tasks</div>
            @endif
            
        </h1>
        
        @if (count($tasks)> 0 )
            <div class="row">
                @foreach ($tasks as $task) 
                    @if($task->status == 0)    
                        <div class="col-sm-3 mb-4">
                            <div id="card" class="card bg-secondary">
                                <div class="card-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="taskcard card-title" onclick="openEditModal('{{ $task->id }}', '{{ $task->name }}', '{{ $task->description }}', '{{ $task->date }}', '{{ $task->time }}')">
                                                {{ $task->name }}
                                            </h5>
                                            <p class="text-dark card-text">{{ $task->date }} {{ $task->time }}</p>
                                        </div>
                                        <div class="col">
                                            <form action="/taskfinish/{{ $task->id }}" method="POST">
                                                {{ csrf_field() }}
            
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-check"></i> Finish Task
                                                </button>
                                                @if(isset($category))
                                                    <input type="text" name="category" value={{ $category }} hidden>
                                                @else
                                                    <input type="text" name="category" value="Home" hidden>
                                                @endif
                                            </form>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>     
        @endif
        
        @if(isset($category))
        <div class="row">
            <div class="col-sm-3 mb-4">
                <div id="add-task" class="card bg-secondary">
                    <div class="card-body bg-secondary">
                        <i class="fa fa-plus" id="plus"></i> Add Task
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (count($tasks)> 0 )
            <h1 class="display-5 font-weight-bold">
                <div class="mb-3 mt-5">Completed</div>
            </h1>
                <div class="row">
                    @foreach ($tasks as $task)
                        @if($task->status == 1)
                            <div class="col-sm-3 mb-4">
                                <div id="card" class="card bg-secondary">
                                    <div class="card-body bg-secondary">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title-finished">
                                                    <del>{{ $task->name }}<del>
                                                </h5>
                                            </div>
                                            <div class="col">
                                                <form class="col-sm-offset-3 col-sm-3" id="delete" action="/task/{{ $task->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> Delete Task
                                                    </button>
                                                    @if(isset($category))
                                                        <input type="text" name="category" value={{ $category }} hidden>
                                                    @else
                                                        <input type="text" name="category" value="Home" hidden>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endif

    </div>

    <div id="modal-add" class="modal">
        <!-- Modal content -->
        <div class="modal-content bg-secondary">
          <span id="close-add" class="close">&times;</span>
          @include('common.errors')
            <form action="/task" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                @if(isset($category))
                    <input type="text" name="category" value={{ $category }} hidden>
                @endif

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="resize: none" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <label>Set time and date</label>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="date">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="time" name="time"> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-edit" class="modal">
        <!-- Modal content -->
        <div class="modal-content bg-secondary">
            <span id="close-edit" class="close">&times;</span>
            @include('common.errors')
            <form id="form-edit" action="" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="label-name form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>

                <div class="label-name form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="resize: none" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <label class=label-name>Set time and date</label>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="date" id="date">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="time" name="time" id="time"> 
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-offset-3 col-sm-3">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-pencil"></i> Edit Task
                        </button>
                        @if(isset($category))
                            <input type="text" name="category" value={{ $category }} hidden>
                        @else
                            <input type="text" name="category" value="Home" hidden>
                        @endif
                    </div>
                </div>
            </form>

            <form class="col-sm-3" id="form-delete" action="" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group row">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete Task
                    </button>
                    @if(isset($category))
                        <input type="text" name="category" value={{ $category }} hidden>
                    @else
                        <input type="text" name="category" value="Home" hidden>
                    @endif           
                </div>
            </form> 
                
        </div>
    </div>

    <script>
        // ADD TASK
        var modalAdd = document.getElementById("modal-add");
        var addTask = document.getElementById("add-task");
        var closeAdd = document.getElementById("close-add");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modalAdd) {
                modalAdd.style.display = "none";
            }

            if (event.target == modalEdit) {
                modalEdit.style.display = "none";
            }
        }

        // When the user clicks on the button, open the modal
        addTask.onclick = function() {
            modalAdd.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        closeAdd.onclick = function() {
            modalAdd.style.display = "none";
        }
    </script>

    <script>
        // EDIT TASK
        var modalEdit = document.getElementById("modal-edit");
        var closeEdit = document.getElementById("close-edit");
        
        function openEditModal(id, name, description, date, time) {
            modalEdit.style.display = "block";
            modalEdit.querySelector("#name").value = name;
            modalEdit.querySelector("#description").value = description;
            modalEdit.querySelector("#date").value = date;
            modalEdit.querySelector("#time").value = time;
            modalEdit.querySelector("#form-edit").action = "/task/" + id;
            modalEdit.querySelector("#form-delete").action = "/task/" + id;
        }

        closeEdit.onclick = function() {
            modalEdit.style.display = "none";
        }
    </script>
    
@endsection