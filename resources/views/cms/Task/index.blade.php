@extends('cms.paernt');

@section('title','index List')

@section('style')
    
@endsection

@section('content')


@section('content')

<section class="content">
    <div class="container-fluid">



      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                      <th>name</th>
                      <th>priority_name</th>
                      <th>drop_list_name</th>
                      <th>Due_Date</th>
                      <th>IsCompleted</th>
                      <th>drop_list_id</th>
                    <th>created_at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task )


                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{$task->name ?? " "}}</td>
                    <td>{{$task->prioritiy->name ?? " "}}</td>
                    <td>{{$task->drop_lists->name ?? " "}}</td>
                    <td>{{$task->Due_Date}} </td>
                    <td>{{$task->IsCompleted ?? " "}}</td>
                    <td>{{$task->drop_lists->id ?? " "}}</td>
                    <td>{{$task->created_at}}</td>
                    <td style="display:flex; gap:15px;">
                
                <a  href="{{ route('tasks.edit',$task->id) }}">edit</a>
               
             <form action="{{ route('tasks.destroy',$task->id) }}"  method="POST">
           @method('DELETE')
           @csrf
                <button type="submit" class="btn btn-danger">delete</button>
             </form>
                {{-- '{{ $droplist->id }}' --}}
                      

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
        
           {{ $tasks->links() }}
          </div>
          <!-- /.card -->
        </div>
      </div>



      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection


@endsection

@section('scripts')
    
@endsection