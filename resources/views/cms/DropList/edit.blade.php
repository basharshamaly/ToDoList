@extends('cms.paernt');

@section('title','Edit List')

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
            <h3 class="card-title">edit List</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->


          <form method="POST" action="{{ route('droplists.update',$droplist->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" value="{{ $droplist->name }}" class="form-control" id="name" name="name" placeholder="name">
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