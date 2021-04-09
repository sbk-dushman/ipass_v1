@extends('ready.index')
@section('content')
	<div class="all_container">
		<div class="main_container">
			<div class="table-box">
                @if ($students->count()<=0)
                  <div class="empty-title">
                        выберите группу
                  </div>
                @else
                	<table class="table_sort">
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
                                @if ($addStatus->Oba($id = $item->id))
                                <svg  fill="#5fc321"viewBox="0 -46 417.81333 417" width="417pt" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"/></svg>
                                @else

                                <button
									class="btn_add"
									type="submit"
									name="add_to_cart"
									value="{{ $item->id }}"
								>


<svg viewBox="0 0 448 448"  xmlns="http://www.w3.org/2000/svg"><path d="m272 184c-4.417969 0-8-3.582031-8-8v-176h-80v176c0 4.417969-3.582031 8-8 8h-176v80h176c4.417969 0 8 3.582031 8 8v176h80v-176c0-4.417969 3.582031-8 8-8h176v-80zm0 0"/></svg>
								</button>
                                 @endif
							</td>
						</tr>
					</form>
					@endforeach
				</table>
                @endif

			</div>
		</div>
	</div>
@endsection
