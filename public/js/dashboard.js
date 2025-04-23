// Chart Configuration
document.addEventListener("DOMContentLoaded", function () {
    initSalesChart();
    initDonutChart();
    initCalendar();
    setupEventListeners();
});

// Initialize Line Chart
function initSalesChart() {
    const ctx = document.getElementById("salesChart").getContext("2d");
    window.salesChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
            datasets: [
                {
                    label: "Pemesanan",
                    data: [15, 18, 20, 25, 23, 25],
                    borderColor: "#FFCE56",
                    pointBackgroundColor: "#FFCE56",
                    tension: 0.4,
                    fill: false,
                },
                {
                    label: "Berbayar",
                    data: [12, 15, 18, 20, 18, 22],
                    borderColor: "#FF6384",
                    pointBackgroundColor: "#FF6384",
                    tension: 0.4,
                    fill: false,
                },
                {
                    label: "Gagal",
                    data: [10, 12, 15, 18, 15, 20],
                    borderColor: "#36A2EB",
                    pointBackgroundColor: "#36A2EB",
                    tension: 0.4,
                    fill: false,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "bottom",
                    labels: { boxWidth: 12 },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 30,
                },
            },
        },
    });
}

// Initialize Donut Chart
function initDonutChart() {
    const ctxDonut = document
        .getElementById("salesDonutChart")
        .getContext("2d");
    window.donutChart = new Chart(ctxDonut, {
        type: "doughnut",
        data: {
            labels: ["Pemesanan", "Berbayar", "Gagal"],
            datasets: [
                {
                    data: [40, 35, 25],
                    backgroundColor: ["#FFCE56", "#FF6384", "#36A2EB"],
                    borderWidth: 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: "70%",
            plugins: {
                legend: {
                    position: "bottom",
                    labels: { boxWidth: 12 },
                },
            },
        },
    });
}

// Calendar Variables
let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

// Initialize Calendar
function initCalendar() {
    updateCalendar();
}

// Update Calendar Display
function updateCalendar() {
    document.getElementById("current-month").textContent = new Date(
        currentYear,
        currentMonth,
        1
    ).toLocaleString("id-ID", { month: "long", year: "numeric" });

    let firstDay = new Date(currentYear, currentMonth, 1).getDay();
    let daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    let date = 1;
    let calendarBody = document.getElementById("calendar-body");
    calendarBody.innerHTML = "";

    // Creating calendar grid
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        row.style.height = "100px";

        for (let j = 0; j < 7; j++) {
            let cell = document.createElement("td");
            cell.style.verticalAlign = "top";
            cell.style.padding = "5px";

            if (i === 0 && j < firstDay) {
                // Previous month days
                cell.style.backgroundColor = "#f2f2f2";
                let prevMonthDays = new Date(
                    currentYear,
                    currentMonth,
                    0
                ).getDate();
                let prevDate = prevMonthDays - (firstDay - j - 1);
                cell.innerHTML = `<div style="color: #ccc">${prevDate}</div>`;
            } else if (date > daysInMonth) {
                // Next month days
                cell.style.backgroundColor = "#f2f2f2";
                let nextDate = date - daysInMonth;
                cell.innerHTML = `<div style="color: #ccc">${nextDate}</div>`;
                date++;
            } else {
                // Current month days
                cell.innerHTML = `<div>${date}</div>`;

                // Sundays
                if (j === 0) {
                    cell.style.backgroundColor = "#ffcccc";
                }

                // Example appointments
                if (currentMonth === 4 && date === 3) {
                    // May 3rd
                    cell.innerHTML += `
              <div class="mt-2">
                <p class="mb-1" style="font-size: 11px; color: #FF9800;">Pelanggan 1</p>
                <p style="font-size: 11px; color: #F44336;">Pelanggan 2</p>
              </div>
            `;
                }

                date++;
            }

            row.appendChild(cell);
        }

        calendarBody.appendChild(row);

        if (date > daysInMonth) {
            break;
        }
    }
}

// Setup Event Listeners
function setupEventListeners() {
    // Previous month button
    document
        .getElementById("prev-month")
        .addEventListener("click", function () {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            updateCalendar();
        });

    // Next month button
    document
        .getElementById("next-month")
        .addEventListener("click", function () {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            updateCalendar();
        });

    // Month filters for sales chart
    document.querySelectorAll(".month-filter").forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            document.getElementById("bulan-ini-text").textContent =
                this.textContent;
            // Here you would fetch and update chart data based on selected month
        });
    });

    // Month filters for total sales
    document.querySelectorAll(".total-month-filter").forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            document.getElementById("bulan-ini-total-text").textContent =
                this.textContent;
            // Here you would fetch and update donut chart data based on selected month
        });
    });
}
