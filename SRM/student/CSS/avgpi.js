function im3(nb){
var xValues = ['Average score','total score'];
var yValues = [Math.round(nb),100-Math.round(nb)];
var barColors = [
  'darkcyan',
  'rgb(0,62,70)'
];

new Chart('myChart3', {
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
