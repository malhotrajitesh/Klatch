 <div style="margin-bottom: 10px;" class="row">
    
  @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  @if ($message = Session::get('error'))
<div class="alert alert-error alert-block" style="color: red">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
</div>