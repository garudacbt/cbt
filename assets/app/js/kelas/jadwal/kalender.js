let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
let arrEnabled;
let f;
let tglSel;
let blnSel;
let thnSel;

let terisi;

//let monthAndYear = document.getElementById("monthAndYear");
//showCalendar(currentMonth, currentYear);
function initCalendar(tglterisi, tgl, month, year, arrEnable, fn) {
    console.log('create calendar', tglterisi, tgl, month, year, arrEnable);
	terisi = tglterisi;
	arrEnabled = arrEnable;
	f = fn;
	var stgl = tgl.split('-');
	if (stgl[1] !== undefined) {
		tglSel = parseInt(stgl[2]);
		blnSel = parseInt(stgl[1]);
		thnSel = parseInt(stgl[0]);
	} else {
		tglSel = 0;
		blnSel = 0;
		thnSel = 0;
	}
	showCalendar(month, year, arrEnabled);
}

function next() {
	currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
	currentMonth = (currentMonth + 1) % 12;
	showCalendar(currentMonth, currentYear, arrEnabled);
}

function previous() {
	currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
	currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
	showCalendar(currentMonth, currentYear, arrEnabled);
}

function jump() {
	currentYear = parseInt(selectYear.value);
	currentMonth = parseInt(selectMonth.value);
	showCalendar(currentMonth, currentYear, arrEnabled);
}

function showCalendar(month, year, arrEnabled) {
	let firstDay = (new Date(year, month)).getDay();
	let daysInMonth = 32 - new Date(year, month, 32).getDate();

	let tbl = document.getElementById("kalendar-body"); // body of the calendar

	// clearing all previous cells
	tbl.innerHTML = "";

	// filing data about month and in the page via DOM.
	//monthAndYear.innerHTML = months[month] + " " + year;
	selectYear.value = year;
	selectMonth.value = month;

	// creating all cells
	let date = 1;
	for (let i = 0; i < 6; i++) {
		// creates a table row
		let row = document.createElement("tr");

		//creating individual cells, filing them up with data.
		for (let j = 0; j < 7; j++) {
			let enable = arrEnabled.includes(''+j+'');

			if (i === 0 && j < firstDay) {
				let cell = document.createElement("td");
				cell.setAttribute('class', 'text-center');
				let cellText = document.createTextNode("");
				cell.appendChild(cellText);
				row.appendChild(cell);
			}
			else if (date > daysInMonth) {
				break;
			}

			else {
				console.log(month, blnSel);
				let cell = document.createElement("td");
				cell.setAttribute('class', 'text-center');
				cell.classList.add("p-0");

				let cellText = document.createTextNode(date);
				let btn = document.createElement('div');

				var jadSelected = date === tglSel && year === thnSel && month === blnSel-1;
                let m = month+1;
                if (m < 10) {
                    m = '0'+m;
                }
                let d = cellText.nodeValue;
                if (d < 10) {
                    d = '0'+d;
                }
                var isTerisi = $.inArray(year+'-'+m+'-'+d, terisi) > -1 && !jadSelected;

                if (jadSelected) {
                    cell.classList.add("bg-lime");
                } else {
                    if (isTerisi) {
                        cell.classList.add("bg-gray-light");
                    }
				}

				if (j === 0) {
					btn.classList.add("text-danger", "text-bold");
				} else {
					if (enable && !isTerisi) {
						cell.onclick = function () {
							var tds = tbl.getElementsByTagName("td");
							for (var n=0; n<tds.length;n++) {
								tds[n].classList.remove("bg-lime");
							}

							var selected = btn.classList.contains('selected');
							cell.classList.toggle("bg-lime", !selected);

							btn.classList.toggle("selected", selected);

							if (typeof f === 'function') {
								/*
								var m = month+1;
								if (m < 10) {
									m = '0'+m;
								}
								var d = cellText.nodeValue;
								if (d < 10) {
									d = '0'+d;
								}
								*/
								f(year, m, d);
							}
						};

                        btn.classList.add("text-primary", "text-bold");
					} else {
						if (isTerisi) {
                            btn.classList.add("text-success", "text-bold");
						} else {
                            btn.classList.add("text-yellow", "text-bold");
						}
					}
				}

				btn.appendChild(cellText);
				cell.appendChild(btn);
				row.appendChild(cell);
				date++;
			}
		}
		tbl.appendChild(row); // appending each row into calendar body.
	}

}
