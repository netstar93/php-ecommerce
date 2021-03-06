@section('title', 'Attributes')
@extends('admin.layout')
@section('content')

<div class="right-side" >
    <div class="page-header">        
        <h3>Attributes </h3>
    </div>
	<div class="wrapper">
		<table class="table table-bordered">
			<tr><th>#</th><th>id</th><th>Name</th><th>Type</th><th>Action</th></tr>

			@foreach($collection as $set ) 
				<tr>
					<td><input type="checkbox" name="productEdit"></td>
					<td>{{$set ->id}}</td>
					<td>{{ucfirst($set ->name)}}</td>
					<td>{{ucfirst($set ->type)}}</td>					
					<td>
						<button class="btn btn-success" data-fancybox data-type="iframe" data-src="/admin/attribute/edit/{{$set ->id}}" href="javascript:;" >Edit </button>	
						<button class="btn btn-error" id="deleteRow" item_id ={{$set ->id}}>Remove</button>					
					</td>
				</tr>
			@endforeach

		</table>
	</div>
</div>
@endsection
<script>

</script>

<style>
.fancybox-slide--iframe .fancybox-content {
    width  : 700px;
    height : 500px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}
	</style>