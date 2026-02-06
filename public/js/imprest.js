document.addEventListener("DOMContentLoaded", function() {
    let wrapper = document.getElementById("expenses_wrapper");
    let addBtn = document.getElementById("add_expense");
    let index = 1;

    // Add expense row
    addBtn.addEventListener("click", function() {
        let row = document.createElement("div");
        row.classList.add("row", "expense-row", "m-t-10");
        row.innerHTML = `
            <div class="col-md-4"><input type="text" name="expenses[${index}][name]" class="form-control" placeholder="Expense name"></div>
            <div class="col-md-4"><input type="number" step="0.01" name="expenses[${index}][rate]" class="form-control expense-field" placeholder="Cost Amount"></div>
            <div class="col-md-2"><input type="file" name="expenses[${index}][receipt]" class="form-control"></div>
            <div class="col-md-2"><button type="button" class="btn btn-danger btn-remove-expense">X</button></div>
        `;
        wrapper.appendChild(row);
        index++;
    });

    // Remove expense row
    wrapper.addEventListener("click", function(e) {
        if (e.target.classList.contains("btn-remove-expense")) {
            e.target.closest(".expense-row").remove();
            calculateTotals();
        }
    });

    // Fetch imprest details
    const imprestSelect = document.getElementById("imprest_select");
    imprestSelect.addEventListener("change", function() {
        let imprestId = this.value;
        if (!imprestId) return;

        fetch(`/imprest/${imprestId}/details`)
            .then(res => res.json())
            .then(data => { 
                document.getElementById("approved_amount").value = data.approved_amount;
                document.getElementById("purpose").value = data.purpose;
                document.getElementById("destination").value = data.destination;
                document.getElementById("start_date").value = data.start_date;
                document.getElementById("end_date").value = data.end_date;
            })
            .catch(err => console.error(err));
    });

    // Auto-calc totals
    function calculateTotals() {
        let total = 0;
        document.querySelectorAll(".expense-row").forEach(row => {
            let rate = parseFloat(row.querySelector("input[name*='[rate]']").value) || 0;
            total += 1 * rate;
        });

        document.getElementById("total_expenditure").value = total;

        let approved = parseFloat(document.getElementById("approved_amount").value) || 0;
        let refund = approved  - total;
        document.getElementById("refund_amount").value = refund;
    }

    document.addEventListener("input", function(e) {
        if (e.target.classList.contains("expense-field")) {
            calculateTotals();
        }
    });
});
