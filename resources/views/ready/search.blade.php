@extends('ready.index')
@section('content')
    
	<div class="table-box-search">
		<table>

			<tr>
				<th></th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th></th>
				<th>Группа</th>
				<th>Должность</th>
				<th></th>
			</tr>
			@if ((Session::get('resultsStud')) != null)
				@foreach ((Session::get('resultsStud')) as $item)
				<tr>
					<td></td>
					<td>{{ $item->surname }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->lastname }}</td>
					<td></td>
					<td>{{ $item->group }}</td>
					<td></td>
					<td>+</td>
				</tr>
				@endforeach
			@endif
			@if ((Session::get('resultsWork')) != null)
				@foreach ((Session::get('resultsWork')) as $item)
				<tr>
					<td></td>
					<td>{{ $item->surname }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->lastname }}</td>
					<td></td>
					<td></td>
					<td>{{ $item->position }}</td>
					<td>+</td>
				</tr>
				@endforeach
			@endif
			
				
		</table>
	</div>

@endsection