@extends('ready.index')
@section('content')
    <div class="table-box-selecteds">
         @if ($selecteds->count()<=0)
            <div class="empty-title">
                     Список для печати пуст
                  </div>
                  @else
        <table class="table_selecteds table_sort">
				@csrf
          <thead>
                <tr>
                <th>#</th>
                <th></th>
                <th class="sortON">Фамилия</th>
                <th class="sortON">Имя</th>
                <th class="sortON">Отчество</th>
                <th></th>
                <th class="sortON">Группа</th>
                <th class="sortON">Должность</th>
                <th class="sortON">Шаблон</th>
                <th>
				</th>
            </tr>
          </thead>
            @foreach ($selecteds as $item)
                {{-- selected_list_disabled --}}
                <tr class="select-list__item selected_list_disabled" data-this_table_row_selected="selected_list">

                    <td>{{ ($selecteds ->currentpage()-1) * $selecteds ->perpage() + $loop->index + 1 }}</td>
                    <td>
                        @if ($item->group != '')
                        <svg class="work_hat" id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512"
                        width="512" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m502.024 156.633c5.987-2.128 9.983-7.797 9.976-14.151-.008-6.354-4.018-12.013-10.009-14.127l-241-85.031c-3.229-1.14-6.752-1.14-9.981 0l-241 85.031c-5.992 2.113-10.002 7.773-10.01 14.127s3.989 12.023 9.976 14.151l95.469 33.94v97.847c0 16.149 16.847 29.806 50.073 40.59 28.961 9.4 64.647 14.577 100.483 14.577s71.521-5.177 100.483-14.577c33.226-10.784 50.073-24.44 50.073-40.59v-97.847l39.417-14.013v135.584c-17.529 6.198-30.125 22.927-30.125 42.552 0 19.624 12.596 36.354 30.125 42.552v57.285c0 8.284 6.716 15 15 15s15-6.716 15-15v-57.285c17.529-6.198 30.125-22.927 30.125-42.552 0-19.624-12.596-36.354-30.125-42.552v-146.25zm-41.051 213.187c-8.34 0-15.125-6.785-15.125-15.125s6.785-15.125 15.125-15.125 15.125 6.785 15.125 15.125-6.785 15.125-15.125 15.125zm-204.973-296.445 196.069 69.179-196.069 69.703-196.069-69.704zm120.556 212.784c-2.875 2.898-13.167 9.839-36.396 16.466-24.781 7.069-54.67 10.962-84.16 10.962s-59.378-3.893-84.16-10.962c-23.229-6.627-33.521-13.567-36.396-16.466v-84.921l115.531 41.072c1.625.578 3.325.867 5.024.867 1.7 0 3.399-.289 5.024-.867l115.531-41.072v84.921z" />
                    </svg>
                        @elseif ($item->position != '')

                            <svg class="stud_hat" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M482,363.58V316c0-49.388-15.925-96.331-46.053-135.753c-26.743-34.993-63.719-61.83-105.003-76.443
								C329.795,80.007,310.077,61,286,61h-60c-24.077,0-43.795,19.007-44.944,42.804c-41.284,14.613-78.26,41.45-105.003,76.443
								C45.925,219.669,30,266.612,30,316v47.58C12.541,369.772,0,386.445,0,406c0,24.813,20.187,45,45,45h422c24.813,0,45-20.187,45-45
								C512,386.445,499.459,369.772,482,363.58z M60,316c0-54.091,23.106-104.728,61-140.855V226c0,8.284,6.716,15,15,15s15-6.716,15-15
								v-74.383c9.452-6.034,19.477-11.298,30-15.679V256c0,8.284,6.716,15,15,15s15-6.716,15-15V114.932c0.001-0.041,0-0.082,0-0.123
								V106c0-8.271,6.729-15,15-15h60c8.271,0,15,6.729,15,15v8.805c0,0.043-0.001,0.085,0,0.128V256c0,8.284,6.716,15,15,15
								s15-6.716,15-15V135.938c10.523,4.382,20.548,9.646,30,15.679V226c0,8.284,6.716,15,15,15s15-6.716,15-15v-50.855
								c37.894,36.127,61,86.764,61,140.855v45H60V316z M467,421H45c-8.271,0-15-6.729-15-15s6.729-15,15-15h422c8.271,0,15,6.729,15,15
								S475.271,421,467,421z" />
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
                        @endif
                    </td>
                    <td class="td_surname">
                        @if (!$item->group)
                            <input class="input_surname_val input input_selected" disabled type="text"
                                value="{{ $item->surname }}">
                        @else
                            {{ $item->surname }}
                        @endif
                    </td>
                    <td class="td_name">
                        @if (!$item->group)
                            <input class="input_name_val input input_selected" disabled type="text"
                                value="{{ $item->name }}">
                        @else
                            {{ $item->name }}
                        @endif
                    </td>
                    <td class="td_lastname">
                        @if (!$item->group)
                            <input class="input_lastname_val input input_selected" disabled type="text"
                                value="{{ $item->lastname }}">
                        @else
                            {{ $item->lastname }}
                        @endif
                    </td>
                    <td>
                        <div class="photo-wraper">
                        <img style="width: 20px; height: 20px;" src="/storage{{$item->photo}}" alt="">
                        </div>
                    </td>
                    <td>{{ $item->group }}</td>
                    <td class="td_position">
                        @if (!$item->group)
                            <input class="input_position_val input input_selected" disabled type="text"
                                value="{{ $item->position }}">
                        @else
                            {{ $item->position }}
                        @endif

                    </td>
                    <td class="td" data-td="td">
                        @if ($item->group)
                            <select disabled class="select" name="{{ $item->id }}">
                                <option selected value="1">Студент</option>
                            </select>
                        @else
                            <select data-workid="{{ $item->id }}" class="select" name="{{ $item->id }}">
                                @if ($item->shablon == 1)
                                    <option class="prepod" value="2">Преподователь</option>
                                    <option selected value="1">Студент</option>
                                @elseif ($item->shablon == 2)
                                    <option selected class="prepod" value="2">Преподователь</option>
                                    <option value="1">Студент</option>
                                @endif
                            </select>
                        @endif
                    </td>
                    <td class="td_last_dis">
                        @if ($item->group)
                            <button class="select_section__btn-remove" data-studID="{{ $item->id }}">
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M408.299,98.512l-32.643,371.975H136.344L103.708,98.512l-41.354,3.625l33.232,378.721    C97.335,498.314,112.481,512,130.076,512h251.849c17.588,0,32.74-13.679,34.518-31.391l33.211-378.472L408.299,98.512z"/>
	</g>
