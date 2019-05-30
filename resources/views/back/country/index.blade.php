@extends('back.dashboard')

@section('content')

				<h1>category</h1>
				<br>
				<div class="listar-description">
				
				<li> 
				<a class="listar-btn listar-btngreen" href="{{route('category.create')}}">
										<i class="icon-plus"></i>
										<span>Add Category</span>
									</a>
								</li>
								
								
				</div>
@endsection