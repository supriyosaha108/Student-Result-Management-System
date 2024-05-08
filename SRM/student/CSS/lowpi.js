function im1(nb){
var xValues = ['Lowest Score','total score'];
var yValues = [Math.round(nb),100-Math.round(nb)];
var barColors = [
  'lightcoral',
  'rgb(63,7,1)'
];
new Chart('myChart1', {
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
