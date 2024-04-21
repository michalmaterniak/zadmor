<?php

namespace TestApp\MichalM\Repository;

trait MovieSuites
{
    public static function getResults(): array
    {
        return [
            [1, 14],
            [2, 10],
            [3, 5]
        ];
    }

    public static function getResultsCount(): array
    {
        $array = self::getResults();
        $return = [];

        foreach ($array as $item) {
            $return[] = [$item[0], $item[1] + 1]; // o jeden wiecej to error
        }

        return $return;
    }

    public static function getFirsLetterEvenCountLetters(): array
    {
        return [
            [1, 4, ['Wielki Mur', 'Wonder Woman', 'Wilk z wall street', 'Więzień labiryntu: Próby ognia']],
            [2, 2, ['Wesele', "Westerplatte"]],
            [3, 1, ['Westerplatte']],
        ];
    }

    public static function getMoreThanOneWords(): array
    {
        return [
            [
                1,
                12,
                [
                    'Pulp Fiction', 'Skazani na Shawshank', 'Więzień labiryntu', 'Dwunastu gniewnych ludzi',
                    'Ojciec chrzestny', 'Wielki Mur', 'Wonder Woman', 'Wielki Gatsby', 'W samym sercu morza',
                    'Wilk z wall street', 'Więzień labiryntu 3', 'Więzień labiryntu: Próby ognia'

                ]
            ],
            [2, 5, ['Skazany na bluesa', 'Gran Torino', 'Mroczna wieża' , 'Casino Royale', 'Wielki Gatsby']],
            [3, 3, ['Avengers: Wojna bez granic', 'Blade Runner', 'Wielki Gatsby']],
        ];
    }
}