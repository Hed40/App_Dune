const array =[calc_1(), calc_2(), calc_3()]


function calc_1(result_1) {
    for (let h = 0; h < 1607; h++) {
   result_1 = console.log('.progress-circle[data-value="' + h + '"]');
    }
  }
  
  
  function calc_2(result_2) {
    for (let i = 0; i <= 360; i = i + 0.224019912881145) {
      result_2 = console.log(".progress-barre {transform: rotate(" + i + "deg)}");
    }
  }

  function calc_3(result_3) {
    for (let g = 803; g <= 1607; g++) {
      result_3 = console.log(".progress-circle[data-value^='" + g + "'] .progress-masque,");
    }
  }
  
  console.log(array)



  

