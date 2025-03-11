
document.addEventListener("DOMContentLoaded", function() {
    fetch("records.json")
        .then(response => response.json())
        .then(data => {
            let index = 0;

            function updateRecord() {
                const student = data[index];
                document.getElementById("student-name").textContent = student.name;
                document.getElementById("student-info").textContent = `${student.year}. ${student.field}`;
                document.getElementById("student-record").textContent = student.record;
                document.getElementById("student-image").src = student.image || "assets/default.jpg";
                
                document.querySelector('.container').classList.remove('fadeIn');
                void document.querySelector('.container').offsetWidth; 
                document.querySelector('.container').classList.add('fadeIn');

                index = (index + 1) % data.length; 
            }

            updateRecord();
            setInterval(updateRecord, 10000);
        })
        .catch(error => console.error('Error loading the records:', error));
});