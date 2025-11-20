document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('calculateAgeButton')) {
        document.getElementById('calculateAgeButton').addEventListener('click', function() {
            const dob = document.getElementById('dob').value;

            if (dob) {
                // Calculate age
                const birthDate = new Date(dob);
                const now = new Date();
                let diff = now - birthDate;

                const seconds = Math.floor(diff / 1000);
                const minutes = Math.floor(seconds / 60);
                const hours = Math.floor(minutes / 60);
                const days = Math.floor(hours / 24);

                const years = Math.floor(days / 365.25); // Including leap years
                const months = Math.floor((days % 365.25) / 30.44); // Approximate average month length
                const remainingDays = Math.floor((days % 365.25) % 30.44);

                const ageHours = hours % 24;
                const ageMinutes = minutes % 60;
                const ageSeconds = seconds % 60;

                // Grammatical adjustment for each unit
                const formatUnit = (value, singular, plural) => `${value}<br><span>${value === 1 ? singular : plural}</span>`;

                const yearString = formatUnit(years, 'Year', 'Years');
                const monthString = formatUnit(months, 'Month', 'Months');
                const dayString = formatUnit(remainingDays, 'Day', 'Days');
                const hourString = formatUnit(ageHours, 'Hour', 'Hours');
                const minuteString = formatUnit(ageMinutes, 'Minute', 'Minutes');
                const secondString = formatUnit(ageSeconds, 'Second', 'Seconds');

                document.getElementById('years').innerHTML = yearString;
                document.getElementById('months').innerHTML = monthString;
                document.getElementById('days').innerHTML = dayString;
                document.getElementById('hours').innerHTML = hourString;
                document.getElementById('minutes').innerHTML = minuteString;
                document.getElementById('seconds').innerHTML = secondString;

                document.getElementById('ageOutput').style.display = 'flex';
            } else {
                // Retrieve the text from the <p> tag
                const errorMessage = document.getElementById('errorMsg').textContent.trim();
                alert(errorMessage);
            }
        });
    }

    if (document.getElementById('resetButton')) {
        document.getElementById('resetButton').addEventListener('click', function() { ageOutput.style.display = 'none'; });
    }
    
    //Set the current date to maximum date selection limit
    var dobField = document.getElementById('dob');
    var today = new Date().toISOString().split('T')[0];
    dobField.setAttribute('max', today);
});