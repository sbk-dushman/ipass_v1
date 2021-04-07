@extends('ready.index')
@section('content')

	<div class="table-box-search table-box-pag">
		<table>

			<tr>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Группа</th>
				<th>Должность</th>
				<th></th>
			</tr>
			@foreach ($fake_search as $item)
			<tr>
				<td>{{ $item->surname }}</td>
				<td>{{ $item->name }}</td>
				<td>{{ $item->lastname }}</td>
				<td>{{ $item->group }}</td>
				<td>{{ $item->position }}</td>
				<td>+</td>
			</tr>
			@endforeach
		</table>
		<div class="pag">
			<ul class="pagination">
				<li class="pagination__item">
					{{$fake_search->links()}}
				</li>
			</ul>
		</div>
	</div>

@endsection
