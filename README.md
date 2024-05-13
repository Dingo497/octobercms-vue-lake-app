# O projekte
- Aplikácia slúži na zapisovanie jazier a meraní teploty jazier.


### Technológie
- October cms (Laravel), Vue.js (vue router, vuex), Typescript
- October cms slúži len na admin sekciu a na frontend sa používa vue.js ako SPA
- V tejto aplikácii som neriešil štýly len funkcionalitu a vyskúśanie si spojenie october cms s vue.js 


### Čo by som zmenil/upravil
- Tahanie z api. Konkretne by som uz vracal upravene data z api aby sa s tym FE uz moc nezatazoval. Teraz to mam z casti tak ze upravujem data aj na BE aj na FE. 
- Vzdy ked prepnem pagination v tabulke tak sa mi znova natiahne api data. Co je spravne, avsak zislo by sa to vylepsit tak, ze vsetko co natiahnem z api tak sa ulozi ako velke pole udajov do vuex a potom vzdy ked sa vratim napriklad v pagination ktore som uz raz tahal z api tak nech len skontroluje ci uz nahodou neexistuje vo vuex ak ano vrat rovno vuex data inak tahaj z api...
...


### Funkcionalita na implementovanie
- Pridat role a pouzivatelov. Kde by bol jeden admin mal by pod sebou zamestnancov (inych userov s inou rolou) a zamestanci by mohli pridavat len merania dostupnych jazier a admin by mohol pridavat dalsich zamestnancov a jazera...
- Po kliku na riadok by sa mi zobrazila na FE podstranka s pribliznimi udajmi o merani alebo o jazeru. Kde by som pouzil uz aj ostatne rozsirene udaje ako obrazok a description. Taktiez by sa tam v jednoduchsej verzii zobrazila tabulka historie merani pre dane jazero.
...


# Návod na spustenie
1. git clone https://github.com/Dingo497/octobercms-vue-lake-app.git
2. cd octobercms-vue-lake-app
3. cd october
4. Vytvor .env subor a nastav DB pripojenie
5. v roote /october kde sa nachadzas vytvor auth.json s udajmi:
   ```{
    "http-basic": {
        "gateway.octobercms.com": {
            "username": "xxx",
            "password": "xxx"
        }
    }
}```
6. composer install
7. php artisan october:migrate
8. php artisan serve
9. cd .. a cd vue
10. npm install
11. npm run serve



# Použité externé packages
BE - Offline/Cors - Sluzi na nastavenie CORS medzi BE a FE
FE - VUEX, Vue router, vue-axios, vue3-table-lite, tailwindcss, sass(scss), typescript
