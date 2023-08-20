@extends('cms.paernt');

@section('title','create List')

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
            <h3 class="card-title">Create List</h3>
          </div>
    <form id="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="button" onclick="perform('lists')" class="btn btn-primary">Store</button>
              {{-- <button type="button" onclick="document.getelementById('form').innerHTML=kk()." class="btn btn-primary">oiio</button> --}}
              <button type="button" id="but" class="btn btn-primary">Store as</button>

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


<script>
    document.getElementById("but").addEventListener("click", function () {
    //   document.getElementById("input-container").style.display = "block";
    document.querySelector('.card-body').innerHTML += `   <div class="hidden-inputs input-container">
            
            <div class="form-group group-1">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name_1" name="name_1[]" placeholder="name_1">
              </div>
            <div class="form-group group-2">
                <label for="due_date">Due_Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date[]" placeholder="due_date">
              </div>

              <div class="form-group group-3">
                <label>IsCompleted</label>
                <select class="custom-select" id="iscompleted" name="iscompleted[]" >
                    <option selected >false</option>
                  <option value="true">True</option>
                  <option value="false">false</option>
                </select>
              </div>

              <div class="form-group group-4">
                <label>priority</label>
                <select class="form-control" id="priority_id" name="priority_id[]">
                    @foreach ($priorities as $priority )
                    <option value="{{  $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
              </div>
     
      </div> `
  });
</script>
     
    <script>

         function perform(userType) {
        const formdata = new FormData(document.getElementById('form'));

    store('/ToDoList/stor_user/' + userType, formdata);
}
    </script>

@endsection