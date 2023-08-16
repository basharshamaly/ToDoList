@extends('cms.paernt');

@section('title','create task')

@section('style')
    
@endsection

@section('content')
    

<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          
          <div class="card-header">
            <h3 class="card-title">Create task</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->


          <form method="POST" action="{{ route('tasks.update',$task->id) }}">
            @method('PATCH')
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" value={{ $task->name }} class="form-control" id="name" name="name" placeholder="name">
                  </div>
                <div class="form-group">
                    <label for="due_date">Due_Date</label>
                    <input type="date" value={{ $task->due_date }} class="form-control" id="due_date" name="due_date" placeholder="due_date">
                  </div>

                  <div class="form-group">
                    <label>IsCompleted</label>
                    <select class="custom-select" id="iscompleted" name="iscompleted">
                     
                      <option value="true">True</option>
                      <option value="false">false</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>priority</label>
                    <select class="form-control" id="priority_id" name="priority_id">
                        @foreach ($priorities as $priority )
                        <option value="{{  $priority->id }}">{{ $priority->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>drop_list</label>
                    <select class="form-control" id="drop_list_id" name="drop_list_id">
                        @foreach ($droplists as $droplist )
                        <option value="{{  $droplist->id }}">{{ $droplist->name }}</option>
                        @endforeach
                    </select>
                  </div>
                 
           

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
        <!-- /.card -->


        <!-- /.card -->

      </div>
      <!--/.col (left) -->

      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')
    
@endsection