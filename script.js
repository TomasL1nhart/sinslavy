
document.addEventListener("DOMContentLoaded", function() {
    fetch("records.json")
        .then(response => response.json())
        .then(data => {
            let index = 0;

            // Funkce pro aktualizaci zobrazení
            function updateRecord() {
                const student = data[index];
                document.getElementById("student-name").textContent = student.name;
                document.getElementById("student-info").textContent = `${student.year}. ${student.field}`;
                document.getElementById("student-record").textContent = student.record;
                document.getElementById("student-image").src = student.image || "assets/default.jpg";
                
                // Přechod mezi žáky (animace fade)
                document.querySelector('.container').classList.remove('fadeIn');
                void document.querySelector('.container').offsetWidth; // Trigger reflow to restart animation
                document.querySelector('.container').classList.add('fadeIn');

                index = (index + 1) % data.length;  // Aktualizace indexu pro cyklické procházení
            }

            updateRecord();  // Zavolání pro první zobrazení
            setInterval(updateRecord, 10000);  // Každých 10 sekund změníme žáka
        })
        .catch(error => console.error('Error loading the records:', error));
});