@extends('cms.paernt');

@section('title','create priorarity')

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
            <h3 class="card-title">Create priority</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('priorities.store') }}">
            @csrf
            <div class="card-body">
        
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
           
        
            </div>
            <!-- /.card-body -->
        
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Store</button>
            </div>
          </form>
        </div>
        

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