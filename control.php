<?php
require_once 'init.php';
// Skrypt kontrolera głównego jako jedyny "punkt wejścia" inicjuje aplikację.

// Inicjacja ładuje konfigurację, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalające odwołać się z każdego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Ponadto ładuje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy już tylko podjąć decyzję co zrobić na podstawie $action.

// Dodatkowo zmieniono organizację kontrolerów i widoków. Teraz wszystkie są w odpowiednio nazwanych folderach w app

getRouter()->setDefaultRoute('homeShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)
getRouter()->addRoute('calcShow',    'CalcControlKredyt',  ['user','admin']);
getRouter()->addRoute('homeShow',    'HomeControl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcControlKredyt',  ['user','admin']);
getRouter()->addRoute('login',       'LoginControl');
getRouter()->addRoute('logout',      'LoginControl', ['user','admin']);
getRouter()->go(); //wybiera i urucham