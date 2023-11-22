<x-app-layout>
    {{-- @dd($stations) --}}
    {{-- @dd($topics) --}}
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Alertas -->
        <div id="alerta"
            class="hidden flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M15.133 10.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V1.1a1 1 0 0 0-2 0v2.364a.944.944 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C4.867 13.018 3 13.614 3 14.807 3 15.4 3 16 3.538 16h12.924C17 16 17 15.4 17 14.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.39A1.001 1.001 0 1 1 4.854 3.8a7.431 7.431 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 15.146 3.8a1 1 0 0 1 1.471-1.354 9.425 9.425 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM6.823 17a3.453 3.453 0 0 0 6.354 0H6.823Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div id="mensaje_alerta">
                <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
            </div>
        </div>

        <br>

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />


        <!-- Toasts -->
        <div id="tst_alerta_si"
            class="hidden ms-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Notificacion creada.</div>
        </div>
        <div id="tst_alerta_no"
            class="hidden ms-auto flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">No se pudo crear la notificacion.</div>
        </div>



        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Avatars -->
            {{-- <x-dashboard.dashboard-avatars /> --}}

            <!-- Right: Actions -->
            {{-- <div class=""> --}}

            <!-- Filter button -->
            {{-- <x-dropdown-filter align="right" /> --}}

            <!-- Datepicker built with flatpickr -->
            {{-- <x-datepicker /> --}}

            <!-- Add view button -->
            {{-- <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add View</span>
                </button> --}}

            {{-- </div> --}}


            <!-- Tabs -->
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400"
                    id="tabs" role="tablist">
                    @foreach ($stations as $station)
                        <li class="me-2" role="presentation">
                            <button
                                class="station inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                                id="{{ $station['station_id'] }}" type="button" role="tab"
                                aria-controls="{{ $station['station_id_uuid'] }}" aria-selected="false">
                                {{ $station['station_name'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>



            <!-- Modal toggle -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="ms-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button" onclick="cargarModal()">
                Crear notificación
            </button>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Crear notificación
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Cerrar</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div
                            class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

                            <form id="formulario">

                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="underline_select" class="sr-only">Underline select</label>
                                    <select id="underline_select"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                        <option selected>Seleccionar</option>
                                        @foreach ($topics as $topic => $name_topic)
                                            <option value="{{ $topic }}"
                                                onclick="opcionSeleccionada('{{ $topic }}')">{{ $name_topic }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div id="topicos">
                                    @foreach ($topics as $topic => $name_topic)
                                        <div id="div_{{ $topic }}" class="hidden">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="number" name="{{ $topic }}_max"
                                                    id="{{ $topic }}_max"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " />
                                                <label for="{{ $topic }}_max"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ $name_topic }}
                                                    max</label>
                                            </div>
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="number" name="{{ $topic }}_min"
                                                    id="{{ $topic }}_min"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " />
                                                <label for="{{ $topic }}_min"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ $name_topic }}
                                                    min</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <p id="topico_oculto" hidden></p>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <br>


        </div>
        <div id="tabContentExample">
            @foreach ($stations as $station)
                {{-- Acá van todos los elementos para mostrar --}}
                <div class="station-target hidden grid grid-cols-12 gap-4" id="{{ $station['station_id_uuid'] }}"
                    role="tabpanel" aria-labelledby="{{ $station['station_id'] }}">
                    {{-- Componentes --}}
                    @foreach ($topics as $topic => $name_topic)
                        <div class="col-span-12 sm:col-span-4">
                            <div class="p-4 relative bg-gray-800 border border-gray-800 shadow-lg rounded-2xl">
                                @switch($topic)
                                    @case('temp')
                                        <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M10 13.5a4 4 0 1 0 4 0v-8.5a2 2 0 0 0 -4 0v8.5" />
                                            <line x1="10" y1="9" x2="14" y2="9" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">° C</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('hum')
                                        <svg class="h-8 w-8 text-gray-400" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-12" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">%</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('dew_point')
                                        <svg class="h-8 w-8 text-blue-300" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25" />
                                            <line x1="8" y1="16" x2="8.01" y2="16" />
                                            <line x1="8" y1="20" x2="8.01" y2="20" />
                                            <line x1="12" y1="18" x2="12.01" y2="18" />
                                            <line x1="12" y1="22" x2="12.01" y2="22" />
                                            <line x1="16" y1="16" x2="16.01" y2="16" />
                                            <line x1="16" y1="20" x2="16.01" y2="20" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">° C</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('wind_speed_last')
                                        <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 8h8.5a2.5 2.5 0 1 0 -2.34 -3.24" />
                                            <path d="M3 12h15.5a2.5 2.5 0 1 1 -2.34 3.24" />
                                            <path d="M4 16h5.5a2.5 2.5 0 1 1 -2.34 3.24" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5"> km/h</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('wind_dir_last')
                                        <svg class="h-8 w-8 text-white wind-direction" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <polyline points="8 12 12 8 16 12" />
                                            <line x1="12" y1="16" x2="12" y2="8" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">°</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('rain_storm_last_mm')
                                        <svg class="h-8 w-8 text-blue-600" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <line x1="16" y1="13" x2="16" y2="21" />
                                            <line x1="8" y1="13" x2="8" y2="21" />
                                            <line x1="12" y1="15" x2="12" y2="23" />
                                            <path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5"> mm</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('battery_voltage')
                                        <svg class="h-8 w-8 text-green-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M16 7h1a2 2 0 0 1 2 2v.5a.5 .5 0 0 0 .5 .5a.5 .5 0 0 1 .5 .5v3a.5 .5 0 0 1 -.5 .5a.5 .5 0 0 0 -.5 .5v.5a2 2 0 0 1 -2 2h-2" />
                                            <path d="M8 7H6a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h1" />
                                            <polyline points="12 8 10 12 13 12 11 16" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">%</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break

                                    @case('bar_absolute')
                                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                        </svg>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                                        - </div>
                                                </td>
                                                <td>
                                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5"> mbar</div>
                                                </td>
                                            </tr>
                                        </table>
                                    @break
                                @endswitch
                                <b>
                                    <div class="text-sm text-gray-500">{{ $name_topic }}</div>
                                </b>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
        {{-- <div class="grid grid-cols-12 gap-4 ">
            <div class="col-span-12 sm:col-span-4">
                <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-green-400"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>
                    <div class="flex justify-between items-center ">
                        <img class="w-7 filter grayscale"
                            src="https://v1.tailwindcss.com/_next/static/media/tailwindcss-mark.6ea76c3b72656960a6ae5ad8b85928d0.svg"
                            alt="taiwind css">
                    </div>
                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">20</div>
                    <div class="text-sm text-gray-500">Components</div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4">
                <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-blue-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                    <div class="flex justify-between items-center ">
                        <i class="fab fa-behance text-xl text-gray-400"></i>
                    </div>
                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">99</div>
                    <div class="text-sm text-gray-500">Projects</div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4">
                <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-yellow-300"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex justify-between items-center ">
                        <i class="fab fa-codepen text-xl text-gray-400"></i>
                    </div>
                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">50</div>
                    <div class="text-sm text-gray-500">Pen Items</div>
                </div>
            </div>
        </div> --}}

        <br>

        <br><br><br>
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">


            <!-- Cards -->
            <div class="grid grid-cols-12 gap-6">


                {{-- <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                    acquisitions of 2021 so far, in reverse chronological order.</p>
            </a> --}}


                <!-- Line chart (Acme Plus) -->
                {{-- <x-dashboard.dashboard-card-01 :dataFeed="$dataFeed" /> --}}

                <!-- Line chart (Acme Advanced) -->
                {{-- <x-dashboard.dashboard-card-02 :dataFeed="$dataFeed" /> --}}

                <!-- Line chart (Acme Professional) -->
                {{-- <x-dashboard.dashboard-card-03 :dataFeed="$dataFeed" /> --}}

                <!-- Bar chart (Direct vs Indirect) -->
                {{-- <x-dashboard.dashboard-card-04 /> --}}

                <!-- Line chart (Real Time Value) -->
                {{-- <x-dashboard.dashboard-card-05 /> --}}

                <!-- Doughnut chart (Top Countries) -->
                {{-- <x-dashboard.dashboard-card-06 /> --}}

                <!-- Table (Top Channels) -->
                {{-- <x-dashboard.dashboard-card-07 /> --}}

                <!-- Line chart (Sales Over Time)  -->
                {{-- <x-dashboard.dashboard-card-08 /> --}}

                <!-- Stacked bar chart (Sales VS Refunds) -->
                {{-- <x-dashboard.dashboard-card-09 /> --}}

                <!-- Card (Customers)  -->
                {{-- <x-dashboard.dashboard-card-10 /> --}}

                <!-- Card (Reasons for Refunds)   -->
                {{-- <x-dashboard.dashboard-card-11 /> --}}

                <!-- Card (Recent Activity) -->
                {{-- <x-dashboard.dashboard-card-12 /> --}}

                <!-- Card (Income/Expenses) -->
                {{-- <x-dashboard.dashboard-card-13 /> --}}




