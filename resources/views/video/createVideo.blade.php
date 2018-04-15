@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Crear nuevo video</div>

					<div class="panel-body">
					

			<form action="{{ route('saveVideo') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
							
							{!! csrf_field() !!}


							@if($errors->any())
							<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>	
							</div>

							@endif
							<div class="form-group">
								<label for="title">
									Titulo
								</label>
				<input type="text"  class="form-control" id="title" name="title" value="{{ old('title') }}" />
							</div>


							<div class="form-group">
								<label for="description">
									Descripcion
								</label>
								<textarea class="form-control" id="description" name="description">
									{{ old('description') }}	
								</textarea>
							</div>

							<div class="form-group">
								<label for="image">
									Miniatura
								</label>
								<input type="file"  class="form-control" id="image" name="image"/>
							</div>

							<div class="form-group">
								<label for="video">
									Archivo de video
								</label>
								<input type="file"  class="form-control" id="video" name="video"/>
							</div>


							<button type="submit" class="btn btn-success">Crear Video</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>





@endsection