//convert search input to upper case
function convertToUpperCase() {
    var searchInput = document.getElementById('search-input');
    searchInput.value = searchInput.value.toUpperCase();
}

//college page redirect with college id
function redirectToCollege(collegeId) {
    window.location.href = "/college/" + collegeId;
}

//login redirect
function login() {
    window.location.href = "https://faculty.msugensan.edu.ph";
}

//status check box
const checkbox = document.getElementById('show-status-checkbox');
const statusContainer = document.getElementById('status-container');

checkbox.addEventListener('change', function() {
    if (this.checked) {
        statusContainer.style.display = 'block';
    } else {
        statusContainer.style.display = 'none';
    }
});

//rank check box
const rankCheckbox = document.getElementById('show-rank-checkbox');
const rankContainer = document.getElementById('rank-container');


rankCheckbox.addEventListener('change', function() {
    if (this.checked) {
        rankContainer.style.display = 'block';
    } else {
        rankContainer.style.display = 'none';
    }
});

//status count
var permaCount = document.getElementById('permaCount').dataset.count;
var casCount = document.getElementById('casCount').dataset.count;
var joCount = document.getElementById('joCount').dataset.count;

// rank counts
var profCount = document.getElementById('profCount').dataset.count;
var astproCount = document.getElementById('astproCount').dataset.count;
var asoproCount = document.getElementById('asoproCount').dataset.count;
var instCount = document.getElementById('instCount').dataset.count;
var lectCount = document.getElementById('lectCount').dataset.count;



// test if tama ba ang value
// console.log('permanent Count:', permaCount);
// console.log('Casual Count:', casCount);
// console.log('Job order Count:', joCount);
// console.log('Prof Ranks:', profCount);
// console.log('Astpro Ranks:', astproCount);
// console.log('Asopro Ranks:', asoproCount);
// console.log('Inst Ranks:', instCount);
// console.log('Lect Ranks:', lectCount);

//charts
(function () {
    'use strict';

    var config = {
        colors: {
            headingColor: '#1E1E1E',
            axisColor: '#1E1E1E',
            borderColor: '#D9D9D973',
            primary: '#16DBCC',
            info: '#16DBCC'
        }
    };

    let cardColor, headingColor, axisColor, borderColor;

    cardColor = config.colors.primary;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;
    // --------------------------------------------------------------------
    const status_chartEl = document.querySelector('#status_chart');

    if (typeof status_chartEl !== 'undefined' && status_chartEl !== null) {
        const status_chartOptions = {
            series: [
                {
                    name: 'Total Number of Faculty',
                    data: [permaCount, casCount, joCount]
                }
            ],
            chart: {
                height: 300,
                width: 500,
                stacked: true,
                type: 'bar',
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    borderRadius: 7,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: true,
                offsetX: 6,
                style: {
                  fontSize: '10px',
                  fontWeight: '700',
                  colors: ['#fff'],
                  fontFamily: 'roboto'
                },
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3
                },
                labels: {
                    colors: axisColor
                },
                itemMargin: {
                    horizontal: 10
                }
            },
            grid: {
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20
                }
            },
            xaxis: {
                categories: ["Permanent", "Casual", "Job Order"],
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor,
                        lineHeight: '1.5',
                        fontFamily: 'roboto'
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                }
            },
            responsive: [
            ],
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };

        const status_chart = new ApexCharts(status_chartEl, status_chartOptions);
        status_chart.render();
    }
})();

