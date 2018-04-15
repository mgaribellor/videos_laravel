@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">

						Videos
						@if(session('message'))
						<div class="alert alert-success">
							{{ session('message') }}
						</div>
						@endif

						<div id="video-list">
								@foreach($videos as $video)
									<div class="video-item col-md-10 pull-left panel panel-default">
											<div class="panel-body">	
										@if(Storage::disk('images')->has($video->image))
											<div class="video-image-thumb col-md-3 pull-left">	
											<div class="video-image-mask">
											<img  class="video-image" src="{{ url('/miniatura/'.$video->image) }} ">	
											</div>
											</div>	
										@endif
											<div class="data">
													<h4 class="video-title"><a href="#">
														{{ $video->title }}	
													</a>	
														</h4>
														<p>{{ $video->user->name.' '.$video->user->surname }}</p>
												</div>
													   <a href="#" class="btn btn-primary">Ver</a>
													@if(Auth::check() && Auth::user()->id == $video->user->id)
														<a href="#" class="btn btn-warning">Editar</a>
														<a href="#" class="btn btn-danger">Eliminar</a>
													@endif
												</div>
										</div>
								@endforeach

						</div>

					</div>
					{{ $videos->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection
