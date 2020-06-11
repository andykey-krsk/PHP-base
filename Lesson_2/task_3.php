<?php
/*3. Реализовать основные 4 арифметические операции
в виде функций с двумя параметрами.
Обязательно использовать оператор return.
В делении проверьте деление на 0 и верните текст ошибки.*/
$a = 3;
$b = 0;

function addition($a,$b){
    return $a + $b;
}

function subtraction($a,$b){
    return $a - $b;
}

function multiplication($a,$b){
    return $a * $b;
}

function division($a,$b){
    if ($b==0){
        return "Нельзя делить на ноль";
    }
    return $a/$b;
}

echo "</br>Сложение {$a} + {$b} = " . addition($a,$b);
echo "</br>Вычитание {$a} - {$b} = " . subtraction($a,$b);
echo "</br>Умножение {$a} * {$b} = " . multiplication($a,$b);
echo "</br>Деление {$a} / {$b} = " . division($a,$b);