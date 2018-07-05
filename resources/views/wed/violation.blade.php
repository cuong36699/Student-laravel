@extends('../layouts/wed')
@section('content')

<div class="size"></div>

<div class="col-md-12">
	<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('violation/show.st_infovio') }} 
				<p class="chuden">[{{$student_data->full_name}}]</p>
			</h3>
			<hr>
			@foreach ($violation as $vp)
			<h3 class="h3info">
				{{ trans('violation/show.st_vio') }} [{{ $vp->id }}]
			</h3>
			<br>

			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_fov'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					<div class="khung">
						<div class="col-md-12">
							{!! $vp->form_of_violation !!}	
						</div>.
					</div>
				</div>	
			</div>

			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_dv'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('', $vp->date_violation, ['class' => 'form-control'])
					!!}
				</div>	
			</div>

			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_dis'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('', $vp->discipline, ['class' => 'form-control'])
					!!}
				</div>	
			</div>
			<hr>

			@endforeach		
		</div>
		<br>

		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ route('wed.show', $student_data->id) }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
			</div>
		</div>
	</div>
</div>

@endsection