</g>
<g>
	<g>
		<path d="M332.108,0H179.892c-19.076,0-34.595,15.519-34.595,34.595v65.73h41.513V41.513h138.378v58.811h41.513v-65.73    C366.703,15.519,351.184,0,332.108,0z"/>
	</g>
</g>
<g>
	<g>
		<path d="M477.405,79.568H34.595c-11.465,0-20.757,9.292-20.757,20.757s9.292,20.757,20.757,20.757h442.811    c11.465,0,20.757-9.292,20.757-20.757S488.87,79.568,477.405,79.568z"/>
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
                        @else
                            <button class="select_section__btn-remove" data-studID="{{ $item->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M408.299,98.512l-32.643,371.975H136.344L103.708,98.512l-41.354,3.625l33.232,378.721    C97.335,498.314,112.481,512,130.076,512h251.849c17.588,0,32.74-13.679,34.518-31.391l33.211-378.472L408.299,98.512z"/>
	</g>
</g>
<g>
	<g>
		<path d="M332.108,0H179.892c-19.076,0-34.595,15.519-34.595,34.595v65.73h41.513V41.513h138.378v58.811h41.513v-65.73    C366.703,15.519,351.184,0,332.108,0z"/>
	</g>
</g>
<g>
	<g>
		<path d="M477.405,79.568H34.595c-11.465,0-20.757,9.292-20.757,20.757s9.292,20.757,20.757,20.757h442.811    c11.465,0,20.757-9.292,20.757-20.757S488.87,79.568,477.405,79.568z"/>
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
                            <button class="edit-btn update_worker" data-studID="{{ $item->id }}">
                               <svg xmlns="http://www.w3.org/2000/svg" height="484pt" viewBox="-15 -15 484.00019 484" width="484pt"><path d="m401.648438 18.234375c-24.394532-24.351563-63.898438-24.351563-88.292969 0l-22.101563 22.222656-235.269531 235.144531-.5.503907c-.121094.121093-.121094.25-.25.25-.25.375-.625.746093-.871094 1.121093 0 .125-.128906.125-.128906.25-.25.375-.371094.625-.625 1-.121094.125-.121094.246094-.246094.375-.125.375-.25.625-.378906 1 0 .121094-.121094.121094-.121094.25l-52.199219 156.96875c-1.53125 4.46875-.367187 9.417969 2.996094 12.734376 2.363282 2.332031 5.550782 3.636718 8.867188 3.625 1.355468-.023438 2.699218-.234376 3.996094-.625l156.847656-52.324219c.121094 0 .121094 0 .25-.121094.394531-.117187.773437-.285156 1.121094-.503906.097656-.011719.183593-.054688.253906-.121094.371094-.25.871094-.503906 1.246094-.753906.371093-.246094.75-.621094 1.125-.871094.125-.128906.246093-.128906.246093-.25.128907-.125.378907-.246094.503907-.5l257.371093-257.371094c24.351563-24.394531 24.351563-63.898437 0-88.289062zm-232.273438 353.148437-86.914062-86.910156 217.535156-217.535156 86.914062 86.910156zm-99.15625-63.808593 75.929688 75.925781-114.015626 37.960938zm347.664062-184.820313-13.238281 13.363282-86.917969-86.917969 13.367188-13.359375c14.621094-14.609375 38.320312-14.609375 52.945312 0l33.964844 33.964844c14.511719 14.6875 14.457032 38.332031-.121094 52.949218zm0 0"/></svg>
                            </button>
                            <button class="save_worker hidden" data-workerid="{{ $item->id }}">
                                <svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Solid">
                                        <path
                                            d="m239.029 384.97a24 24 0 0 0 33.942 0l90.509-90.509a24 24 0 0 0 0-33.941 24 24 0 0 0 -33.941 0l-49.539 49.539v-262.059a24 24 0 0 0 -48 0v262.059l-49.539-49.539a24 24 0 0 0 -33.941 0 24 24 0 0 0 0 33.941z" />
                                        <path
                                            d="m464 232a24 24 0 0 0 -24 24v184h-368v-184a24 24 0 0 0 -48 0v192a40 40 0 0 0 40 40h384a40 40 0 0 0 40-40v-192a24 24 0 0 0 -24-24z" />
                                    </g>
                                </svg>
                            </button>
                        @endif
                    </td>
                </tr>

            @endforeach
        </table>

 @if ($selecteds->total() > $selecteds->count())
				<div class="pag">
					<ul class="pagination">
						<li class="pagination__item">
							{{$selecteds->onEachSide(1)->links()}}
						</li>
					</ul>
				</div>
                @endif
                @endif



		{{-- <div class="pag">
			<ul class="pagination">
				<li class="pagination__item">
					{{$selecteds->links()}}
				</li>
			</ul>
		</div> --}}
    </div>
@endsection
