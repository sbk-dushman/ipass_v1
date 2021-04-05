@extends('ready.index')
@section('content')
    
	<div class="table-box-search table-box-pag">
		<table>


			<tr>
				<form action="/еуые" method="GET">
					<div style="display: none" name="page" value="test"></div>
					<th class="search_surname"><button name="sort" value="1" type="submit">Фамилия</button></th>
				</form>
				<th class="search_name">Имя</th>
				<th class="search_lastname">Отчество</th>
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