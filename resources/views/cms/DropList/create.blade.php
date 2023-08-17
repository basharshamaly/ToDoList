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
          <!-- /.card-header -->
          <!-- form start -->
         {{-- @include('cms.form_store') --}}
      
        


    <form>
            @csrf
            <div class="card-body">
        
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
                  
              


                  <div class="hidden-inputs" id="input-container">
            
                    <div class="form-group" id="group-1" style="display: none">
                        <label for="name">name</label>
                        <input type="text" class="form-control" id="name_1" name="name_1" placeholder="name_1">
                      </div>
                    <div class="form-group" id="group-2" style="display: none">
                        <label for="due_date">Due_Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" placeholder="due_date">
                      </div>
    
                      <div class="form-group" id="group-3" style="display: none">
                        <label>IsCompleted</label>
                        <select class="custom-select" id="iscompleted" name="iscompleted" >
                            <option selected >false</option>
                          <option value="true">True</option>
                          <option value="false">false</option>
                        </select>
                      </div>
    
                      <div class="form-group" id="group-4" style="display: none">
                        <label>priority</label>
                        <select class="form-control" id="priority_id" name="priority_id">
                            @foreach ($priorities as $priority )
                            <option value="{{  $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                        </select>
                      </div>
    
                      <div class="form-group" id="group-5" style="display: none">
                        <label>drop_list</label>
                        <select class="form-control" id="drop_list_id" name="drop_list_id">
                            @foreach ($droplists as $droplist )
                            <option value="{{  $droplist->id }}">{{ $droplist->name }}</option>
                            @endforeach
                        </select>
                      </div>
    
    
                 

                       <input type="radio" value="task" id="task" name="user" onclick="perform('task')">
                        <label for="task">task</label>
    
                       {{-- <input type="radio" value="lists" id="lists" name="user" onclick="perform('lists')">
                       <label for="lists">lists</label> --}}
                <!-- /.card-body -->
           
    
    
             
              </div> 


            </div>
            <!-- /.card-body -->
        
            <div class="card-footer">
              <button type="button" onclick="perform('lists')" class="btn btn-primary">Store</button>
              {{-- <button type="button" onclick="perform('task')" class="btn btn-primary">Store as task</button> --}}
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

         function perform(userType) {

          var inputContainer = document.getElementById('input-container');
          inputContainer.style.display = 'block';
          let formdata=new FormData();

        //   if (userType === 'lists') {
        formdata.append('name', document.getElementById('name').value);
        formdata.append('user', 'lists');
    // } else if (userType === 'task') {
        document.getElementById('group-1').style.display = 'initial';
        document.getElementById('group-2').style.display = 'initial';
        document.getElementById('group-3').style.display = 'initial';
        document.getElementById('group-4').style.display = 'initial';
        document.getElementById('group-5').style.display = 'initial';

        formdata.append('name_1', document.getElementById('name_1').value);
        formdata.append('due_date', document.getElementById('due_date').value);
        formdata.append('iscompleted', document.getElementById('iscompleted').value);
        formdata.append('priority_id', document.getElementById('priority_id').value);
        formdata.append('drop_list_id', document.getElementById('drop_list_id').value);
        formdata.append('user', 'task');
    // } else {
    //     console.log("Error: Invalid selection");
    //     return; // Exit the function if the user type is invalid
    // }

    store('/ToDoList/stor_user/' + userType, formdata);
}
    </script>


@endsection