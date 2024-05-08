function im4(nb){
var xValues = ['Current year score','total score'];
var yValues = [Math.round(nb),100-Math.round(nb)];
var barColors = [
  'rgb(187,134,252)',
  'rgb(51,63,80)'
];

new Chart('myChart4', {
  type: 'pie',
  data: {
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true
    }
  }
});}
