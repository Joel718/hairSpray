# hairSpray
Project webbshop

Demo: http://joelmaneskold.wieg17.se/hairSpray/


Bakgrund till projekt: Året är 1992 Waynes world på biograferna. Jane är en finsk ultramiljoner som bestämt sig för satsa på en ny e-handel. Han vill investera i en ny hemsida. Nu är det upp till att ta fram en sida. Nu ska vi tjäna pengar till Janne!


Sammanfattning av de 'issues' vi haft och hur vi löst dem


#1 Arbetet ska implementeras med objektorienterad principer.

  Lösning: Vi har ej jobbat med med några klasser, istället har vi skrivit bra namn i koden och försökt hålla strukturen i scopen och mapparna på ett bra sätt för att underlätta felsökningar. 

#2 Skapa ett ER diagram, ska lämnas vid idégodkännande. 

  Lösning: Vi började med att öppna en MD fil och skriva hur vi ville att databasen skulle se ut, när vi gjort överblicken så   började vi skissa på det. Finns att hitta i repositorit.

#3 Beskriva företagsidé i text.

Lösning: Vi har utvecklat en företagsidé som vi har beskrivit professionellt i en textfil vid namn HairSpray.txt. 


#4 All data som programmet uttnyttjar ska vara sparat i MySQL databas (produkter, beställningar, konton).

  Lösning: Workin on it



#5 Det ska finnas ett normaliserat diagram över databasen i git.

  Lösning: Vid slutet av arbetet så ser databasen annorlunda ut, vi började på nytt diagram på faktiska databasen hur det   blev.


#6 Skapa en adminsida.

  Lösning: 


#7 Inga lösenord får sparas i klartext i databasen.

  Lösning: 

#9 Admin ska kunna uppdatera antal produkter i lager från adminsidan.

  Lösning:

#10 Admin ska kunna se en lista med alla beställningar.

  Lösning: Workin on it

#11 Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori men kan tillhöra flera.

  Lösning: Vi har skapat en fil för varje kategori, ändrat queryn för filtrera produkterna från utan_frakt vi vill ha på respeketive sida.
           Se index.php, hairspray.php, vax.php, shampo.php.


#13 Besökare ska kunna lägga produkterna i en kundkorg som är sparad i session på servern.

Lösning: Se index.php med div namn "col-xs-12 col-md-4" och rad 17 - 40.


#14 Man ska kunna registrera sig för nyhetsbrev.

  Lösning: Se nyhetsbrev.php där vi har koden för skicka adressen som skrivits in på forumläret i index.php. 


#15 Admin ska kunna se en lista över personer som vill ha nyhetsbrev och deras epost adresser.

Lösning: 
Hämtar alla kolumner i tabelen Person. Hämtar sen ut queryn i databasen mot $select_person. Gör en while loop som skriver ut respektive row i $select_Person. Slutligen echo respektive kolumn på egen rad. 

#16 Besökare ska kunna välja ett av flera fraktalternativ.

Lösning: Fetchar ut fraktalternativen från tbl_product, där frakt är detsamma som en produkt. Väljer endast de produkter som börjar på F och skriver ut dett till table med knappalternativ. Se kod från index.php rad 155 - 180


#18 Beställning/order ska skickas till databasen.

Lösning: Workin on it
