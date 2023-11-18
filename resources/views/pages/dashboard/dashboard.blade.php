<x-app-layout>
    {{-- @dd($stations) --}}
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
                                id="{{ $station['station_name'] }}" type="button" role="tab"
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
                <div class="station-target hidden grid grid-cols-12 gap-4" id="{{ $station['station_id_uuid'] }}" role="tabpanel"
                    aria-labelledby="{{ $station['station_name'] }}">
                    {{-- Componentes --}}
                    <div class="col-span-12 sm:col-span-4">
                        <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14  absolute bottom-4 right-3 text-green-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <div class="flex justify-between items-center ">
                                <img class="w-7 filter grayscale"
                                    src="https://v1.tailwindcss.com/_next/static/media/tailwindcss-mark.6ea76c3b72656960a6ae5ad8b85928d0.svg"
                                    alt="taiwind css">
                            </div>
                            <div class="measure text-2xl text-gray-100 font-medium leading-8 mt-5">20</div>
                            <div class="text-sm text-gray-500">{{ $station['station_name'] }}</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-4">
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
                    </div>
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
                <x-dashboard.dashboard-card-01 :dataFeed="$dataFeed" />

                <!-- Line chart (Acme Advanced) -->
                <x-dashboard.dashboard-card-02 :dataFeed="$dataFeed" />

                <!-- Line chart (Acme Professional) -->
                <x-dashboard.dashboard-card-03 :dataFeed="$dataFeed" />

                <!-- Bar chart (Direct vs Indirect) -->
                <x-dashboard.dashboard-card-04 />

                <!-- Line chart (Real Time Value) -->
                <x-dashboard.dashboard-card-05 />

                <!-- Doughnut chart (Top Countries) -->
                <x-dashboard.dashboard-card-06 />

                <!-- Table (Top Channels) -->
                <x-dashboard.dashboard-card-07 />

                <!-- Line chart (Sales Over Time)  -->
                <x-dashboard.dashboard-card-08 />

                <!-- Stacked bar chart (Sales VS Refunds) -->
                <x-dashboard.dashboard-card-09 />

                <!-- Card (Customers)  -->
                <x-dashboard.dashboard-card-10 />

                <!-- Card (Reasons for Refunds)   -->
                <x-dashboard.dashboard-card-11 />

                <!-- Card (Recent Activity) -->
                <x-dashboard.dashboard-card-12 />

                <!-- Card (Income/Expenses) -->
                <x-dashboard.dashboard-card-13 />

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
