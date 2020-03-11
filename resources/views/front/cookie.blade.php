@extends('layouts.app')
@section('meta')

@endsection

@section('content')
    <div class="bg-cookie"></div>
    <div class="container">
        @if(Session::get('locale') == 'pl')
            <p>1. Serwis zbiera w sposób automatyczny tylko informacje zawarte w plikach cookies.</p>
            <p>Pliki (cookies) są plikami tekstowymi, które przechowywane są w urządzeniu końcowym użytkownika serwisu.
                Przeznaczone są do korzystania ze stron serwisu. Przede wszystkim zawierają nazwę strony internetowej
                swojego
                pochodzenia, swój unikalny numer, czas przechowywania na urządzeniu końcowym.</p>
            <p>3. Operator serwisu {{ config('app.name') }} jest podmiotem zamieszczającym na urządzeniu końcowym
                swojego
                użytkownika pliki cookies oraz mającym do nich dostęp.</p>
            <p>Operator serwisu wykorzystuje pliki (cookies) w celu:</p>
            <ul>
                <li>możliwość logowania w serwisie</li>
                <li>utrzymania logowania użytkownika na każdej kolejnej stronie serwisu.</li>
                <li>przechowywania produktów w koszyku kiedy użytkownik nie jest zalogowany</li>
            </ul>
            <p>5. Serwis stosuje dwa zasadnicze rodzaje plików (cookies) - sesyjne i stałe. Pliki sesyjne są tymczasowe,
                przechowuje się je do momentu opuszczenia strony serwisu (poprzez wejście na inną stronę, wylogowanie
                lub
                wyłączenie przeglądarki). Pliki stałe przechowywane są w urządzeniu końcowym użytkownika do czasu ich
                usunięcia
                przez użytkownika lub przez czas wynikający z ich ustawień.</p>
            <p>6. Użytkownik może w każdej chwili dokonać zmiany ustawień swojej przeglądarki, aby zablokować obsługę
                plików
                (cookies) lub każdorazowo uzyskiwać informacje o ich umieszczeniu w swoim urządzeniu. Inne dostępne
                opcje można
                sprawdzić w ustawieniach swojej przeglądarki internetowej. Należy pamiętać, że większość przeglądarek
                domyślnie
                jest ustawione na akceptację zapisu plików (cookies)w urządzeniu końcowym.</p>
            <p> 7. Operator Serwisu informuje, że zmiany ustawień w przeglądarce internetowej użytkownika mogą
                ograniczyć dostęp
                do niektórych funkcji strony internetowej serwisu.</p>
            <p>8. Pliki (cookies) z których korzysta serwis (zamieszczane w urządzeniu końcowym użytkownika) mogą być
                udostępnione jego partnerom oraz współpracującym z nim reklamodawcą.</p>
            <p>9. Informacje dotyczące ustawień przeglądarek internetowych dostępne są w jej menu (pomoc) lub na stronie
                jej
                producenta.</p>
        @elseif(Session::get('locale') == 'en')
            <p> 1. The website automatically collects only information contained in cookie files. </p>
            <p> Files (cookies) are text files that are available in the website's final user interface.
                They are intended for use on the website. First of all, they include your used website
                create your unique number, collection time based on the final call. </p>
            <p> 3. The {{ config('app.name') }} website operator is the publisher at the end of their site
                user cookies and having access to them. </p>
            <p> The website operator uses files (cookies) to: </p>
            <Ul>
                <li> option to login to the site</li>
                <li> maintaining user login on each subsequent page of the website.</li>
                <li> collection of products in the basket when the user is not logged in</li>
            </ul>
            <p> 5. Service for handling two basic types of files (cookies) - session and permanent. Session files are
                temporary,
                stored until leaving the website (by accessing another website, logging out or
                includes settings). Permanent files are available in the final user profile until they are deleted
                by the user or for the time resulting from their settings. </p>
            <p> 6. The user can change browser configuration settings at any time to block file support
                (cookies) or always obtain information about their placement in your relationship. Other options
                available can be
                check in the settings of your web browser. Note that most browsers by default
                is set to accept the saving of files (cookies) in the final. </p>
            <p> 7. Data Service Operator, changes to the settings on the user's website may be available
                to the main function of the website. </p>
            <p> 8. Files (cookies) used by the website (placed in the user's final account) can be
                shared with his partners and the advertiser working with him. </p>
            <p> 9. Information on browsing websites is available in her menu (help) or on her website
                producer's. </p>
        @else
            <p> 1. Сайт автоматически собирает только информацию, содержащуюся в файлах cookie. </p>
            <p> Файлы (куки) - это текстовые файлы, которые доступны в окончательном пользовательском интерфейсе
                веб-сайта.
                Они предназначены для использования на сайте. Прежде всего, они включают ваш используемый сайт
                создать свой уникальный номер, время сбора на основе последнего звонка. </p>
            <p> 3. Оператор веб-сайта {{config ('app.name')}} является издателем в конце своего сайта.
                пользовательские куки и имеющие к ним доступ. </p>
            <p> Оператор веб-сайта использует файлы (файлы cookie) для: </p>
            <Ul>
                <li> возможность входа на сайт</li>
                <li> сохранение логина пользователя на каждой последующей странице сайта.</li>
                <li> коллекция товаров в корзине, когда пользователь не авторизован</li>
            </ul>
            <p> 5. Сервис для работы с двумя основными типами файлов (куки) - сессионный и постоянный. Файлы сессий
                являются временными,
                сохраняется до выхода с сайта (путем доступа к другому сайту, выхода из системы или
                включает в себя настройки). Постоянные файлы доступны в конечном профиле пользователя, пока они не будут
                удалены
                пользователем или на время, полученное в результате их настроек. </p>
            <p> 6. Пользователь может в любое время изменить настройки конфигурации браузера, чтобы заблокировать
                поддержку файлов
                (куки) или всегда получать информацию об их размещении в ваших отношениях. Другие доступные варианты
                могут быть
                проверьте в настройках вашего веб-браузера. Обратите внимание, что большинство браузеров по умолчанию
                настроен на сохранение файлов (куки) в финале. </p>
            <p> 7. Оператор службы данных, изменения в настройках на сайте пользователя могут быть доступны
                к основной функции сайта. </p>
            <p> 8. Файлы (файлы cookie), используемые веб-сайтом (размещенные в итоговой учетной записи пользователя),
                могут быть
                поделился со своими партнерами и рекламодателем, работающим с ним.</p>
            <p> 9. Информация о просмотре веб-сайтов доступна в ее меню (справка) или на ее веб-сайте.
                производитель. </p>
        @endif
    </div>
@endsection
