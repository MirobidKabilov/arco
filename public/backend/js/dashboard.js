// Create shuffle method for array
Array.prototype.shuffle = function() {
    var j, x, i;

    for (i = this.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = this[i - 1];
        this[i - 1] = this[j];
        this[j] = x;
    }

    return this;
}

var Dashboard = {
    colors: [
        '#3e70c9',
        '#43b968',
        '#20b9ae',
        '#f59345',
        '#f44236',
        '#a567e2',
        '#F18701',
        '#7678ED',
        '#F25F5C',
        '#FFE066',
        '#247BA0',
        '#70C1B3',
        '#FF6978',
        '#FFD972',
        '#FCAF58',
        '#FF8C42',
        '#4E598C',
        '#1098F7',
        '#60AFFF',
        '#427AA1'
    ],

    initPieChart(data) {
        
        new Chart($(data.selector)[0], {
            type: 'pie',

            options: {
                responsive: true
            },

            data: {
                labels: data.labels.split(','),
                datasets: [
                    {
                        backgroundColor: Dashboard.colors.shuffle().slice(0, data.labels.length),
                        data: data.data.split(',').map(Number),
                        label: 'Top Browsers',
                    },
                ]
            }
        });
    },

    initLine: function(data) {

        new Chart($(data.selector)[0], {
            type: 'line',
            data: {
                labels: data.labels.split(','),
                datasets: [{
                    label: "Посетители",
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgb(255, 99, 132)',
                    fill: false,
                    data: data.visitors.split(','),
                    yAxisID: "y-axis-1",
                }, {
                    label: "Просмотры",
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgb(54, 162, 235)',
                    fill: false,
                    data: data.pageViews.split(','),
                    yAxisID: "y-axis-2"
                }]
            },
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title:{
                    display: false,
                },
                scales: {
                    yAxes: [{
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "left",
                        id: "y-axis-1",
                    }, {
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "right",
                        id: "y-axis-2",

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
        });
    },

    init: function(options) {
        this.initPieChart(options.piechart);
        this.initLine(options.line);
    }

};


	// var chart = new Chart($('#chart')[0], {
	//     type: 'line',

	//     options: {
	//         responsive: true
	//     },

	//     data: {
 //        	labels: [],
 //        	datasets: [{
 //            	label: 'Продажа',
 //            	data: [],
 //                fill: true,
 //                borderColor: "#20b9ae",
 //                pointHoverBorderWidth: 2,
 //                backgroundColor: 'rgba(32, 185, 174, 0.6)',
 //                pointBackgroundColor: "#20b9ae",
 //        	}]
 //    	},
	// });

