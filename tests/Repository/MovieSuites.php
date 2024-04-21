<?php

namespace TestApp\MichalM\Repository;

trait MovieSuites
{
    public static function getResults(): array
    {
        return [
            [0, 78],
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
            [0, 3, ["Whiplash", "Wyspa tajemnic", "Władca Pierścieni: Drużyna Pierścienia"]],
            [1, 4, ['Wielki Mur', 'Wonder Woman', 'Wilk z wall street', 'Więzień labiryntu: Próby ognia']],
            [2, 2, ['Wesele', "Westerplatte"]],
            [3, 1, ['Westerplatte']],
        ];
    }

    public static function getMoreThanOneWords(): array
    {
        return [
            [
                0,
                53,
                [
                    "Pulp Fiction", "Skazani na Shawshank", "Dwunastu gniewnych ludzi", "Ojciec chrzestny", "Leon zawodowiec",
                    "Władca Pierścieni: Powrót króla", "Fight Club", "Forrest Gump", "Chłopaki nie płaczą",
                    "Człowiek z blizną", "Doktor Strange", "Szeregowiec Ryan", "Lot nad kukułczym gniazdem",
                    "Wielki Gatsby", "Avengers: Wojna bez granic", "Życie jest piękne", "Pożegnanie z Afryką",
                    "Milczenie owiec", "Dzień świra", "Blade Runner", "Król Lew",
                    "La La Land", "Wyspa tajemnic", "American Beauty", "Szósty zmysł",
                    "Gwiezdne wojny: Nowa nadzieja", "Mroczny Rycerz", "Władca Pierścieni: Drużyna Pierścienia", "Harry Potter i Kamień Filozoficzny",
                    "Green Mile", "Mad Max: Na drodze gniewu", "Terminator 2: Dzień sądu", "Piraci z Karaibów: Klątwa Czarnej Perły",
                    "Truman Show", "Piękny umysł", "Władca Pierścieni: Dwie wieże", "Zielona mila",
                    "Requiem dla snu", "Forest Gump", "Requiem dla snu", "Milczenie owiec",
                    "Breaking Bad", "Nagi instynkt", "Igrzyska śmierci", "Siedem dusz",
                    "Dzień świra", "Pan życia i śmierci", "Hobbit: Niezwykła podróż", "Pachnidło: Historia mordercy",
                    "Wielki Gatsby", "Sin City", "Przeminęło z wiatrem", "Królowa śniegu",
                ]
            ],
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