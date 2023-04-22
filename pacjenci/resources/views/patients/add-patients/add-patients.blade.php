<x-app-layout>

    <div class="InfoAlert fixed alert shadow-lg w-96 right-5 top-10 hidden" style="z-index: 99">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="InfoAlert_text text-xs"></span>
        </div>
    </div>

    <div id="NotifyAddPatientCorrect" class="fixed top-0 left-0 z-20 w-full text-white bg-emerald-500" style="z-index: 99; display: none">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex">
                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                    </path>
                </svg>

                <p class="mx-3">Dodano pacjenta do bazy systemowej oraz wprowadzono do kolejki jako oczekujący, <b class="patientname underline"></b></p>
            </div>

            <button class="closeNotifyAlert p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>


    <div class="relative">

        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0">

            <div class="max-w-4xl mx-auto">
                <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                        <h2 class="leading-relaxed">Dodaj pacjenta do bazy</h2>
                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Wypełnij wszystkie wymagane dane, aby zapisać pacjenta.</p>
                    </div>
                </div>

                <form id="form" action="" method="POST">
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose">Imię i Nazwisko</label>
                                <input type="text" id="fullname" name="fullname" minlength="5" maxlength="99" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Pole wymagane*" required>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <label class="leading-loose">Numer telefonu</label>
                                </label>
                                <label class="input-group">
                                    <span class="sm:text-sm bg-white border border-gray-300">+<input id="phone_area_code" placeholder="48" value="48" style="background: none; width: 30px" maxlength="2" required></span>
                                    <input type="text" id="phone" placeholder="Uzupełnij numer telefonu" pattern="[0-9]*" maxlength="9" class="PhoneInput px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required />
                                </label>
                            </div>
                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <button id="resetForm" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Resetuj formularz
                            </button>
                            <button id="SavePatient" type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">
                                <div class="loader hidden" role="status">
                                    <svg aria-hidden="true" class="inline w-5 h-5 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span class="text-zapisz">Zapisz</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


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

                const phone = $('#phone').val();
                const phone_area_code = $('#phone_area_code').val();
                const fullname = $('#fullname').val();

                $.ajax({
                    url: SITEURL + "/addPatient",
                    data: {
                        fullname: fullname,
                        phone: phone_area_code+phone
                    },
                    type: "POST",
                    beforeSend(){
                       $('.loader').removeClass('hidden');
                       $('.text-zapisz').hide();
                    },
                    success: function (response) {

                        if(response.status){
                            $('#form')[0].reset();
                            $('.loader').addClass('hidden');
                            $('.text-zapisz').show().text('Zapisz kolejnego pacjenta');
                            $('#NotifyAddPatientCorrect .patientname').html(fullname);
                            $('#NotifyAddPatientCorrect').show();

                            setTimeout(function() {
                                $('#NotifyAddPatientCorrect').fadeOut('slow');
                            }, 5000);

                        }else {
                            alert('Nie możesz zapisać pacjenta którego numer telefonu znajduje się już w bazie.')
                            $('.loader').addClass('hidden');
                            $('.text-zapisz').show();
                        }

                    }
                });
            });


            /*------------------------------------------
            --------------------------------------------
            Helpers function
            --------------------------------------------
            --------------------------------------------*/

            $("#resetForm").click(function(){
                $('#form')[0].reset();
            });


            $(".closeNotifyAlert").click(function(){
                $('#NotifyAddPatientCorrect').hide();
            });


            $('.PhoneInput').blur(function() {
                const phoneValue = $('#phone_area_code').val() + $('#phone').val();

                if(phoneValue.length > 8){
                        // in custom.js
                        checkPatientExist(SITEURL, phoneValue, function(status) {

                            $('.InfoAlert').show();

                            if(status){
                                $('.InfoAlert_text').html('Pacjent o podanym numerze istnieje już bazie.<br> Przejdź do zakładki <a href="/patients?phone='+phoneValue+'" class="underline"><b>pacjenci</b></a> aby sprawdzić szczegóły.');
                                $('#SavePatient').hide();
                            }else{
                                $('.InfoAlert_text').html('Pacjent nie był nigdy zapisany na operację.');
                                $('#SavePatient').show();
                            }

                            setTimeout(function() {
                                $('.InfoAlert').fadeOut('slow');
                            }, 9500);
                        });
                    }
            });

        });
    </script>

</x-app-layout>
