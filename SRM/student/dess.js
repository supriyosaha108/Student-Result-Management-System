
function ProgressEvent(nb,b){
  var xValues = ['Lowest Score','total score'];
  var yValues = [Math.round(nb),100-Math.round(nb)];
  var barColors1 = [
    'cyan',
    'rgb(63,7,1)'
  ];
   var barColors2 = [
       '#51ff0d',
       'rgb(63,7,1)'
     ];
    var barColors3 = [
       '#ffe203',
      'rgb(63,7,1)'
    ];
    var barColors4 = [
      '#ff007f',
      'rgb(63,7,1)'
    ];
     var barColors5= [
       'lightyellow',
      'rgb(63,7,1)'
    ];
    var barColors6 = [
      'orange',
      'rgb(63,7,1)'
     ];
    var barColors7 = [
       'olive',
       'rgb(63,7,1)'
     ];
    var barColors8 = [
      'lightpink',
      'rgb(63,7,1)'
    ];
    var barColors9 = [
      '#04d9ff',
       'rgb(63,7,1)'
     ];
    var barColors10 = [
      'red',
       'rgb(63,7,1)'
     ];
    var barColors11 = [
      '#be2ed6',
      'rgb(63,7,1)'
     ];
    var barColors12 = [
       'green',
      'rgb(63,7,1)'
     ];

if(b=='1'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors1,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='2'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors2,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='3'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors3,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='4'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors4,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='5'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors5,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='6'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors6,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='7'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors7,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='8'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors8,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='9'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors9,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='10'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors10,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='11'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors11,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}

if(b=='12'){
  new Chart(b, {
    type: 'pie',
    data: {
      datasets: [{
        backgroundColor: barColors12,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true
      }
    }
  });
}


}
