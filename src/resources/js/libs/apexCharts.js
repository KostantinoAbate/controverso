import ApexCharts from 'apexcharts';
import 'flyonui/dist/helper-apexcharts.js';

export function useChart(selector,options) {
    let $div = $(slector);
    if ($div.length) {
        let chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
    }
}