<!-- Nav -->
<div
class="fixed z-50 w-full h-16 max-w-md -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">

<div class="grid h-full max-w-lg grid-cols-3 mx-auto">
    <button data-tooltip-target="tooltip-home" type="button"
        class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
        <a href={{ route('dashboard') }}>
            <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            <span class="sr-only">Dashboard</span>
        </a>
    </button>
    <div id="tooltip-home" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Dashboard
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <button data-tooltip-target="tooltip-mapa" type="button"
        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
        <a href={{ route('map') }}>
            <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
            </svg>
            <span class="sr-only">Mapa</span>
        </a>
    </button>
    <div id="tooltip-mapa" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Mapa
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <button data-tooltip-target="tooltip-profile" type="button"
        class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
        <a href="{{ route('profile.show') }}">
            <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
            </svg>
            <span class="sr-only">Perfil</span>
        </a>
    </button>
    <div id="tooltip-profile" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Perfil
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
</div>

            </div>

        </div>

        <script>
            const stations = {
                123501: {
                    "name": "Cielos del Sur", //
                    "topics": {
                        "temp": 525320,
                        "hum": 525320,
                        "dew_point": 525320,
                        "wind_speed_last": 464200,
                        "rain_storm_last_mm": 464200,
                        "battery_voltage": 462215,
                        "bar_absolute": 462216
                    }
                },
                138225: {
                    "name": "Glyn", //
                    "topics": {
                        "temp": 525327,
                        "hum": 525327,
                        "dew_point": 525327,
                        "battery_voltage": 525169,
                        "bar_absolute": 525170
                    }
                },
                145839: {
                    "name": "Villa Favaloro (Los Antiguos)",
                    "topics": {
                        "temp": 653825,
                        "hum": 653825,
                        "dew_point": 653825,
                        "wind_speed_last": 653824,
                        "wind_dir_last": 653824,
                        "rain_storm_last_mm": 653824,
                        "battery_voltage": 653824,
                        "bar-absolute": 557448
                    }
                },
                145862: {
                    "name": "Las Santinas VIRCH",
                    "topics": {
                        "temp": 558414,
                        "hum": 558414,
                        "dew_point": 558414,
                        "battery_voltage": 557536,
                        "bar_absolute": 557537
                    }
                },
                167442: {
                    "name": "Glyn 3",
                    "topics": {
                        "temp": 653139,
                        "hum": 653139,
                        "dew_point": 653139,
                        "battery_voltage": 650012,
                        "bar_absolute": 650019
                    }
                }
            };

            const topicsAttr = {
                "temp": {
                    "description": "Temperatura",
                    "unit": "° C",
                },
                "hum": {
                    "description": "Humedad",
                    "unit": "%",
                },
                "dew_point": {
                    "description": "Punto de rocio",
                    "unit": "° C",
                },
                "wind_speed_last": {
                    "description": "Velocidad del viento",
                    "unit": "km/h",
                },
                "wind_dir_last": {
                    "description": "Dirección del viento",
                    "unit": "°",
                },
                "rain_storm_last_mm": {
                    "description": "Lluvia",
                    "unit": "mm",
                },
                "battery_voltage": {
                    "description": "Batería",
                    "unit": "%",
                },
                "bar_absolute": {
                    "description": "Presión",
                    "unit": "mbar",
                },
            };


            function cargarModal() {
                // colocar header
                const stationId = document.getElementById('tabs').querySelector('[aria-selected="true"]').id;
                var headerModal = document.getElementById("crud-modal").querySelector("h3");
                headerModal.innerHTML = "Crear notificación para " + stations[stationId]["name"];

                // ocultar todos 
                var nodos = document.getElementById('topicos').querySelectorAll('[id^="div_"]');
                nodos.forEach((item) => {
                    if (!item.classList.contains("hidden")) {
                        item.classList.toggle("hidden"); // toggle no funciona en chrome
                        /*
                        if (item.style.display == "block") {
                            item.style.display = "none";
                        } else {
                            item.style.display = "block";
                        }
                        */
                    }
                });

                var selectModal = document.getElementById("crud-modal").querySelector("#underline_select");

                // vaciar select 
                for (o in selectModal.options) {
                    selectModal.options.remove(0);
                }

                //cargar select
                Object.keys(stations[stationId]["topics"]).forEach(t => {
                    //console.log(key, obj[key]);
                    var opt = document.createElement("option");

                    opt.setAttribute('value', t);
                    opt.setAttribute('onclick', 'opcionSeleccionada("' + t + '")');
                    opt.innerHTML = topicsAttr[t]['description']; // whatever property it has

                    // then append it to the select element
                    selectModal.appendChild(opt);
                });
            }

            // MODAL SELECT
            function opcionSeleccionada(id) {
                var elemento = document.getElementById('div_' + id);

                var nodos = document.getElementById('topicos').querySelectorAll('[id^="div_"]');
                nodos.forEach((item) => {
                    if (!item.classList.contains("hidden")) {
                        item.classList.toggle("hidden"); // toggle no funciona en chrome
                        /*
                        if (item.style.display == "block") {
                            item.style.display = "none";
                        } else {
                            item.style.display = "block";
                        }
                        */
                    }
                });

                //     nodos = document.getElementById('topicos').querySelectorAll('input');
                //     nodos.forEach((item) => {
                //         item.value = "";
                //     });

                elemento.classList.toggle("hidden"); // toggle no funciona en chrome 
                /*
                if (elemento.style.display == "block") {
                    elemento.style.display = "none";
                } else {
                    elemento.style.display = "block";
                }
                */

                document.getElementById("topico_oculto").innerHTML = id;
            };


            // ALERTAS
            function generarAlerta(nuevoMensaje) {
                mensajeAlerta = document.getElementById("mensaje_alerta");

                titulo = nuevoMensaje.split(" ")[0]
                cuerpo = nuevoMensaje.substring(titulo.length, nuevoMensaje.length)

                mensajeAlerta.innerHTML = '<span class="font-medium">' + titulo + '</span>' + cuerpo;

                alerta = document.getElementById("alerta");
                alerta.classList.toggle("hidden");

                setTimeout(function() {
                    // ocultarElemento("alerta");
                    alerta.classList.toggle("hidden");
                }, 10000);

                cargarNotificacion(titulo, cuerpo)
            }


            function cargarNotificacion(titulo, cuerpo) {
                if (document.querySelectorAll("#lista_notif li").length == 5) {
                    // solo se mantienen hasta 4 notificaciones
                    primerLi = document.querySelector("#lista_notif li")
                    primerLi.remove()
                }

                ul = document.getElementById("lista_notif")
                li = document.createElement("li")
                li.setAttribute('class', 'border-b border-slate-200 dark:border-slate-700 last:border-0');

                a = document.createElement("a")
                a.setAttribute('class',
                    'block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20" href="#0" @click="open = false" @focus="open = true" @focusout="open = false'
                );

                spanExtTexto = document.createElement("span")
                spanExtTexto.setAttribute('class', 'block text-sm mb-2')

                spanIntTitulo = document.createElement("span")
                spanIntTitulo.setAttribute('class', 'font-medium text-slate-800 dark:text-slate-100');
                spanIntTitulo.innerHTML = titulo

                spanFecha = document.createElement("span")
                spanFecha.setAttribute('class', 'block text-xs font-medium text-slate-400 dark:text-slate-500');
                fecha = new Date()
                options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: "numeric",
                    minute: "numeric",
                    second: "numeric"
                };
                spanFecha.innerHTML = fecha.toLocaleString('es-ES', options)

                spanExtTexto.innerHTML = '<span class="font-medium text-slate-800 dark:text-slate-100">' + titulo + '</span> ' +
                    cuerpo;

                a.appendChild(spanExtTexto)
                a.appendChild(spanFecha)

                li.appendChild(a)
                ul.appendChild(li)
            }

            /*
                        function ocultarElemento(idElemento) {
                            // target element that will be dismissed
                            const $targetEl = document.getElementById(idElemento);

                            // optional trigger element
                            const $triggerEl = document.getElementById("triggerElement");

                            // options object
                            const optionsAlert = {
                                transition: "transition-opacity",
                                duration: 1000,
                                timing: "ease-out",

                                //callback functions
                                onHide: (context, targetEl) => {
                                    console.log("element has been dismissed");
                                    console.log(targetEl);
                                },
                            };

                            // instance options object
                            const instanceOptionsAlert = {
                                id: "targetElement",
                                override: true,
                            };

            */
            /*
             * $targetEl (required)
             * $triggerEl (optional)
             * options (optional)
             * instanceOptions (optional)
             */
            /*               const dismiss = new Dismiss(
                                    $targetEl,
                                    $triggerEl,
                                    optionsAlert,
                                    instanceOptionsAlert
                                );

                                // hide the target element
                                dismiss.hide();
                            }
                */
            function mostrarToast(idToast) {
                console.log("mostrar toast")
                tstNotificacion = document.getElementById(idToast);
                tstNotificacion.classList.toggle("hidden");

                setTimeout(function() {
                    alerta.classList.toggle("hidden");
                }, 10000);
            }

            // FORM NOTIFICACIONES | REGLAS
            const form = document.getElementById("formulario");
            form.addEventListener("submit", (event) => {
            event.preventDefault()

            const stationId = document.getElementById('tabs').querySelector('[aria-selected="true"]').id;
            
            var headerModal = document.getElementById("crud-modal").querySelector("h3");
            headerModal.innerHTML = "Crear notificacion para " + stations[stationId]["name"];

            var topicoElegido = document.getElementById("topico_oculto").innerHTML;
            var sensorEstacion = stations[stationId]["topics"][topicoElegido];

            var valorMin = document.getElementById(topicoElegido + "_min").value;
            var valorMax = document.getElementById(topicoElegido + "_max").value;

            // Publica la regla
            const apiUrl = new URL("http://localhost:3000/apiv1/createRule");

            // Objeto con los datos a enviar en el cuerpo de la solicitud
            const requestData = {
                station_id: stationId,
                sensor: sensorEstacion,
                atributo: topicoElegido,
                min: valorMin,
                max: valorMax
            };
            fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(requestData)
                })
                .then(response => response.json())
                .then(data => {
                    mostrarToast("tst_alerta_si");
                    console.log(data);
                })
                .catch(error => {
                    mostrarToast("tst_alerta_no");
                    console.error('Error en la solicitud:', error);
                });
            });

            /*
                // Realizar la solicitud POST con Axios
                axios.post(apiUrl, requestData)
                    .then(response => {
                        console.log('Respuesta del servidor:', response.data);
                    })
                    .catch(error => {
                        console.error('Error en la solicitud:', error.response.data);
                    });

                                axios.post(apiUrl, {
                                        JSON.stringify({
                                            station_id: stationId,
                                            sensor: sensorEstacion,
                                            atributo: topicoElegido,
                                            min: valorMin,
                                            max: valorMax
                                        })
                                    })
                                    .then((response) => {
                                        console.log(response.data);
                                        if (response.statusCode == 201) {
                                            mostrarToast("tst_alerta_si");
                                        } else {
                                            mostrarToast("tst_alerta_no");
                                        }
                                    })
                                    .then((error) => {
                                        console.log(error);
                                        mostrarToast("tst_alerta_no");
                                    });
                */
        </script>

</x-app-layout>
