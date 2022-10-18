const array =[calc_2()]


function calc_1(result_1) {
    for (let h = 0; h < 1608; h++) {
   result_1 = console.log('.progress-circle[data-value="' + h + '"]');
    }
  }
  
  
  function calc_2(result_2) {
    for (let i = 0; i <= 361; i = i + 0.2245024875621891) {
      result_2 = console.log(".progress-barre {transform: rotate(" + i + "deg)}");
    }
  }
  
  console.log(array)


