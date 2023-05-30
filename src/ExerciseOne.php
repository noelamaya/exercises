<?php

declare(strict_types=1);

namespace Exercises;

final class ExerciseOne
{
    /**
     * Devolver un array con los identificadores numéricos ordenados por orden,
     * para el patrón @[Franklin](user-gpe-{{id}}), donde {{id}} será el identificador.
     *
     * @return int[]
     */
    public function fnA(string $text): array
    {
        $regex = '/@\[\S+]\(user-gpe-(\d+)\)/';
        preg_match_all($regex, $text, $matches);

        return array_map(fn ($match) => (int) $match, $matches[1]);
    }

    /**
     * Devolver el texto reemplazando el patrón @[NameUser](user-gpe-identificador) por @NameUser.
     */
    public function fnB(string $text): ?string
    {
        $regex = '/@\[(\S+)]\(user-gpe-\d+\)/';

        return preg_replace($regex, '@$1', $text);
    }
}
