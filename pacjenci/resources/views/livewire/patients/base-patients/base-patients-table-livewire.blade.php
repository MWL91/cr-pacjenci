<div>

    <section class="container px-4 mx-auto mt-10 mb-5">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white">Nasi Pacjenci</h2>

                    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">aktualnie: {{ $numberOfPatients->original['patients_count'] }}</span>
                </div>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Tutaj znajdziesz wszystkich pacjentów zapsianych do bazy systemowej.</p>
            </div>

        </div>

        <div class="mt-6 md:items-center md:justify-between">

            <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg wire:loading.remove wire:target="search" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

                <div wire:loading wire:target="search" class="loaderPatientsNumbers mx-3" role="status">
                    <svg aria-hidden="true" class="inline w-5 h-5 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
                <input wire:model.debounce.400ms="search" type="text" placeholder="Szukaj" value="{{ request('phone') }}" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>


        </div>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    #
                                </th>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Imię i Nazwisko</span>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Telefon
                                </th>


                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Zapisz
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach($patients as $patient)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <p class="text-gray-800">{{ $patient->id }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <p class="text-gray-800">{{ $patient->fullname }}</p>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm whitespace-nowrap">
                                    <p class="text-gray-800">
                                        +{{ $patient->phone }}
                                    </p>
                                </td>

                                <td class="px-12 py-4 text-sm whitespace-nowrap">
                                    <p class="text-gray-800">

                                        <button
                                            data-fullname="{{ $patient->fullname }}"
                                            data-phone="{{ $patient->phone }}"
                                            type="button"
                                            class="showModal__addToQueue px-3 py-2 bg-blue-600 rounded-md text-white text-xs outline-none focus:ring-4 shadow-lg transform active:scale-y-75 transition-transform flex">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                            </svg>

                                            <span class="ml-2">Zapisz na operacje</span>

                                        </button>

                                    </p>

                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 links">{{$patients->links()}}</div>

    </section>



    <!-- //// MODALS //// -->
    <div id="addToQueue" class="hidden relative flex justify-center">

        <div
             class="fixed inset-0 z-50 overflow-y-auto"
             aria-labelledby="modal-title" role="dialog" aria-modal="true"
             style="background: rgba(0,0,0,0.5)"
        >
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>

                <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-900 sm:my-8 sm:w-full sm:max-w-sm sm:p-6 sm:align-middle">
                    <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
                        Zapisz pacjenta do kolejki
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Wybierz grupę pacjenta i dodaj go do kolejki, jeśli zdecydujesz się wybrać datę operacji pacjent otrzyma wyższy priorytet.
                    </p>

                    <form id="form" method="POST" class="mt-4">

                       <input type="text" name="fullname" id="fullname" placeholder="" disabled required class="block mb-3 w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                        <input type="text" name="phone" id="phone" placeholder="" disabled required class="block mb-3 w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />


                        <label class="block mt-1" for="groupSelect">
                            <select id="groupSelect" class="border border-gray-200 rounded-md w-full text-black" required>
                                <option value="" selected disabled>Wybierz grupę</option>
                                @foreach($patientsGroup as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block mt-3" for="date">
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input id="date" datepicker datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Wybierz datę lub zostaw puste" required>
                            </div>
                        </label>

                        <label class="block mt-2" for="infoResult">
                            <p id="infoResult" class="text-xs font-bold text-black"></p>
                        </label>

                        <label class="block mt-1" for="priority">
                            <select id="priority" class="border border-gray-200 rounded-md w-full text-black" required>
                                <option value="" selected disabled>Wybierz priorytet</option>
                                    <option value="0">Niski</option>
                                    <option value="1">Wysoki</option>
                            </select>
                        </label>

                        <div>
                            <textarea id="extrainfo" placeholder="Dodatkowe informacje" class="block  mt-2 w-full  placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                        </div>


                        <div class="mt-4 sm:flex sm:items-center sm:-mx-2">
                            <button id="hiddeModal__addToQueue" type="button" class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                Anuluj
                            </button>

                            <button id="SaveBTN" type="submit" class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">

                                <span class="SaveBTN__text">Zapisz</span>

                                <div class="Loader__save hidden" role="status">
                                    <svg aria-hidden="true" class="inline w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>

                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- //// Script  //// -->

    <script type="module">

        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Get Site URL
            --------------------------------------------
            --------------------------------------------*/
            var SITEURL = "{{ url('/') }}";
            /*------------------------------------------
            --------------------------------------------
            CSRF Token Setup
            --------------------------------------------
            --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#form").on('submit', function (e) {

                e.preventDefault();

                const fullname = $('#fullname').val();
                const phone = $('#phone').val();
                const date = $('#date').val();
                const groupSelect = $('#groupSelect').val();
                const extrainfo = $('#extrainfo').val();
                const priority = $('#priority').val();

                const today = new Date();
                    if (new Date(date) < today) {
                        alert('Data nie może być z przeszłości');
                        return false;
                    }

                $.ajax({
                    url: SITEURL + "/assignPatientToOperation",
                    data: {
                        fullname: fullname,
                        phone: phone,
                        date: date,
                        group_id: groupSelect,
                        extrainfo: extrainfo,
                        priority: priority
                    },
                    type: "POST",
                    dataType: "json",
                    beforeSend: function () {
                        $('#SaveBTN').attr('disabled', true).css('opacity', '0.7');
                        $('.Loader__save').removeClass('hidden');
                        $('.SaveBTN__text').addClass('hidden');
                    },
                    success: function(response) {
                        $('.Loader__save').addClass('hidden');
                        $('.SaveBTN__text').removeClass('hidden').text('Zapisano').css('opacity', '1');
                    }
                });


            });

        });

        // Show modal on click
        $('.showModal__addToQueue').click(function() {
            const fullname = $(this).data('fullname');
            const phone = $(this).data('phone');

            $('#fullname').val(fullname);
            $('#phone').val('+'+phone);

            $('#addToQueue').show();
        });

        // Hide modal on click outside
        $('#hiddeModal__addToQueue').click(function() {
            $('#addToQueue').hide();
            $('#groupSelect').val('');
            $('#date').val('');
            $('#extrainfo').val('');
            $('#SaveBTN').attr('disabled', false).css('opacity', '1');
            $('.SaveBTN__text').text('Zapisz');
        });



    </script>

</div>
