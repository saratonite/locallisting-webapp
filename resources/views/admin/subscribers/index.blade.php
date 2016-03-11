@extends('layouts.admin')



@section('content')


	
<div class="row">
	<h3>Subscribers</h3>
	@include('admin.partials.alert')
	<div class="col-md-2">
		<ul class="nav nav-list">

			<li><a href="#" onclick="setType('all')">SEND TO ALL</a></li>
			<li><a href="#" onclick="setType('selected')">SEND TO SELECTED</a></li>
			<li><a href="">New SUBSCRIBER</a></li>
			
		</ul>
	</div>

	<div class="col-md-10">
		<div class="col-md-12">
			<form class="form-inline pull-right" data-sunmit-text="..." method="post" action="{{ route('admin::store-subscriber')}}">
			  {{csrf_field()}}

			 
			  <div class="form-group">
			  	@if($errors->newsubscriber->has('email'))
			  	<span class="text-danger">
			  		{{ $errors->newsubscriber->first('email')}}
			  	</span>
			  	@endif
			    <label for="exampleInputEmail2">Email</label>
			    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
			  </div>
			  <button type="submit" class="btn btn-default">Add</button>
			</form>
		</div>
		<form action="{{ route('admin::sendnl')}}" method="post" data-sunmit-text="SENDING...">
		{{csrf_field()}}

	<input type="hidden" name="type" value="all">
		<table class="table table-bordered">
			
			<thead>
				<tr>
					<th class="col-sm-1"># <input  type="checkbox" id="chkSelection" name="chkSelection"> </th>
					<th class="col-md-4">Email Address</th>
					<th class="col-md-1">Status</th>
					<th class="col-md-3">Date</th>
					<th class="col-md-2">Action</th>
				</tr>
			</thead>

			<tbody>
				<!-- Loop -->

				@if(count($subscribers))
					@foreach($subscribers as $subscriber)
						<tr>
							<td>
								<label class="control-label">
								<input class="subchk" type="checkbox" name="subid[]" value="{{$subscriber->id}}"> 
								# {{$row_count}}</label>
							</td>
							<td>{{ $subscriber->email }}</td>
							<td>
								@if($subscriber->active == 1)
									<span>Active</span>
								@else
									<span>Inactived</span>
								@endif
							</td>
							<td>
								{{ $subscriber->created_at->toFormattedDateString()}} , {{$subscriber->created_at->diffForHumans()}}
							</td>
							<td>
								<a href="#delete" class="action-delete" data-record-id="{{ $subscriber->id }}">Delete</a>
							</td>

						</tr>
						<?php $row_count++; ?>
					@endforeach

				@else

				<tr>
					<td class="success" colspan="5">No Records Found</td>
				</tr>
				@endif



				<!-- End Loop -->
			</tbody>
		</table>

		<!-- Pagination -->
		{!! $subscribers->render() !!}
		<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" id="modalEditor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Compose News Letter</h4>
      </div>
      <div class="modal-body">
      		<input type="text" class="form-control" name="subject" placeholder="News Letter Subject">
      		<br>
     	 <textarea name="content" id="" cols="30" rows="10" class="doc-editor"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="Send" class="btn btn-primary">SEND</button>
      </div>
    </div>
  </div>
</div>
	<!-- End All -->
		</form>

		

	</div>	
</div>

<!-- Modals -->
	<!-- All -->



<!-- End Modals -->
</form>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action="" method="post">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Subscriber</h4>
      </div>
      <div class="modal-body">
        	<p class="alert alert-danger" id="modalContext">

        	This will  delete the subscriber , are you sure ?;
        	</p>
        	{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" >
        <input type="hidden" name="action" >
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger">DELETE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- End Modal -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/editor.js')}}"></script>

<script type="text/javascript">
	
	var type_field = $('[name=type]');

	var modalEditor  = $("#modalEditor");


	var chkSelection = $("#chkSelection");

	chkSelection.on('change',function(e){

		var v = $(this).prop('checked');

		$('.subchk').prop('checked',v);



	});

	function isselected(){

		var checked_subs = $('.subchk:checked');

			if(checked_subs.length < 1){
				alert('Please select subscribers');
				return false;
			}

		return true;

	}

	function setType(sendtype){

		type_field.val(sendtype);

		if(sendtype=="selected"){


			if(!isselected()){
				return ;
			}

			

		}

		modalEditor.modal('show');



	}
	var subscribersBase = "{{route('admin::subscribers')}}";

	var delBox = new Confirmbox();

	delBox.create({"el":".action-delete","modal":"#deleteModal","action_url":subscribersBase+"/delete"});

	$(function(){
		$('form').on('submit',function(){

			var submit = $(this).find('[type=submit]');
			submit.attr('disabled','disabled').text($(this).data('sunmit-text'));
		});
	});

</script>
@stop