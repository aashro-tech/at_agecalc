document.addEventListener('DOMContentLoaded', function () {

    const dobField = document.getElementById('dob');
    const modal = document.getElementById('ageModal');
    const modalMessage = document.getElementById('ageModalMessage');
    const modalClose = document.querySelector('.age-modal-close');

    // Set today as max date
    const today = new Date().toISOString().split('T')[0];
    dobField.setAttribute('max', today);

    function showModal(message) {
        modalMessage.textContent = message;
        modal.classList.add('show');
    }

    function hideModal() {
        modal.classList.remove('show');
    }

    modalClose.addEventListener('click', hideModal);
    modal.addEventListener('click', function (e) {
        if (e.target === modal) hideModal();
    });

    if (document.getElementById('calculateAgeButton')) {
        document.getElementById('calculateAgeButton').addEventListener('click', function () {

            const dobValue = dobField.value;

            if (!dobValue) {
                showModal(document.getElementById('errorMsg').textContent.trim());
                return;
            }

            const birthDate = new Date(dobValue);
            const now = new Date();

            if (birthDate > now) {
                showModal('Please enter a valid date of birth.');
                return;
            }

            // Calculate difference
            const diff = now - birthDate;

            const seconds = Math.floor(diff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            const years = Math.floor(days / 365.25);
            const months = Math.floor((days % 365.25) / 30.44);
            const remainingDays = Math.floor((days % 365.25) % 30.44);

            const ageHours = hours % 24;
            const ageMinutes = minutes % 60;
            const ageSeconds = seconds % 60;

            const formatUnit = (value, singular, plural) =>
                `${value}<br><span>${value === 1 ? singular : plural}</span>`;

            document.getElementById('years').innerHTML = formatUnit(years, 'Year', 'Years');
            document.getElementById('months').innerHTML = formatUnit(months, 'Month', 'Months');
            document.getElementById('days').innerHTML = formatUnit(remainingDays, 'Day', 'Days');
            document.getElementById('hours').innerHTML = formatUnit(ageHours, 'Hour', 'Hours');
            document.getElementById('minutes').innerHTML = formatUnit(ageMinutes, 'Minute', 'Minutes');
            document.getElementById('seconds').innerHTML = formatUnit(ageSeconds, 'Second', 'Seconds');

            document.getElementById('ageOutput').style.display = 'flex';
        });
    }

    if (document.getElementById('resetButton')) {
        document.getElementById('resetButton').addEventListener('click', function () {
            document.getElementById('ageOutput').style.display = 'none';
        });
    }
});
