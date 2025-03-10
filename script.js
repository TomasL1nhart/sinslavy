document.addEventListener("DOMContentLoaded", function() {
    fetch("records.json")
        .then(response => response.json())
        .then(data => {
            let index = 0;
            function updateRecord() {
                document.getElementById("student-name").textContent = data[index].name;
                document.getElementById("student-info").textContent = data[index].year + " - " + data[index].field;
                document.getElementById("student-record").textContent = data[index].record;
                document.getElementById("student-image").src = data[index].image || "assets/default.jpg";
                index = (index + 1) % data.length;
            }
            updateRecord();
            setInterval(updateRecord, 10000);
        });
});