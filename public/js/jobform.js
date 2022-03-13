const slider = document.getElementById("expRange");
const output = document.getElementById("expLabel");
output.innerHTML = `Experience needed (${slider.value} yrs)`;

slider.oninput = function() {
    output.innerHTML = `Experience needed (${this.value} yrs)`;
    console.log("Updated");
}

// Data Picker Initialization
$('.applyLastDate').datepicker();