function im2(nb){
var xValues = ['Highest score','total score'];
var yValues = [Math.round(nb),(100-Math.round(nb))];
var barColors = [
  'greenyellow',
  '#3c3a05'
];
new Chart('myChart2', {
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
