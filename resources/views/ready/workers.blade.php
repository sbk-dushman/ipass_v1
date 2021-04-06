@extends('ready.index')
@section('content')
	<div class="table-box-workers">
		<table>
			<tr>
				<th>#</th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Должность</th>
				<th></th>
				<th></th>
			</tr>
			@foreach ($workers as $item)
				<tr class="select-list__item_worker selected_list_disabled">
					<td>{{$loop->iteration}}</td>
					<td class="td_surname_w">
						<input disabled class="input_surname_val input input_worker" type="text" value="{{$item->surname}}">
					</td>
					<td class="td_name_w">
						<input disabled class="input_name_val input input_worker" type="text" value="{{$item->name}}">	
					</td>
					<td class="td_lastname_w">
						<input disabled class="input_lastname_val input input_worker" type="text" value="{{$item->lastname}}">
					</td>
					<td class="td_position_w">
						<input disabled class="input_position_val input input_worker" type="text" value="{{$item->position}}">
					</td>
					<td>
						<img style="width: 20px; height: 20px;" src="/storage/images/{{$item->photo}}" alt="">
					</td>
					<td>
						<button class="remove_from_worker" data-workerid="{{ $item->id }}">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
								<g>
									<g>
										<path d="M408.299,98.512l-32.643,371.975H136.344L103.708,98.512l-41.354,3.625l33.232,378.721    C97.335,498.314,112.481,512,130.076,512h251.849c17.588,0,32.74-13.679,34.518-31.391l33.211-378.472L408.299,98.512z"></path>
									</g>
								</g>
								<g>
									<g>
										<path d="M332.108,0H179.892c-19.076,0-34.595,15.519-34.595,34.595v65.73h41.513V41.513h138.378v58.811h41.513v-65.73    C366.703,15.519,351.184,0,332.108,0z"></path>
									</g>
								</g>
								<g>
									<g>
										<path d="M477.405,79.568H34.595c-11.465,0-20.757,9.292-20.757,20.757s9.292,20.757,20.757,20.757h442.811    c11.465,0,20.757-9.292,20.757-20.757S488.87,79.568,477.405,79.568z"></path>
									</g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
							</svg>
						</button>

						<button class="update_worker_w" data-workerid="{{ $item->id }}">
							<svg height="484pt" viewBox="-15 -15 484.00019 484" width="484pt" xmlns="http://www.w3.org/2000/svg"><path d="m401.648438 18.234375c-24.394532-24.351563-63.898438-24.351563-88.292969 0l-22.101563 22.222656-235.269531 235.144531-.5.503907c-.121094.121093-.121094.25-.25.25-.25.375-.625.746093-.871094 1.121093 0 .125-.128906.125-.128906.25-.25.375-.371094.625-.625 1-.121094.125-.121094.246094-.246094.375-.125.375-.25.625-.378906 1 0 .121094-.121094.121094-.121094.25l-52.199219 156.96875c-1.53125 4.46875-.367187 9.417969 2.996094 12.734376 2.363282 2.332031 5.550782 3.636718 8.867188 3.625 1.355468-.023438 2.699218-.234376 3.996094-.625l156.847656-52.324219c.121094 0 .121094 0 .25-.121094.394531-.117187.773437-.285156 1.121094-.503906.097656-.011719.183593-.054688.253906-.121094.371094-.25.871094-.503906 1.246094-.753906.371093-.246094.75-.621094 1.125-.871094.125-.128906.246093-.128906.246093-.25.128907-.125.378907-.246094.503907-.5l257.371093-257.371094c24.351563-24.394531 24.351563-63.898437 0-88.289062zm-232.273438 353.148437-86.914062-86.910156 217.535156-217.535156 86.914062 86.910156zm-99.15625-63.808593 75.929688 75.925781-114.015626 37.960938zm347.664062-184.820313-13.238281 13.363282-86.917969-86.917969 13.367188-13.359375c14.621094-14.609375 38.320312-14.609375 52.945312 0l33.964844 33.964844c14.511719 14.6875 14.457032 38.332031-.121094 52.949218zm0 0"/></svg>
						</button>
						<button class="save_worker_w hidden" data-workerid="{{ $item->id }}">
							<svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Solid"><path d="m239.029 384.97a24 24 0 0 0 33.942 0l90.509-90.509a24 24 0 0 0 0-33.941 24 24 0 0 0 -33.941 0l-49.539 49.539v-262.059a24 24 0 0 0 -48 0v262.059l-49.539-49.539a24 24 0 0 0 -33.941 0 24 24 0 0 0 0 33.941z"/><path d="m464 232a24 24 0 0 0 -24 24v184h-368v-184a24 24 0 0 0 -48 0v192a40 40 0 0 0 40 40h384a40 40 0 0 0 40-40v-192a24 24 0 0 0 -24-24z"/></g></svg>
						</button>
						<button class="add_from_workers" data-workerid="{{ $item->id }}">
							<svg viewBox="0 0 448 448" xmlns="http://www.w3.org/2000/svg"><path d="m272 184c-4.417969 0-8-3.582031-8-8v-176h-80v176c0 4.417969-3.582031 8-8 8h-176v80h176c4.417969 0 8 3.582031 8 8v176h80v-176c0-4.417969 3.582031-8 8-8h176v-80zm0 0"></path></svg>
						</button>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="pag-box">

		</div>
	</div>
@endsection
