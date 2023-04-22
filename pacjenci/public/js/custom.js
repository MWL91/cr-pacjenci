function checkPatientExist(SITEURL, phone, callback) {
    $.ajax({
        url: SITEURL + "/checkExistPatient",
        data: {
            phone: phone
        },
        type: "POST",
        success: function(response) {
            if (typeof callback === "function") {
                callback(response.status);
            }
        }
    });
}

function getNumberOfPatients(SITEURL){
    $.ajax({
        url: SITEURL + "/AllNumberOfPatients",
        type: "GET",
        success: function (response) {
            $('.NumberOfPatients').html(response.patients_count);
            $('.loaderPatientsNumbers').hide();
        }
    });
}

function getNumberOfOperations(SITEURL){
    $.ajax({
        url: SITEURL + "/AllNumberOfOperations",
        type: "GET",
        success: function (response) {
            $('.NumberOfOperations').html(response.operations_count);
            $('.loaderOperationsNumbers').hide();
        }
    });
}



function getInfoAboutOperationsToday(SITEURL) {
    $.ajax({
        url: SITEURL + "/getInfoAboutOperationsToday",
        type: "GET",
        success: function(response) {

            // Update the number of operations
            $('.numberOfOperationsToday').html(response.number);

            // Update the list of patients
            const patientsList = $('.patientsList');
            const loaderOperationsInfoToday = $('.loaderOperationsInfoToday');
            patientsList.empty()

            if(!response.number){
                patientsList.html('Na dzisiaj nie zapisano operacji.');
                loaderOperationsInfoToday.hide();
                return
            }


            $.each(response.patients, function(index, patient) {

                let priority = patient.priority ? '(wysoki priorytet)' : '';
                let extrainfo = patient.extrainfo === null  ? 'Brak dodatkowych informacji' : patient.extrainfo;

                patientsList.append(
                    '<li class="py-3 sm:py-4">' +
                    '<div class="flex items-center space-x-4">' +
                    '<div class="flex-1 min-w-0">' +
                    '<p class="text-sm font-medium text-gray-900 truncate dark:text-white">' + patient.fullname + ' - ' + patient.name + ' <span class="text-red-600">'+ priority +'</span></p>' +
                    '<p class="text-sm text-gray-500 truncate dark:text-gray-400">+' + patient.phone + '</p>' +
                    '<p class="text-sm text-gray-500 truncate dark:text-gray-400">Uwagi: '+ extrainfo +'</p>' +
                    '</div>' +
                    '<div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"> <div class="flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse dark:bg-gray-900 dark:border-gray-700 dark:divide-gray-700">'+
                    '<a href="/patients?phone='+patient.phone+'" class="cursor-pointer px-2 py-1 font-medium text-gray-600 transition-colors duration-200 sm:px-4 dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 sm:w-5 sm:h-5">'+
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />'+
                    '</svg></a>' +
                    '</div></div>'+
                    '</li>'
                );
            });
            loaderOperationsInfoToday.hide();
        }
    });
}

function todayDate(){
    const dzisiaj = new Date();
    const dzien = dzisiaj.getDate();
    const miesiace = ['styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień'];
    const nazwaMiesiaca = miesiace[dzisiaj.getMonth()];
    const rok = dzisiaj.getFullYear();

    const dzisiejszaData = dzien + ' ' + nazwaMiesiaca + ' ' + rok;
    $('.todayDate').html(dzisiejszaData);

}




