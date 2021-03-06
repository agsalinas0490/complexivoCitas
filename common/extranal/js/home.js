"use strict";
if (superadmin_login == 'no') {
    google.charts.load("current", {packages: ["corechart"]});

    function drawChartupdate() {
        "use strict";
        var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        var d = new Date();

        var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();


        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Income', payment_this],
            ['Expense', expense_this],
        ]);

        var options = {
            title: selectedMonthName,
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChartupdate);
    google.charts.load("current", {packages: ["corechart"]});
    
    function drawChart() {
        "use strict";
        var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        var d = new Date();
        var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Num of Appointment'],
            ['Treated', appointment_treated],
            ['cancelled', appointment_cancelled],
        ]);

        var options = {
            title: selectedMonthName + 'Appointment',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }


google.charts.setOnLoadCallback(drawChart);


    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        "use strict";
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Income', 'Expense'],
            ['Jan', this_year['january'], this_year_expenses['january']],
            ['Feb', this_year['february'], this_year_expenses['february']],
            ['Mar', this_year['march'], this_year_expenses['march']],
            ['Apr', this_year['april'], this_year_expenses['april']],
            ['May', this_year['may'], this_year_expenses['may']],
            ['June', this_year['june'], this_year_expenses['june']],
            ['July', this_year['july'], this_year_expenses['july']],
            ['Aug', this_year['august'], this_year_expenses['august']],
            ['Sep', this_year['september'], this_year_expenses['september']],
            ['Oct', this_year['october'], this_year_expenses['october']],
            ['Nov', this_year['november'], this_year_expenses['november']],
            ['Dec', this_year['december'], this_year_expenses['december']]
        ]);

        var options = {
            title: new Date().getFullYear() + " " + per_month_income_expense,
            vAxis: {title: currency},
            hAxis: {title: months_lang},
            seriesType: 'bars',
            series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
} else {
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Income'],
            ['Jan', this_year['january']],
            ['Feb', this_year['february']],
            ['Mar', this_year['march']],
            ['Apr', this_year['april']],
            ['May', this_year['may']],
            ['June', this_year['june']],
            ['July', this_year['july']],
            ['Aug', this_year['august']],
            ['Sep', this_year['september']],
            ['Oct', this_year['october']],
            ['Nov', this_year['november']],
            ['Dec', this_year['december']]
        ]);

        var options = {
            title: new Date().getFullYear() + " " + per_month_income_expense,
            vAxis: {title: currency},
            hAxis: {title: months_lang},
            seriesType: 'bars',
            series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_superadmin'));
        chart.draw(data, options);
    }

    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        var d = new Date();
        var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();


        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Monthly Subscription', superadmin_month_payment],
            ['Yearly Subscription', superadmin_year_payment],
        ]);

        var options = {
            title: selectedMonthName,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_superadmin'));
        chart.draw(data, options);
    }

}
