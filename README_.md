projekt jest podzielony na dwie częsci

czesc abstrakcyjną (jako zewnętrzna biblioteka, ładowana do vendora) po uruchomieniu composer update,
z powodu problemów z limitami githuba, skopiowana jest do folderu  /lib/zadmor
composer_.json pobiera biblioteke ze zdalnego repozytorium

czesc aplikacyjna znajduje się w folderze /app

plik /index.php jest przykładowym użyciem MovieRepository, ktory zawiera wymagane funkcje

w foldrze /data znajde sie wymagana konfiguracja oraz przykładowe dane

Repositorum wymaga odpowiedniego Adaptera (driver) (w zależności jakie jest źródło danych)

````
$config = ['source' => __DIR__ . '/source.txt']; // wymagane ścieżka (bezwzględna) do źródła danych, reszta opcjonalna
$driver = new ArrayFileAdapterDriver($config);
$repository = new MovieRepository($driver);

// można użyć fabryki do uruchomienia odpowiedniego drivera
$config = ['driver' => ['type' => 'array_file, source' => '../source.txt']; // domyślby typ ArrayFileAdapterDriver
$driverFactory = new DriverFactory($config);
$repository = new MovieRepository($driverFactory->getAdapterDriver());

$repository->findWordsMoreOne();
$repository->findFirstWEventCountLetterCount();
$repository->find3Random();
````