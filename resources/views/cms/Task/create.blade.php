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



          <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
                <div class="form-group">
                    <label for="due_date">Due_Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" placeholder="due_date">
                  </div>

                  <div class="form-group">
                    <label>IsCompleted</label>
                    <select class="custom-select" id="iscompleted" name="iscompleted" >
                        <option selected >false</option>
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
        
      


         
              {{-- <div class="hidden-inputs" id="input-container">
    
                    <div class="form-group" id="group-1" style="display: none">
                        <label for="name">name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
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
                     
               
                      <input type="radio" value="new" id="new" name="user" onclick="perform('new')" >
                      {{-- <input type="radio" value="employee" id="employee" name="user" value="1"> --}}
                      {{-- <label for="new">new</label> --}}
                {{-- </div> --}} 
                <!-- /.card-body -->
    
                <div class="card-footer">
                    {{-- <button type="button" onclick="perform('new')" class="btn btn-primary">Store</button> --}}
                    <button type="submit"  class="btn btn-primary">Store</button>
                  </div>
              </form>
          
           </div>
   


      






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
    function perform(usertype){

        var inputContainer = document.getElementById('input-container');
          inputContainer.style.display = 'block';
          let formdata=new FormData();
        formdata.append('name',document.getElementById('name').value);
        formdata.append('due_date',document.getElementById('due_date').value);
        formdata.append('iscompleted',document.getElementById('iscompleted').value);
        formdata.append('priority_id',document.getElementById('priority_id').value);
        formdata.append('drop_list_id',document.getElementById('drop_list_id').value);
    
        if (usertype==='new') {
         document.getElementById('group-1').style.display = 'initial';
         document.getElementById('group-2').style.display = 'initial';
         document.getElementById('group-3').style.display = 'initial';
         document.getElementById('group-4').style.display = 'initial';
         document.getElementById('group-5').style.display = 'initial';
 
         formdata.append('name',document.getElementById('name').value);
        formdata.append('due_date',document.getElementById('due_date').value);
        formdata.append('iscompleted',document.getElementById('iscompleted').value);
        formdata.append('priority_id',document.getElementById('priority_id').value);
        formdata.append('drop_list_id',document.getElementById('drop_list_id').value);
       
        }
        store('/ToDoList/stor_user/'+usertype,formdata);

        
    
    }
    
</script>

@endsection