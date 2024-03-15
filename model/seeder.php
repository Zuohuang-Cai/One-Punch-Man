<?php

namespace models;

require_once __DIR__ . "/../vendor/autoload.php";

use Exception;
use RedBeanPHP\R;
use function bin\setup;

$heros = [
    [
        'name' => 'Tatsumaki',
        'nickname' => 'Tornado of Terror',
        'background' => 'To survive in this world... all you can do is get stronger.',
        'combatpoint' => 89000,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 800, 'agility' => 867, 'mana' => 689, 'control' => 999, 'armor' => 600],
        'powers' => ['description' => 'control the gravity', 'powername' => 'gravity controller'],
        'backgroundimage' => 'https://wallpapercave.com/wp/wp1809912.jpg',
        'heroimage' => 'https://i.pinimg.com/originals/bd/32/bf/bd32bf9686665d93ea0d5f3fc5a26874.gif'
    ],
    [
        'name' => 'Saitama',
        'nickname' => 'Caped Baldy',
        'background' => 'I am just a guy who is a hero for fun.',
        'combatpoint' => 59322,
        'age' => 25,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 8920, 'agility' => 9910, 'mana' => 7300, 'control' => 8200, 'armor' => 9900],
        'powers' => ['description' => 'the ability to produce shock waves.', 'powername' => 'Shockwave Generation'],
        'backgroundimage' => ' https://pre00.deviantart.net/a7ae/th/pre/i/2016/010/d/c/one_punch_man___saitama_by_gaston_gaston-d9nflsi.png',
        'heroimage' => 'https://j.gifs.com/vbOnEq.gif'
    ],
    [
        'name' => 'Genos',
        'nickname' => 'Demon Cyborg',
        'background' => 'I will eliminate you.',
        'combatpoint' => 59002,
        'age' => 19,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 9000, 'agility' => 8606, 'mana' => 7900, 'control' => 8900, 'armor' => 9999],
        'powers' => ['description' => ' ability to generate and control flame', 'powername' => 'fire manipulation'],
        'backgroundimage' => ' https://external-preview.redd.it/XuFAlUvPV9vBdSzUXoqkKpCjzETJYwo-gbdlXzuyr1I.jpg?auto=webp&s=e20c99fb7eecb0e9d04970d729dd2f068c368c73',
        'heroimage' => 'https://i.gifer.com/JSRh.gif'
    ],
    [
        'name' => 'Bang',
        'nickname' => 'Silver fang',
        'background' => 'You do not need to know who the victor is in a battle using martial arts. That is the beauty of this art.',
        'combatpoint' => 59001,
        'age' => 81,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 400, 'agility' => 269, 'mana' => 570, 'control' => 349, 'armor' => 600],
        'powers' => ['description' => 'BEING ABLE TO PHYSICALLY DO SUPERHUMAN THINGS ', 'powername' => 'Superhuman Physical Prowess'],
        #bang ->
        'backgroundimage' => 'https://i.redd.it/wu9m8p6ntg281.jpg',
        'heroimage' => 'https://qph.cf2.quoracdn.net/main-qimg-b19c6b79c793089131392b125634f20f'
    ], [
        'name' => 'Satoru',
        'nickname' => 'Mumen rider',
        'background' => 'I will not overlook any crime!',
        'combatpoint' => 11221,
        'age' => 25,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 120, 'agility' => 195, 'mana' => 129, 'control' => 231, 'armor' => 96],
        'powers' => ['description' => 'ability that belongs to characters who possess exceptionally high willpower. ', 'powername' => 'Indomitable Will'],
        'backgroundimage' => 'https://i.ytimg.com/vi/eTFCBG1SCjw/maxresdefault.jpg',
        'heroimage' => 'https://vignette1.wikia.nocookie.net/onepunchman/images/3/37/License-lessRiderAnimeAvi.png/revision/latest?cb=20160207195325'
    ], [
        'name' => 'Smile man',
        'nickname' => 'Smile man',
        'background' => 'Nothing.....',
        'combatpoint' => 3312,
        'age' => 26,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 695, 'agility' => 245, 'mana' => 478, 'control' => 850, 'armor' => 471],
        'powers' => ['description' => 'this  hero have no powers', 'powername' => 'giant kandama'],
        'backgroundimage' => 'https://pbs.twimg.com/media/D8VtkYtVUAA1xBq.png',
        'heroimage' => 'https://i1.wp.com/codigoespagueti.com/wp-content/uploads/2019/05/one-punch-man-chapulin-colorado-smile-man-anime-1.jpg?resize=640%2C360&quality=90&ssl=1'
    ], [
        'name' => 'Golden Ball',
        'nickname' => 'Golden Ball',
        'background' => 'Just a sharpshooter..',
        'combatpoint' => 4312,
        'age' => 28,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 239, 'agility' => 722, 'mana' => 936, 'control' => 125, 'armor' => 647],
        'powers' => ['description' => 'being to shoot very precisely', 'powername' => 'sharpshooter'],
        'backgroundimage' => 'https://1.bp.blogspot.com/-G96VNnktXOE/XvsJl3PrmlI/AAAAAAAAAYA/i8z7Axtfxeki-18W3BdGJYX8CPtno3qdACPcBGAYYCw/s640/golden%2BBall.png',
        'heroimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/b/b4/Golden_testicule.png/revision/latest?cb=20180318115252&path-prefix=fr'
    ], [
        'name' => 'unknown',
        'nickname' => 'Stinger',
        'background' => 'Superhuman Physical',
        'combatpoint' => 5312,
        'age' => 24,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 137, 'agility' => 247, 'mana' => 835, 'control' => 248, 'armor' => 358],
        'powers' => ['description' => 'BEING ABLE TO PHYSICALLY DO SUPERHUMAN THINGS ', 'powername' => 'Superhuman Physical Prowes'],
        'backgroundimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/3/33/Deep_Sea_King_defeats_Stinger_Anime.png/revision/latest?cb=20160101190458',
        'heroimage' => 'http://vignette1.wikia.nocookie.net/onepunchman/images/3/3c/StingerAnime2.png/revision/latest?cb=20160730175821'
    ], [
        'name' => 'unknown',
        'nickname' => 'Magic Trick Man',
        'background' => 'Execution of justice, then and there.',
        'combatpoint' => 5212,
        'age' => 22,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 394, 'agility' => 478, 'mana' => 284, 'control' => 331, 'armor' => 289],
        'powers' => ['description' => 'use magic tricks to deceive opponen', 'powername' => 'magic tricks'],
        'backgroundimage' => 'https://m.media-amazon.com/images/M/MV5BMjVkM2U0ZjMtZDU5Zi00YzVmLTlhZDgtM2RhZWNiMDYzY2VlXkEyXkFqcGdeQXVyNzgxMzc3OTc@._V1_.jpg',
        'heroimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/9/9d/Anime_-_Magic_Trick_Man.png/revision/latest?cb=20190415205604&path-prefix=es'
    ], [
        'name' => 'unknown',
        'nickname' => 'Blue Fire ',
        'background' => 'controller of the flame',
        'combatpoint' => 51112,
        'age' => 19,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 385, 'agility' => 405, 'mana' => 294, 'control' => 593, 'armor' => 592],
        'powers' => ['description' => 'can throw bleu flames', 'powername' => 'flame thrower'],
        'backgroundimage' => 'http://pm1.narvii.com/6312/2a481cfa685270e2dbd7f1b72698f614e7b084b9_hq.jpg',
        'heroimage' => 'https://i.pinimg.com/originals/70/95/7e/70957e1537eeeb55b038ffff25dc9077.jpg'
    ], [
        'name' => 'unknown',
        'nickname' => 'shadow ring',
        'background' => 'im always in your shadows',
        'combatpoint' => 12112,
        'age' => 16,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 389, 'agility' => 858, 'mana' => 379, 'control' => 578, 'armor' => 367],
        'powers' => ['description' => 'have ninja skilss', 'powername' => 'Ninja equipment'],
        'backgroundimage' => 'https://i.redd.it/3q49uyksg5o31.png',
        'heroimage' => 'https://i.redd.it/ir24j1gustn31.jpg'
    ], [
        'name' => 'Burasuto',
        'nickname' => 'blast',
        'background' => 'When humanity is in peril and must be saved, he will surely take action.',
        'combatpoint' => 14112,
        'age' => 40,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 999, 'agility' => 999, 'mana' => 999, 'control' => 999, 'armor' => 999],
        'powers' => ['description' => 'control the gravity', 'powername' => 'gravity controller'],
        'backgroundimage' => 'https://wallpapercave.com/wp/wp10621143.jpg',
        'heroimage' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/ca0ee438-3a5b-436a-9b2e-23310bdeb74f/de67yf6-2f8d97b7-7d0c-4a32-9b8e-2b221ba61e13.jpg/v1/fill/w_994,h_804,q_70,strp/the_blast__one_punch_man_fan_art__by_pedrozox2093_de67yf6-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MjM4MSIsInBhdGgiOiJcL2ZcL2NhMGVlNDM4LTNhNWItNDM2YS05YjJlLTIzMzEwYmRlYjc0ZlwvZGU2N3lmNi0yZjhkOTdiNy03ZDBjLTRhMzItOWI4ZS0yYjIyMWJhNjFlMTMuanBnIiwid2lkdGgiOiI8PTI5NDQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.UI_ZsdvjApfm4pTzXRfbUziuBXaIp2tKzql9hZ9JMgE'
    ], [
        'name' => 'Butagami',
        'nickname' => 'pig god',
        'background' => 'I eat because I am hungry.',
        'combatpoint' => 41112,
        'age' => 36,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 898, 'agility' => 100, 'mana' => 200, 'control' => 390, 'armor' => 1000],
        'powers' => ['description' => ' ability to stretch, elongate, flex, and twist', 'powername' => 'Elasticity '],
        'backgroundimage' => 'https://i.pinimg.com/originals/38/de/e4/38dee481c57b1b00e365aca24c513f30.jpg',
        'heroimage' => 'https://1.bp.blogspot.com/-zU8zcALLl2E/XQBr6ObSm_I/AAAAAAAAB0g/lpK_des97eM--wZF2ZsotO2o8TNpqKd7wCLcBGAs/s1600/piggod.png'
    ], [
        'name' => 'ZuohuangCai',
        'nickname' => 'Zuohuang',
        'background' => 'Titanic wonn\'t sink again .',
        'combatpoint' => 411112,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 1000, 'agility' => 1000, 'mana' => 1000, 'control' => 1000, 'armor' => 1000],
        'powers' => ['description' => 'Superhuman Speed and strength ', 'powername' => 'Superhuman Speed and strength'],
        'backgroundimage' => 'https://3.bp.blogspot.com/-3OImojxHIQo/XLDPEOL_-BI/AAAAAAAABfI/bu5bW0QDfFMjSsaeJVeqMNH0aPVBCtuqACKgBGAs/w0/zombieman-one-punch-man-uhdpaper.com-4K-11.jpg',
        'heroimage' => 'https://i.pinimg.com/originals/27/64/d6/2764d6d288891d96150d534837dfcc4d.gif'
    ], [
        'name' => 'Masutā',
        'nickname' => 'Tanktop Master',
        'background' => 'The Tanktop is the source of strength... If I can bring out even more potential of the Tanktop... If I become a man who is worthy of the Tanktop, then I can defeat even psychic power.',
        'combatpoint' => 31112,
        'age' => 47,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 6789, 'agility' => 3756, 'mana' => 9249, 'control' => 2452, 'armor' => 5597],
        'powers' => ['description' => 'BEING ABLE TO PHYSICALLY DO SUPERHUMAN THINGS ', 'powername' => 'Superhuman Physical Prowes'],
        'backgroundimage' => 'https://dafunda.com/wp-content/uploads/2020/09/Tanktop-Master-800x450.jpg',
        'heroimage' => 'https://media1.tenor.com/m/m2k78lCtoWYAAAAC/garou-tanktop-master.gif'
    ], [
        'name' => 'Kudō Kishi',
        'nickname' => 'drive knight',
        'background' => 'In order to improve the probability of victory, everything that can be exploited must be exploited.',
        'combatpoint' => 51112,
        'age' => 24,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 848, 'agility' => 469, 'mana' => 479, 'control' => 796, 'armor' => 724],
        'powers' => ['description' => 'ability to transform parts of one body  ', 'powername' => 'Transformation'],
        'backgroundimage' => 'https://1.bp.blogspot.com/-TahBhcDV5ZI/XQBtRceZexI/AAAAAAAAB0s/jYQzYzQqB4ITIlqE6BvmvnvHXP4JoyfywCLcBGAs/s1600/driveknight.jpg',
        'heroimage' => 'https://vignette3.wikia.nocookie.net/one-punchman/images/e/e4/Drive_Knight_Profil.png/revision/latest?cb=20160130223448&path-prefix=de'
    ], [
        'name' => 'Senkō no Furasshu',
        'nickname' => 'Flashy Flash',
        'background' => 'Your head is mine!	',
        'combatpoint' => 81112,
        'age' => 25,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 986, 'agility' => 860, 'mana' => 809, 'control' => 997, 'armor' => 678],
        'powers' => ['description' => 'Superhuman Speed and Agility ', 'powername' => 'Superhuman Speed and Agility'],
        'backgroundimage' => 'https://laverdadnoticias.com/img/2020/11/01/flashy_flash_one_punch_man.jpg',
        'heroimage' => 'https://64.media.tumblr.com/c0aab663b795537207cb9dc4fed33bf2/tumblr_prvdinMRDy1v6bs4yo7_r1_400.gif'
    ], [
        'name' => 'Ikemen Kamen Amai Masuku',
        'nickname' => 'sweet mask',
        'background' => 'In order to ease the worries and fears of the people, we heroes have to be tough, strong, and beautiful at all times... always able to defeat evil swiftly and skillfully. That is what being a hero means.',
        'combatpoint' => 41112,
        'age' => 24,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 9900, 'agility' => 5698, 'mana' => 8490, 'control' => 4865, 'armor' => 8799],
        'powers' => ['description' => 'BEING ABLE TO PHYSICALLY DO SUPERHUMAN THINGS ', 'powername' => 'Superhuman Physical Prowes'],
        'backgroundimage' => 'http://vignette3.wikia.nocookie.net/onepunchman/images/1/11/Sweet_Mask_angered.png/revision/latest?cb=20160108181312',
        'heroimage' => 'https://i.pinimg.com/originals/17/a3/66/17a366b5fef93972e4785dafd6141396.png'
    ], [
        'name' => 'iaian',
        'nickname' => 'iaian',
        'background' => '',
        'combatpoint' => 11112,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 12, 'agility' => 12, 'mana' => 12, 'control' => 12, 'armor' => 12],
        'powers' => ['description' => 'Superhuman Speed and strength ', 'powername' => 'Superhuman Speed and strength'],
        'backgroundimage' => 'https://s1.zerochan.net/Iaian.(One.Punch.Man).600.2526889.jpg',
        'heroimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/2/25/Iaian_Anime_Profile.jpg/revision/latest?cb=20200312215502'
    ], [
        'name' => 'jet nice guy',
        'nickname' => 'jet nice guy',
        'background' => 'Become a hero because of interest',
        'combatpoint' => 1112,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 12, 'agility' => 12, 'mana' => 12, 'control' => 12, 'armor' => 12],
        'powers' => ['description' => ' ', 'powername' => 'strength above average human capabilities'],
        'backgroundimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/0/0c/Sneckjoiningforces.png/revision/latest?cb=20160101191035',
        'heroimage' => 'http://www.anime-planet.com/images/characters/jet-nice-guy-50311.jpg?t=1448447389'
    ], [
        'name' => 'Joost',
        'nickname' => 'Joost',
        'background' => '......',
        'combatpoint' => 11112,
        'age' => 16,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 9896, 'agility' => 9670, 'mana' => 4575, 'control' => 10000, 'armor' => 5763],
        'powers' => ['description' => 'Superhuman Speed and strength ', 'powername' => 'Superhuman Speed and strength'],
        'backgroundimage' => 'https://ami.animecharactersdatabase.com/uploads/chars/69246-823562030.jpg',
        'heroimage' => 'https://vignette.wikia.nocookie.net/onepunchman/images/5/56/Death_Gatling_anime.jpg/revision/latest?cb=20190619185947&path-prefix=it'
    ], [
        'name' => 'dilmohit',
        'nickname' => 'dilmohit',
        'background' => 'Become a hero because of interest',
        'combatpoint' => 60000,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 12, 'agility' => 12, 'mana' => 12, 'control' => 12, 'armor' => 12],
        'powers' => ['description' => 'Superhuman Speed and Agility ', 'powername' => 'Superhuman Speed and Agility'],
        'backgroundimage' => 'https://wallpapers.com/images/hd/4k-hulk-back-view-gkc5bbhp6j3c7uph.jpg',
        'heroimage' => 'https://cdn.ebaumsworld.com/mediaFiles/picture/2213344/85111221.jpg'
    ], [
        'name' => 'marchantelo',
        'nickname' => 'marchantelo',
        'background' => 'Become a hero because of interest',
        'combatpoint' => 99999999,
        'age' => 17,
        'email' => '123@gmail.com',
        'history' => ['description' => 'nothing'],
        'physical' => ['power' => 12, 'agility' => 12, 'mana' => 12, 'control' => 12, 'armor' => 12],
        'powers' => ['description' => 'Superhuman Speed and Agility ', 'powername' => 'Superhuman Speed and Agility'],
        'backgroundimage' => 'https://vignette2.wikia.nocookie.net/onepunchman/images/0/00/Blacklusteranime.png/revision/latest?cb=20151210190831',
        'heroimage' => 'https://preview.redd.it/ukcj0gfu2fa81.jpg?width=621&format=pjpg&auto=webp&s=249bdb4906dcbe788d6099308fc50a7f6fbbbdbb'
    ]
];
try {
    setup();
    R::nuke();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
if (count(R::findAll('heros')) > 0) {
    R::wipe('heros');
}

foreach ($heros as $heroData) {
    $hero = R::dispense('heros');
    $physical = R::dispense('physical');
    $history = R::dispense('history');
    $power = R::dispense('powers');
    $physical->power = $heroData['physical']['power'];
    $physical->agility = $heroData['physical']['agility'];
    $physical->mana = $heroData['physical']['mana'];
    $physical->control = $heroData['physical']['control'];
    $physical->armor = $heroData['physical']['armor'];
    $physical->cambatpoint = $heroData['combatpoint'];
    $history->description = $heroData['history']['description'];
    $power->powername = $heroData['powers']['powername'];
    $power->description = $heroData['powers']['description'];
    $hero->image = $heroData['heroimage'];;
    $hero->ownRelationList[] = $history;
    $hero->ownRelationList[] = $power;
    $hero->physical = $physical;
    $hero->name = $heroData['name'];
    $hero->nickname = $heroData['nickname'];
    $hero->backgroundimage = $heroData['backgroundimage'];
    $hero->background = $heroData['background'];
    $hero->age = $heroData['age'];
    $hero->email = $heroData['email'];
    $hero->elo = -10000;
    R::store($hero);
    $hero->elo = 0;
    R::store($hero);
}

$admin = R::dispense('admins');
$admin->username = "admin";
$admin->password = "admin";
R::store($admin);
R::close();