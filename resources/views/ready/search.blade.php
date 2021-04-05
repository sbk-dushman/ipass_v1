@extends('ready.index')
@section('content')
    
	<div class="table-box-search table-box-pag">
		<table>


			<tr>
					<th class="search_surname"><button name="sort" value="1" type="submit">Фамилия</button></th>
				<th class="search_name">Имя</th>
				<th class="search_lastname">Отчество</th>
				<th>Группа</th>
				<th>Должность</th>
				<th></th>
			</tr>
			<form action="" method="POST">
				@csrf
				@foreach ($fake_search as $item)
				<tr>
					<td>{{ $item->surname }}</td>
					<td>{{ $item->name }}</td>	
					<td>{{ $item->lastname }}</td>
					<td>{{ $item->group }}</td>
					<td>{{ $item->position }}</td>
					<td>
						@if ($addStatus->Oba($id = $item->id))
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
								<path style="fill:#A5EB78;" d="M427.534,73.084l-224.51,224.51c-6.051,6.051-15.863,6.051-21.914,0l-96.645-96.645L8.099,277.313  l145.785,145.785c10.127,10.127,23.862,15.816,38.183,15.816l0,0c14.32,0,28.057-5.69,38.182-15.816l273.65-273.65L427.534,73.084z"/>
								<g style="opacity:0.1;">
									<path d="M478.646,124.196L189.754,413.087c-7.993,7.992-18.043,13.442-28.902,15.872c9.066,6.425,19.956,9.955,31.215,9.955l0,0   c14.32,0,28.057-5.69,38.182-15.816l273.65-273.65L478.646,124.196z"/>
								</g>
								<path d="M192.068,447.014c-16.587,0-32.182-6.459-43.912-18.189L2.372,283.04c-3.163-3.163-3.163-8.292,0-11.454l76.366-76.366  c3.164-3.163,8.292-3.163,11.455,0l28.668,28.667c3.163,3.163,3.163,8.292,0,11.454c-3.165,3.163-8.293,3.162-11.455,0l-22.94-22.94  l-64.911,64.911l140.058,140.058c8.669,8.669,20.195,13.443,32.456,13.443c12.26,0,23.785-4.775,32.456-13.443l186.951-186.952  c3.163-3.163,8.291-3.164,11.455,0c3.163,3.163,3.163,8.292,0,11.454L235.979,428.826  C224.248,440.555,208.653,447.014,192.068,447.014z"/>
								<path d="M192.068,310.232c-6.303,0-12.228-2.454-16.684-6.911l-45.068-45.068c-3.163-3.163-3.163-8.292,0-11.454  c3.164-3.163,8.292-3.163,11.455,0l45.068,45.068c1.396,1.396,3.254,2.165,5.229,2.165s3.833-0.769,5.23-2.166L421.806,67.357  c3.164-3.163,8.292-3.163,11.455,0l76.366,76.366c1.518,1.518,2.372,3.579,2.372,5.727s-0.853,4.209-2.372,5.727l-63.787,63.787  c-3.164,3.163-8.292,3.162-11.455,0c-3.163-3.163-3.163-8.292,0-11.454l58.061-58.06l-64.91-64.91L208.752,303.321  C204.295,307.777,198.369,310.232,192.068,310.232z"/>
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
						@else

						<button
							class="btn_add"
							type="submit"
							name="add_to_cart"
							value="{{ $item->id }}"
						>
							<svg height="30px" viewBox="0 0 512 512" width="50px" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm112 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/></svg>
						</button>
							@endif
					</td>
				</tr>
				@endforeach	
			</form>
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