@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Products

					<a href="{{ route('products.create') }}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></a>
				</div>
				<div class="panel-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Description</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($products as $product)
					    <tr>
					      <td><a href="{{ route('products.edit', [$product]) }}">{{ $product->name }}</a></td>
					      <td>{{ $product->description }}</td>
					      <td>
					      	<a href="{{ route('products.edit', [$product]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					      	<a href="{{ route('products.destroy' , [$product]) }}"
					      	    onclick="event.preventDefault();
					      	             document.getElementById('delete-form={{ $product->id }}').submit();">
					      	    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					      	</a>

					      	<form id="delete-form={{ $product->id }}" action="{{ route('products.destroy' , [$product]) }}" method="POST" style="display: none;">
					      		{{ method_field('DELETE') }}
					      	    {{ csrf_field() }}
					      	</form>
					      </td>
					    </tr>
					@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection