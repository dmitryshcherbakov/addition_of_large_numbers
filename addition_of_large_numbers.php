<?php

#Сложение в столбик очень больших чисел )
function addition_of_large_numbers()
{
    $one = array_reverse(str_split(34937295729345729347593457329521919991485734754548));
    $two = array_reverse(str_split(3248523459237457293547928848484845777277171771));

    /**
     * Сравниваем массивы определяя какое число будет первым слагаемым
     */
    if (count($one) > count($two)) {
        $calc_one = $one;
        $calc_two = $two;
    }
    elseif(count($one) < count($two)){
        $calc_one = $two;
        $calc_two = $one;
    }else
    {
        $calc_one = $two;
        $calc_two = $one;
    }

    /**
     * Инициализируем переменные
     */
    $plus = 0;
    $rezult = [];

    $first = 0;
    $next = 0;

    /**
     * Крутим значения в цикле
     */
    foreach ($calc_one as $key => $val)
    {

        /**
         * Проверяем возможность дальнейшего движения по меньшему числу
         */
        if (isset($calc_two[$key]))
        {
            $plus = $calc_two[$key] + $val + $next;

            /**
             * Выделяем целую и дробную части после сложения
             */
            if ($plus > 9) {
                $next = (int)floor($plus/10);
                $first = (int)substr($plus/10, strpos($plus/10, '.') + 1);
            }else {
                $first = $plus;
                $next = 0;
            }

            $rezult[] = $first;


            if (!isset($calc_one[$key+1]) && $next > 0)
            {
                $rezult[] = $next;
            }

            continue;
        }else
        {
            $rezult[] = $val+$next;
        }

        $first = 0;
        $next = 0;
    }
    echo implode(array_reverse($rezult));
}
