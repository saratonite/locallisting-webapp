@extends('layouts.admin')

@section('content')
<div class="row">
	<h3>Add City</h3>
	<div class="col-md-6">
		<form action="">
			<div class="form-group">
				<label class="control-label">Name</label>
				<input type="text" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Description</label>
				<input type="text" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">slug</label>
				<input type="text" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary">
			</div>
		</form>
	</div>
</div>
@endsection