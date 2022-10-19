const array =[calc_1(), calc_2()]


function calc_1(result_1) {
    for (let h = 0; h < 10; h++) {
   result_1 = console.log('.progress-circle[data-value="' + h + '"]');
    }
  }
  
  
  function calc_2(result_2) {
    for (let i = 0; i <= 360; i = i + 36) {
      result_2 = console.log(".progress-barre {transform: rotate(" + i + "deg)}");
    }
  }
  
  console.log(array)


