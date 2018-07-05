<div class="container">
	<div class="breadcrumbs">

		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">[{{ trans('course/index.st_c') }}]</li>
					</ol>
				</div>
			</div>
		</div>

		<div class="col-sm-6 row">
			<div class="pull-right notify">
				<div class="input-group" id="adv-search">
					<input type="hidden" id="xoa" name="xoa">
					<input type="text" class="form-control" id="search"
					value="{{ request()->session()->get('search') }}"
					onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/course')}}?search='+this.value)"
					placeholder={{ trans('course/index.st_search') }} name="search"
					type="text" id="search"/>
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<div class="dropdown dropdown-lg">
								<button data-toggle="dropdown" type="submit" class="btn btn-warning dropdown-toggle"
								onclick="ajaxLoad('{{url('admin/course')}}?search='+$('#xoa').val())">
								<i class="fa fa-arrow-left " aria-hidden="true"></i>
								</button>
								<button type="submit" class="btn btn-primary"
								onclick="ajaxLoad('{{url('admin/course')}}?search='+$('#search').val())">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
	<h3 class="h3info">{{ trans('course/index.st_infocourse') }}</h3>
	<hr>

	<table class="table table-striped table-bordered center">
		<thead class="thead-dark">
			<tr>
				<th>{{ trans('course/index.st_id') }}</th>
				<th>{{ trans('course/index.st_cName') }}</th>
				<th>{{ trans('course/index.st_dpName') }}</th>
				{{-- 	<th>content</th> --}}
				<th>{{ trans('course/index.bt_action') }}</th>
				<th>{{ trans('course/index.bt_delete') }}</th>
			</tr>
		</thead>
		<tbody>
			{{-- đổ dữ liệu vào view --}}
			@foreach ($course_all as $course)		
			<tr>
				<td>{!! $course->id !!}</td>
				<td>{!! $course->course_name !!}</td>
				<td>{!! $course->department->department_name !!}</td>
				<td>
					<div class="dropdown">
						<button class="btn btn-info dropdown-toggle button botron" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ trans('course/index.bt_action') }}
						</button>
						<div class="botron drow trai25 dropdown-menu center" aria-labelledby="dropdownMenuButton">
							<a class="form-control gachchan" href="{{ route('course.show',$course->id) }}">{{ trans('course/index.st_show') }} <i class="fa fa-list"></i></a>
							<a class="form-control gachchan" href="{{ route('course.edit',$course->id) }}">{{ trans('course/index.st_edit') }} <i class="fa fa-edit"></i></a>
						</div>
					</div>
				</td>
				{{-- xóa --}}
				<td>
					<a value="{{ $course->id }}" data-id="{{$course->id}}" class="btn btn-danger button botron" data-toggle="modal" href='#modal-{{$course->id}}'>{{ trans('course/index.bt_delete') }} <i class="fa fa-trash-o"></i></a> 
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$course->id}}" >
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">{{ trans('course/index.st_confirm') }}</h4>
								</div>
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="fontchu">{{ trans('course/index.bt_contentConfirm') }} <a class="chudo" href="{{ route('student.show',$course->id) }}">
										[{{$course->course_name}}]</a>
									</h4>
								</div>
								<div class="modal-footer">
									{!! Form::open(['method' => 'Delete','route'=>['course.destroy',$course->id]]) !!}
									<button class="btn btn-primary button botron" type="submit">{{ trans('course/index.bt_yes') }} <i class="fa fa-check"></i></button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-warning button botron" data-dismiss="modal">{{ trans('course/index.bt_cancel') }} <i class="fa fa-arrow-left"></i></button>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{{-- phân trang --}}
<div class="form-group center">
	{!! $course_all->links() !!}
</div>