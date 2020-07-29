(function(){
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Purpose', 'Social', 'Physical', 'Financial', 'Community'],
            datasets: [{
                data: [purposeScore, socialScore, physicalScore, financialScore, communityScore],
                backgroundColor: [
                    'rgba(40, 50, 119, 0.8)',
                    'rgba(115, 57, 131, 0.8)',
                    'rgba(12, 93, 52, 0.8)',
                    'rgba(223, 83, 47, 0.8)',
                    'rgba(164, 35, 40, 0.8)'
                ],
                borderColor: [
                    'rgba(40, 50, 119, 1)',
                    'rgba(115, 57, 131, 1)',
                    'rgba(12, 93, 52, 1)',
                    'rgba(223, 83, 47, 1)',
                    'rgba(164, 35, 40, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                fontSize: 20,
                text: "Five Star Wellbeing Quality Of Life Assessment"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 25
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Wellbeing Score"
                    }
                }]
            }
        }
    });
})()