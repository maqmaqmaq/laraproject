@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">

					<form class="form-horizontal" method="GET" action="/search">
                        {{ csrf_field() }}

                        <div class="form-group">
                        	<div class="col-md-4">
                        		<h4>Products</h4>
                        	</div>
                        	<div class="col-md-4 col-md-offset-2">
                        		<input type="text" class="form-control" placeholder="name" name="name">
                        	</div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true">
                                </button>
                            </div>
                        </div>
                    </form>
				</div>
				<div class="panel-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Description</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($products as $product)
					    <tr>
					      <td><a href="{{ route('products.show', [$product]) }}">{{ $product->name }}</a></td>
					      <td>{{ $product->description }}</td>
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