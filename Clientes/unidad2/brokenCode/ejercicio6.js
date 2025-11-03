function esPar(num) {
    if (num % 2 = 0) {
        return true;
    } else {
        return false;
    }
}
 
console.log(esPar(3));
console.log(esPar(4));

// En la condición del if, el operador de comparación es '==' o '===', no '='.

function esPar(num) {
    if (num % 2 == 0) {
        return true;
    } else {
        return false;
    }
}