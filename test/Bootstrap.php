<?php
namespace {

    if (!@include_once __DIR__ . '/../vendor/autoload.php') {
        exit("You must set up the project dependencies, run the following commands:\n> wget http://getcomposer.org/composer.phar\n> php composer.phar install\n");
    }

    define('FIXTURES_DIR', __DIR__.'/fixtures');

    if (function_exists('getFixture') === false) {
        function getFixture($game, $url)
        {
            $filename = FIXTURES_DIR.'/'.urlToFilename($game, $url);

            if (file_exists($filename) === false) {
                return null;
            }

            return json_decode(file_get_contents('compress.zlib://'.$filename), true);
        }
    }

    if (function_exists('urlToFilename') === false) {
        function urlToFilename($game, $url)
        {
            return $game.'/'.mb_strtolower(rtrim(preg_replace('{[^a-z0-9.]}i', '-', $url), '-')).'.json.gz';
        }
    }

}

namespace Pwnraid\Bnet\Warcraft\Auctions {

    function file_get_contents()
    {
        return '{
            "realm":{"name":"Auchindoun","slug":"auchindoun"},
            "alliance":{"auctions":[
                {"auc":955294802,"item":76092,"owner":"Cinuseek","ownerRealm":"Auchindoun","bid":150000,"buyout":250000,"quantity":10,"timeLeft":"VERY_LONG","rand":0,"seed":98291456},
                {"auc":956482427,"item":76130,"owner":"Flealock","ownerRealm":"Auchindoun","bid":50665,"buyout":53332,"quantity":1,"timeLeft":"VERY_LONG","rand":0,"seed":1112125696},
                {"auc":955410554,"item":52177,"owner":"Eladrian","ownerRealm":"Auchindoun","bid":98799,"buyout":123499,"quantity":1,"timeLeft":"MEDIUM","rand":0,"seed":1132552704}
            ]},
            "horde":{"auctions":[
                {"auc":956415210,"item":82800,"owner":"Hilgraev","ownerRealm":"Jaedenar","bid":800100,"buyout":999999,"quantity":1,"timeLeft":"VERY_LONG","rand":0,"seed":1397520640,"petSpeciesId":1149,"petBreedId":8,"petLevel":1,"petQualityId":3},
                {"auc":956262052,"item":11082,"owner":"Slithus","ownerRealm":"Jaedenar","bid":222745,"buyout":223495,"quantity":5,"timeLeft":"VERY_LONG","rand":0,"seed":4101131732},
                {"auc":954888061,"item":90407,"owner":"Moldrok","ownerRealm":"Jaedenar","bid":9500,"buyout":10000,"quantity":1,"timeLeft":"VERY_LONG","rand":0,"seed":1498363648}
            ]},
            "neutral":{"auctions":[
                {"auc":956037492,"item":76142,"owner":"Valkirium","ownerRealm":"Auchindoun","bid":50000000,"buyout":50000000,"quantity":1,"timeLeft":"LONG","rand":0,"seed":2277680896},
                {"auc":955489121,"item":2310,"owner":"Khyber","ownerRealm":"Jaedenar","bid":20391,"buyout":60000,"quantity":1,"timeLeft":"VERY_LONG","rand":0,"seed":7138176},
                {"auc":955485975,"item":2589,"owner":"Khyber","ownerRealm":"Jaedenar","bid":100390,"buyout":200000,"quantity":20,"timeLeft":"VERY_LONG","rand":0,"seed":1832977792}
            ]}
        }';
    }

}
