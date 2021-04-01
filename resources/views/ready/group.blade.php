@extends('ready.index')
@section('content')
	<div class="all_container">
		<div class="main_container">
			<div class="table-box">
				<table>
					<tr>
						<th>#</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Группа</th>
						<th></th>
					</tr>
					@foreach ($students as $item)
					<form action="" method="POST">
						{{ csrf_field() }}
						<tr>	
							<td>{{$loop->iteration}}</td>
							<td>{{$item->surname}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->lastname}}</td>
							<td>{{$item->group}}</td>
							<td>
								<button 
									class="btn_add"
									type="submit"
									name="add_to_cart"
									value="{{ $item->id }}"
								>  
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
							</td>	
						</tr>
					</form>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection