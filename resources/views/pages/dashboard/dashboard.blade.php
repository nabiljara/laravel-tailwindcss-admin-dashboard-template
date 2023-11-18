<x-app-layout>
    {{-- @dd($stations) --}}
    {{-- @dd($topics) --}}
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

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

        </div>
        <div id="tabContentExample">
            @foreach ($stations as $station)
                {{-- <div class="station-target hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800"> --}}
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
                                    @break

                                    @case('hum')
                                        <svg class="h-8 w-8 text-gray-400" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-12" />
                                        </svg>
                                    @break

                                    @case('dew_point')
                                        <svg class="h-8 w-8 text-blue-300" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25" />
                                            <line x1="8" y1="16" x2="8.01" y2="16" />
                                            <line x1="8" y1="20" x2="8.01" y2="20" />
                                            <line x1="12" y1="18" x2="12.01" y2="18" />
                                            <line x1="12" y1="22" x2="12.01" y2="22" />
                                            <line x1="16" y1="16" x2="16.01" y2="16" />
                                            <line x1="16" y1="20" x2="16.01" y2="20" />
                                        </svg>
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
                                    @break

                                    @case('wind_dir_last')
                                    <svg class="h-8 w-8 text-white wind-direction" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="8 12 12 8 16 12" />
                                    <line x1="12" y1="16" x2="12" y2="8" />
                                </svg>
                                
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
                                    @break

                                    @case('battery_voltage')
                                        <svg class="h-8 w-8 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M16 7h1a2 2 0 0 1 2 2v.5a.5 .5 0 0 0 .5 .5a.5 .5 0 0 1 .5 .5v3a.5 .5 0 0 1 -.5 .5a.5 .5 0 0 0 -.5 .5v.5a2 2 0 0 1 -2 2h-2" />
                                            <path d="M8 7H6a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h1" />
                                            <polyline points="12 8 10 12 13 12 11 16" />
                                        </svg>
                                    @break

                                    @case('bar_absolute')
                                    <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                      </svg>
                                      
                                    @break
                                @endswitch
                                
                                <div class="{{ $topic }} text-2xl text-gray-100 font-medium leading-8 mt-5">
                                    -
                                    </div>
                                <div class="text-sm text-gray-500">{{ $name_topic }}</div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-span-12 sm:col-span-4">
                        <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14  absolute bottom-4 right-3 text-blue-500" viewBox="0 0 20 20"
                                fill="currentColor">
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
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14  absolute bottom-4 right-3 text-yellow-300" viewBox="0 0 20 20"
                                fill="currentColor">
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
                    </div> --}}
                </div>
                {{-- </div> --}}
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

            </div>

        </div>

        {{-- <script>
            fetch('/json-key-feed')
                .then(a => {
                    return a.json();
                })
                .then(result => {
                    console.log(result.api_key)
                    
                    const url = 'http://localhost:3000/apiv1/estaciones';
                    const data = {
                        api_key: result.api_key,
                        x_api_secret:  result.x_api_secret
                    };
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Respuesta del servidor:', data);
                        })
                        .catch(error => {
                            console.error('Error en la solicitud:', error);
                        });
                });
        </script> --}}
</x-app-layout>
