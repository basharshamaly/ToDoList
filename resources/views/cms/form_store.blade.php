<form method="POST" action="{{ route('droplists.store') }}">
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