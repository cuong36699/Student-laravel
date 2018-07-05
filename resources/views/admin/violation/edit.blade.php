@extends('../layouts/teamplade')
@section('content')

<div class="form-horizontal">
	{!! Form::model($violation_edit, array('route' => array('violation.update', $violation_edit->id), 'method' => 'put', 'data-parsley-validate' => '')) !!}
	<div class="breadcrumbs">
		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{ route('student.index') }}">{{ trans('violation/edit.st_index') }}</a></li>
						<li><a href="{{ route('student.index') }}">{{ trans('violation/edit.st_url') }}</a></li>
						<li class="active">[{{ trans('violation/edit.st_vEdit') }}]</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="pull-right">
				<div class="input-group notify">
					<a class="btn btn-warning button botron" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>
		</div>
	</div>
	
	<div class="container col-md-12">
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('violation/edit.st_vEdit') }}</h3>
			<hr>

			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_date'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('date_violation') ? 'has-error' : '' }}">
					{!! Form::date('date_violation', 
							$violation_edit->date_violation, [
							'class' => 'form-control',
							'required' => '',
					 		'placeholder' => trans('violation/edit.bt_date'),
					 		'min' => '1900-01-01',
					 		'data-parsley-trigger' => 'change focusout',
					 		'max' => '2018-12-31',
					]) !!}
					<span class="text-danger">{{ $errors ->first('date_violation') }}</span>
				</div>
			</div>

			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_vform'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('form_of_violation') ? 'has-error' : '' }}">
					{!! Form::textarea('form_of_violation',
							$violation_edit->form_of_violation, [
							'class' => 'form-control ckeditor',
							'maxlength' => '2500',
							'required' => '',
							'data-parsley-maxleght' => '2500',
					 		'data-parsley-trigger' => 'change focusout',
					 		'data-parsley-minlength' => '1',
							'placeholder' => 'Please input Content',
							'rows' => '4'
						]) !!}
					<span class="text-danger">{{ $errors ->first('form_of_violation') }}</span>
				</div>
			</div>

			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_discipline'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('discipline') ? 'has-error' : '' }}">
					{!! Form::select('discipline', [
							$violation_edit->discipline=>$violation_edit->discipline,
							'Khiển trách' => 'Khiển trách',
							'Kỷ luật' => 'Kỷ luật',
							'Đuổi học' => 'Đuổi học',
							'Phạt hành chính' => 'Phạt hành chính',
							],
							null,[
							'class' => 'form-control',
							'required' => '',
							'maxlength' => '50',
							'data-parsley-maxleght' => '50',
							'data-parsley-minlength' => '1',
							'data-parsley-trigger' => 'change focusout',
					]) !!}
					<span class="text-danger">{{ $errors ->first('discipline') }}</span>
					</div>			
				</div>
			</div>	
			<br>
			{{-- button --}}
			<div class="form-group benphai">
				<div class="col-md-2">
					<button class="btn btn-primary button botron" type="submit">{{ trans('student/create.bt_create') }} <i class="fa fa-check"></i></button>
				</div>
			</div>
			
			<div class="form-group benphai">
				<div class="col-md-2">
					<a class="btn btn-warning button botron" href="{{ URL::previous() }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>	
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection