# One punch man

## Hero Registration System

- Personal Information: To connect the hero with their deeds and accolades.
- Hero Background: To understand the journey that has shaped their resolve.
- Powers and Abilities: To gauge the potential within and the promise they hold.
- Experience and Achievements: To honor past valor and inspire future glory.
- Physical and Psychological Assessment: To ensure readiness for the trials ahead.

## Admin rights (frontent)

- create or update hero
- delete hero
- check all information about hero.
- simulation fights

## elo

- every time hero wins or lost he wil plus or diminish （combatpoint/enemy combatpoint *20）+300 points

## Design

 - Homepage: Bij het ontwerpen van de homepage begonnen we met een navigatiebalk. In eerste instantie overwogen we om deze donker te houden, maar uiteindelijk kozen we toch voor een witte achtergrond omdat dit er mooier uitzag en de tekst beter naar voren kwam.

Als achtergrondafbeelding kozen we een foto die goed bij het onderwerp paste. We wilden ervoor zorgen dat de tekst goed leesbaar was, dus plaatsten we deze in een div en maakten we de achtergrond wit, zodat deze goed leesbaar is. Hierdoor kun je het nieuws van vandaag beter lezen.

Onder het nieuws van vandaag kun je onze helden zien, waar je doorheen kunt scrollen. Hiervoor hebben we 'fetchall' gebruikt in JavaScript en dit ook in een div geplaatst. Aanvankelijk overwogen we ook hier een witte achtergrond te gebruiken, maar dit zag er een beetje saai en eentonig uit. Daarom kozen we ervoor om het zwart te maken. We vonden het leuker om een bewegende gif toe te voegen.

Uiteindelijk hebben we een footer gemaakt met onze contactinformatie.


- Registratie: Het was het eenvoudigste; we hoefden alleen een formulier te maken, alles naar het midden te brengen, en een rode knop toe te voegen om bij ons thema te passen, samen met een andere achtergrond voor variatie. Om helden te registreren, hebben we een achtergrond gezocht waarop de meeste helden staan afgebeeld.

- contact: Daar hebben we contact details en een plek waar ze ons kunnen bereiken we hebben het naast elkaar gedaan zodat het wat netjes eruit ziet.

Er zijn nog wat dingen waar we aan hebben gewerkt maar op dit moment herinner ik ze niet.
## APIS

### Get

**Base URL:** `localhost/api/`

- /GetHerobyId/?hero_id={id} : return json data of hero
- /GetAllHeros : return json data of all heros
- /GetHeroPhysicalbyid/?hero_id={id} : return json data of hero physical
- /GetAllHeroPhysical : return json data of all hero physical
- /DeleteHeroByid/?hero_id={id} : delete hero , physicals and history.

### Post

**Base URL:** `localhost/api/`

/updateHeroNickNameById/
Update hero name.

##### Parameters

- `hero_id`: ID of the hero (Type: integer)
- `nickname`: New nickname for the hero (Type: string)

/CreateHero/
Create Hero

##### Parameters

- `hero_name`: Name of the hero (Type: string)
- `hero_nickname`: Nickname of the hero (Type: string)
- `hero_background`: Background of the hero (Type: string)
- `heroage`: Age of the hero (Type: integer

- +10 other apis.

## combatpoint

- we use agility + armor + power * (mana + control) / 2) to calculate combat point

## instalation

#### copy the link under and run it in terminal

```
git clone git@git.nexed.com:88bc56ac-e566-493e-92e3-d7431b8a2b03/a901e9f7-b860-455b-a683-070d86447638/one-punch-man.git && cd one-punch-man && composer install
php model/seeder.php;
```

## team

- dillon singh bhatha
- marchantelo eiflaar
- zuohuang cai
- joost van altena
- walid taha el idrissi