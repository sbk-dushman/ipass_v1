@extends('ready.index')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
			<script>
				const getValue = () => {
					let val = ''
					val = document.querySelector('.searchGroupInput').value
					let ul = document.querySelector('.groups')
					ul.innerHTML = ''
					axios.post('/getGroups', {data:  val.toUpperCase()})
						.then(res => {
							res.data.map(element => {
								let data = element.group.split(' ')
								let ul = document.querySelector('.groups')
								let li = document.createElement('li')
								if( data.length == 1 ) {
									li.innerHTML = `<a href=group${data[0]}>${element.group}</a>`
								}else {
									li.innerHTML = `<a href=group${data[0]}%20${data[1]}>${element.group}</a>`
								}
								ul.append(li)
							});
						})
				}
				let val = ''
				axios.post('/getGroups', {data:  val.toUpperCase()})
						.then(res => {
							res.data.map(element => {
								let data = element.group.split(' ')
								let ul = document.querySelector('.groups')
								let li = document.createElement('li')
								if( data.length == 1 ) {
									li.innerHTML = `<a href=group${data[0]}>${element.group}</a>`
								}else {
									li.innerHTML = `<a href=group${data[0]}%20${data[1]}>${element.group}</a>`
								}
								ul.append(li)
							});
						})
			</script>
			<div class="table-box">
                {{-- @dd($students) --}}
               <div class="searchGroup-container">

                <button class="group-btn">

            @if ($students->count()<=0)
            Выберите группу
            @else
            @foreach ($students as $item)
            {{$item->group_id}}
            @break
            @endforeach

            @endif

            </button>
             <input placeholder="Поиск группы..." onkeyup="getValue()" class="searchGroupInput" type="text">

             <div class="searchGroupBox">



					<ul class="groups">

					</ul>
            </div>

				</div>
                @if ($students->count()<=0)
                  <div class="empty-title">
                        Выберите группу
                  </div>
                @else
                	<div class="table-container">
						<table class="table_sort">
							<thead>
							<tr>
								<th>#</th>
								<th class="sortON">Фамилия</th>
								<th class="sortON">Имя</th>
								<th class="sortON">Отчество</th>
								<th class="sortON">Дата поступления</th>
								<th></th>
								<th></th>
							</tr>
							</thead>

							@foreach ($students as $item)
								@csrf
								<tr>
									<td>{{ ($students ->currentpage()-1) * $students ->perpage() + $loop->index + 1 }}</td>
									<td>{{$item->surname}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->lastname}}</td>
									<td>{{ $item->date_of_enrollment }}</td>
									<td>
										@if ( $item->photo != '' )
											<div class="photo-wraper">
												<img style="width: 20px; height: 20px;" src="{{$item->photo}}" alt="">
											</div>
										@else
											<div class="photo-wraper">
												<img style="width: 20px; height: 20px;" src="/storage/images/unnamed.png" alt="">
											</div>  
										@endif
									</td>
									<td>
										@if ($addStatus->Oba($id = $item->id))
											<svg class="svg_added"  fill="#5fc321"viewBox="0 -46 417.81333 417" width="25px" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"/></svg>
										@else

										<button
											class="add_from_students"
											type="submit"
											name="add_from_students"
											value="{{ $item->id }}"
										>
											<svg width="25px" fill="black" viewBox="0 0 448 448"  xmlns="http://www.w3.org/2000/svg"><path d="m272 184c-4.417969 0-8-3.582031-8-8v-176h-80v176c0 4.417969-3.582031 8-8 8h-176v80h176c4.417969 0 8 3.582031 8 8v176h80v-176c0-4.417969 3.582031-8 8-8h176v-80zm0 0"/></svg>
										</button>
										@endif
									</td>
									{{-- <td>1</td> --}}
								</tr>
							@endforeach
						</table>
                        @if ($students->total() > $students->count())
							<div class="paggroup">
								<ul class="pagination">
									<li class="pagination__item groupPag">
										{{$students->onEachSide(1)->links()}}
									</li>
								</ul>
							</div>
						@endif
					</div>
                @endif
			</div>
@endsection
