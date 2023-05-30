<?php

declare(strict_types=1);

namespace Exercises;

final class ExerciseTwo
{
    /**
     * Implementar una función PHP que ordene un array de arrays. La función recibirá dos parámetros,
     * el primero con el array a ordenar, y el segundo parámetro será otro array con el criterio de ordenación,
     * donde la key de cada elemento de este segundo array indicará sobre que propiedad hay que ordenar,
     * y el valor de cada elemento indicará la dirección de ordenamiento (ascendente(ASC) o descendente (DESC)).
     *
     * @param array<array<string, mixed>> $arraysToSort
     * @param array<string, string> $sortCriterion
     * @return array<array<string, mixed>>
     */
    public function orderArrays(array $arraysToSort, array $sortCriterion): array
    {
        $key_values = [];
        foreach ($sortCriterion as $key => $criterion) {
            $key_values[] = array_column($arraysToSort, $key);
            $key_values[] = $criterion === 'DESC' ? SORT_DESC : SORT_ASC;
        }
        $key_values[] = &$arraysToSort;
        call_user_func_array('array_multisort', $key_values);

        return $arraysToSort;
    }
}
