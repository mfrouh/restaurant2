@if (session('errors'))
<div class="alert alert-danger alert-dismissible fade show" style="position: absolute;bottom:0; z-index:10;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
       @foreach (session('errors')->all() as $error)
         <strong>{{$error}}</strong><br>
       @endforeach
</div>
<script>
  $(".alert").alert();
</script>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" style="position: absolute;bottom:0; z-index:10;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>
        {{session('success')}}
    </strong>
</div>
<script>
    $(".alert").alert();
</script>
@endif

