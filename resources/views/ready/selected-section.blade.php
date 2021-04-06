@extends('ready.index')
@section('content')
    <div class="table-box-selecteds">
        <table class="table_selecteds">
            <tr>
                <th>#</th>
                <th></th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th></th>
                <th>Группа</th>
                <th>Должность</th>
                <th>Шаблон</th>
                <th></th>
            </tr>
            @foreach ($selecteds as $item)
                {{-- selected_list_disabled --}}
                <tr class="select-list__item selected_list_disabled" data-this_table_row_selected="selected_list">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->group)
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
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
                        @else
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512"
                                width="512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m502.024 156.633c5.987-2.128 9.983-7.797 9.976-14.151-.008-6.354-4.018-12.013-10.009-14.127l-241-85.031c-3.229-1.14-6.752-1.14-9.981 0l-241 85.031c-5.992 2.113-10.002 7.773-10.01 14.127s3.989 12.023 9.976 14.151l95.469 33.94v97.847c0 16.149 16.847 29.806 50.073 40.59 28.961 9.4 64.647 14.577 100.483 14.577s71.521-5.177 100.483-14.577c33.226-10.784 50.073-24.44 50.073-40.59v-97.847l39.417-14.013v135.584c-17.529 6.198-30.125 22.927-30.125 42.552 0 19.624 12.596 36.354 30.125 42.552v57.285c0 8.284 6.716 15 15 15s15-6.716 15-15v-57.285c17.529-6.198 30.125-22.927 30.125-42.552 0-19.624-12.596-36.354-30.125-42.552v-146.25zm-41.051 213.187c-8.34 0-15.125-6.785-15.125-15.125s6.785-15.125 15.125-15.125 15.125 6.785 15.125 15.125-6.785 15.125-15.125 15.125zm-204.973-296.445 196.069 69.179-196.069 69.703-196.069-69.704zm120.556 212.784c-2.875 2.898-13.167 9.839-36.396 16.466-24.781 7.069-54.67 10.962-84.16 10.962s-59.378-3.893-84.16-10.962c-23.229-6.627-33.521-13.567-36.396-16.466v-84.921l115.531 41.072c1.625.578 3.325.867 5.024.867 1.7 0 3.399-.289 5.024-.867l115.531-41.072v84.921z" />
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
                    <td>{{ $item->photo }}</td>
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
                                <option selected value="2">Студент</option>
                            </select>
                        @else
                            <select class="select" name="{{ $item->id }}">
                                <option value="1">Преподователь</option>
                                <option selected value="2">Студент</option>
                            </select>
                        @endif
                    </td>
                    <td class="td_last_dis">
                        @if ($item->group)
                            <button class="select_section__btn-remove" data-studID="{{ $item->id }}">
                                <svg height="427pt" viewBox="-40 0 427 427.00131" width="427pt"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                    <path
                                        d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                    <path
                                        d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                    <path
                                        d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                </svg>
                            </button>
                        @else
                            <button class="select_section__btn-remove" data-studID="{{ $item->id }}">
                                <svg height="427pt" viewBox="-40 0 427 427.00131" width="427pt"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                    <path
                                        d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                    <path
                                        d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                    <path
                                        d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                </svg>
                            </button>
                            <button class="update_worker" data-studID="{{ $item->id }}">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 469.336 469.336"
                                    style="enable-background:new 0 0 469.336 469.336;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M456.836,76.168l-64-64.054c-16.125-16.139-44.177-16.17-60.365,0.031L45.763,301.682
									c-1.271,1.282-2.188,2.857-2.688,4.587L0.409,455.73c-1.063,3.722-0.021,7.736,2.719,10.478c2.031,2.033,4.75,3.128,7.542,3.128
									c0.979,0,1.969-0.136,2.927-0.407l149.333-42.703c1.729-0.5,3.302-1.418,4.583-2.69l289.323-286.983
									c8.063-8.069,12.5-18.787,12.5-30.192S464.899,84.237,456.836,76.168z M285.989,89.737l39.264,39.264L120.257,333.998
									l-14.712-29.434c-1.813-3.615-5.5-5.896-9.542-5.896H78.921L285.989,89.737z M26.201,443.137L40.095,394.5l34.742,34.742
									L26.201,443.137z M149.336,407.96l-51.035,14.579l-51.503-51.503l14.579-51.035h28.031l18.385,36.771
									c1.031,2.063,2.708,3.74,4.771,4.771l36.771,18.385V407.96z M170.67,390.417v-17.082c0-4.042-2.281-7.729-5.896-9.542
									l-29.434-14.712l204.996-204.996l39.264,39.264L170.67,390.417z M441.784,121.72l-47.033,46.613l-93.747-93.747l46.582-47.001
									c8.063-8.063,22.104-8.063,30.167,0l64,64c4.031,4.031,6.25,9.385,6.25,15.083S445.784,117.72,441.784,121.72z" />
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
		<div class="pag">
			<ul class="pagination">
				<li class="pagination__item">
					{{$selecteds->links()}}
				</li>
			</ul>
		</div>
    </div>
@endsection