document.addEventListener('DOMContentLoaded', function () {
    var options = {
        series: [{
        name: 'Total',
        data: [profCount,astproCount,asoproCount,instCount,lectCount],
        color: '#16DBCC',
      }],
        chart: {
        type: 'bar',
        height: 300,
        width: 500,
        toolbar: {
            show: true,
            tools:{
              download:false
            }
          }
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: true,
        offsetX: 6,
        style: {
          fontSize: '12px',
          colors: ['#fff'],
          fontFamily: 'roboto',
        }
      },

      tooltip: {
        shared: true,
        intersect: false
      },
      xaxis: {
        categories: ["Professor", "Associate Professor", "Assistant Professor", "Instructor", "Lecturer"
        ],
      }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    
});

//colege page modal
document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const facultyInfo = JSON.parse(button.closest('.container').dataset.facultyInfo);
            const modalBody = modal.querySelector('.modal-body');
            const facultyName = facultyInfo.name || 'Unknown Name';
            const college = facultyInfo.college || 'No data';

            switch (college) {
                case 'College of Agriculture':
                    var collegeName = 'COA';
                    break;
                case 'College of Engineering':
                    var collegeName = 'COE';
                    break;
                case 'College of Social Sciences and Humanities':
                    var collegeName = 'CSSH';
                    break;
                case 'College of Medicine':
                    var collegeName = 'COM';
                    break;
                case 'College of Business Administration and Accountacy':
                    var collegeName = 'Ba&A';
                    break;
                case 'College of Fisheries':
                    var collegeName = 'COF';
                    break;
                case 'College of Natural Science and Mathematics':
                    var collegeName = 'CNSM';
                    break;
                case 'School of Graduate Studies':
                    var collegeName = 'SGS';
                    break;
                case 'College of Education':
                    var collegeName = 'CoEd';
                    break;
                default:
                    var collegeName = 'Ba&A';
                    break;
            }
            
            const facultyPhoto = facultyInfo.photo;
            const noPhoto = facultyInfo.no_photo;

            const departmentNewName = facultyInfo.department || 'No data';
            const education = facultyInfo.education || 'No data';
            const NewSpecializations = facultyInfo.specialization || 'No Data';
            const id = facultyInfo.id;
            const rank = facultyInfo.rank || 'Unkown Rank';
            modalBody.innerHTML = `
                <div class="position-relative mb-3">
                    <div class="row">
                        <div class="col col-5 col-md-7"></div>
                        <div class="col col-6 col-md-4">
                            <i class="fa fa-user"></i>
                            <a href="/profile/${id}" style="text-decoration: none;">
                                <span class="text-black">View Full Profile</span>
                            </a>
                        </div>
                        <div class="col col-1 col-md-1"><button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col col-8 col-md-6 custom-column">
                            <div class="container-fluid mb-2">
                                <img src="${facultyPhoto}" class="modal_photo rounded" alt=" No Photo">                 
                            </div>
                        </div>
                        <div class="col custom-column">
                            <div class="container-custom">
                                <h3 class="maroontext"><strong>${facultyName}</strong></h3>
                                <h5 class="mt-0"><span class="modaltext-two"><strong>${rank}</strong></span><span class="modaltext-two">, ${collegeName}</span><span class="fw-lighter modaltext-two">, ${departmentNewName}</span></h5>
                                <hr>

                                <!-- change data when cleansing done (data separate with ;) -->

                                <h5 class="modaltext-two mt-0"><strong>Highest Educational Attainment:</strong> ${education}<span class="modalspan"></span></h5>
                                <h5 class="modaltext-two mt-0"><strong>Specializations:</strong><span class="modalspan"> ${NewSpecializations}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    });
});

//search result modal
document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const facultyInfo = JSON.parse(button.closest('.col').dataset.facultyInfo);
            const modalBody = modal.querySelector('.modal-body');
            const facultyName = facultyInfo.name || 'No data';
            const facultyPhoto = facultyInfo.photo;
            const college = facultyInfo.college || 'No data';
            const rank = facultyInfo.rank || 'Unkown Rank';
            switch (college) {
                case 'College of Agriculture':
                    var collegeName = 'COA';
                    break;
                case 'College of Engineering':
                    var collegeName = 'COE';
                    break;
                case 'College of Social Sciences and Humanities':
                    var collegeName = 'CSSH';
                    break;
                case 'College of Medicine':
                    var collegeName = 'COM';
                    break;
                case 'College of Business Administration and Accountacy':
                    var collegeName = 'Ba&A';
                    break;
                case 'College of Fisheries':
                    var collegeName = 'COF';
                    break;
                case 'College of Natural Science and Mathematics':
                    var collegeName = 'CNSM';
                    break;
                case 'School of Graduate Studies':
                    var collegeName = 'SGS';
                    break;
                case 'College of Education':
                    var collegeName = 'CoEd';
                    break;
                default:
                    var collegeName = 'Ba&A';
                    break;
            }
            
            const departmentNewName = facultyInfo.department || 'No data';
            const education = facultyInfo.education || 'No data';
            const NewSpecializations = facultyInfo.specialization || 'No Data';
            const id = facultyInfo.id;

            modalBody.innerHTML = `
                <div class="position-relative mb-3">
                    <div class="row">
                        <div class="col col-5 col-md-7"></div>
                        <div class="col col-6 col-md-4">
                            <i class="fa fa-user"></i>
                            <a href="/profile/${id}" style="text-decoration: none;">
                                <span class="text-black">View Full Profile</span>
                            </a>
                        </div>
                        <div class="col col-1 col-md-1"><button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col col-8 col-md-6 custom-column">
                            <div class="container-fluid mb-2">
                                <img src="${facultyPhoto}" class="modal_photo rounded" alt="No Photo">
                            </div>
                        </div>
                        <div class="col custom-column">
                            <div class="container-custom">
                                <h3 class="maroontext"><strong>${facultyName}</strong></h3>
                                <h5 class="mt-0"><span class="modaltext-two"><strong>${rank}</strong></span><span class="modaltext-two">,${collegeName}</span><span class="fw-lighter modaltext-two">, ${departmentNewName}</span></h5>
                                <hr>
                                <h5 class="modaltext-two mt-0"><strong>Highest Educational Attainment:</strong> ${education}<span class="modalspan"></span></h5>
                                <h5 class="modaltext-two mt-0"><strong>Specializations:</strong><span class="modalspan"> ${NewSpecializations}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    });
});
