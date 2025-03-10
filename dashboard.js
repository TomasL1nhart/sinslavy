document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("recordForm");
    const recordsList = document.getElementById("recordsList");
    let records = JSON.parse(localStorage.getItem("records")) || [];
    
    function renderRecords() {
        recordsList.innerHTML = "";
        records.forEach((record, index) => {
            const li = document.createElement("li");
            li.textContent = `${record.name} - ${record.record}`;
            const deleteBtn = document.createElement("button");
            deleteBtn.textContent = "Smazat";
            deleteBtn.onclick = () => {
                records.splice(index, 1);
                localStorage.setItem("records", JSON.stringify(records));
                renderRecords();
            };
            li.appendChild(deleteBtn);
            recordsList.appendChild(li);
        });
    }
    renderRecords();

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        const newRecord = {
            name: form.name.value,
            year: form.year.value,
            field: form.field.value,
            record: form.record.value,
            image: form.image.value || "assets/default.jpg"
        };
        records.push(newRecord);
        localStorage.setItem("records", JSON.stringify(records));
        renderRecords();
        form.reset();
    });
});