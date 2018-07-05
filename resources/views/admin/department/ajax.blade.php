<div class="container">
	<div class="breadcrumbs">

		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">[{{ trans('department/index.st_dp') }}]</li>
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
					onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/department')}}?search='+this.value)"
					placeholder={{ trans('department/index.st_search') }} name="search"
					type="text" id="search"/>
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<div class="dropdown dropdown-lg">
								<button data-toggle="dropdown" type="submit" class="btn btn-warning dropdown-toggle"
								onclick="ajaxLoad('{{url('admin/department')}}?search='+$('#xoa').val())">
									<i class="fa fa-arrow-left " aria-hidden="true"></i>
								</button>
								<button type="submit" class="btn btn-primary"
								onclick="ajaxLoad('{{url('admin/department')}}?search='+$('#search').val())">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
	<h3 class="h3info">{{ trans('department/index.st_infoDepartment') }}</h3>
	<hr>
	
	<table class="table table-striped table-bordered center">
		<thead class="thead-dark">
			<tr>
				<th>{{ trans('department/index.st_id') }}</th>
				<th>{{ trans('department/index.st_dpName') }}</th>
				<th>{{ trans('department/index.st_degree') }}</th>
				<th>{{ trans('department/index.st_year') }}</th>
				<th>{{ trans('department/index.bt_action') }}</th>
				<th>{{ trans('department/index.bt_delete') }}</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($department_all as $departments)		
			<tr>
				<td>{!! $departments->id !!}</td>
				<td>{!! $departments->department_name !!}</td>
				<td>{!! $departments->degree !!}</td>
				<td>{!! $departments->graduation_year !!}</td>
				{{-- xem  --}}
				<td class="center">
					<div class="dropdown">
						<button class="btn btn-info dropdown-toggle button botron" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ trans('department/index.bt_action') }}
						</button>
						<div class="botron trai10 drow dropdown-menu center" aria-labelledby="dropdownMenuButton">
							<a class="form-control gachchan" href="{{ route('department.show',$departments->id) }}">{{ trans('department/index.st_show') }} 
								<i class="fa fa-list"></i>
							</a>
							<a class="form-control gachchan" href="{{ route('department.edit',$departments->id) }}">{{ trans('department/index.st_edit') }} 
								<i class="fa fa-edit"></i>
							</a>
						</div>
					</div>
				</td>
				{{-- xóa --}}
				<td>
					{!! Form::open(['method' => 'Delete','route'=>['department.destroy',$departments->id]]) !!}
					<a value="{{ $departments->id }}" data-id="{{$departments->id}}" class="btn btn-danger button botron" data-toggle="modal" href='#modal-{{$departments->id}}'>
						{{ trans('department/index.bt_delete') }} 
						<i class="fa fa-trash-o"></i>
					</a> 
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$departments->id}}" >
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">{{ trans('department/index.st_confirm') }}</h4>
								</div>
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="fontchu">{{ trans('department/index.bt_contentConfirm') }} <a class="chudo" href="{{ route('department.show',$departments->id) }}">
										[{{$departments->department_name}}]</a>
									</h4>
								</div>
								<div class="modal-footer">
									{!! Form::open(['method' => 'Delete','route'=>['department.destroy',$departments->id]]) !!}
									<button class="btn btn-primary button botron" type="submit">
										{{ trans('department/index.bt_yes') }} 
										<i class="fa fa-check"></i>
									</button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-warning button botron" data-dismiss="modal">
										{{ trans('department/index.bt_cancel') }} 
										<i class="fa fa-arrow-left"></i>
									</button>
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
	{!! $department_all->links() !!}
</div>