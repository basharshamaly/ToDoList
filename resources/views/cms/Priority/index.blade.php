@extends('cms.paernt');

@section('title','index priorarity')

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
                    <th>created_at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($priorities as $priority )


                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{$priority->name}} </td>
               
                    <td>{{$priority->created_at}}</td>
                    <td style="display:flex; gap:15px;">
                
                <a  href="{{ route('priorities.edit',$priority->id) }}">edit</a>
               
               
             <form action="{{ route('priorities.destroy',$priority->id) }}" method="POST">
                @method('DELETE')
             @csrf
          
                <button type="submit" class="btn btn-danger">delete</button>
             </form>
                      

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
           
       
            {{ $priorities->links() }}
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