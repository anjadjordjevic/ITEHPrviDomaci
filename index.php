<?php

require_once 'Database.php';
$watches = Database::getInstance()->getAllWatches();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="ikonicaa.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Svet satova</title>
  <link rel="stylesheet" href="style.css">
  <script defear src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
  
  <style>
  body{
      background-image: url('wall.jpg');
    }
    </style>
</head>

<body>
	<header>
 
  <nav >
    <img src="naslov.png" alt="title" id="n">
    <ul>
      <li><a href="table.php" id="t">Zavirite u naš Svet</a></li>
      <li><a href="insert.php?un=anja" id="pr">Dodaj sat</a> </li>
      <li> <a href="cv.html" id="cv">O nama</a></li>
    </ul>
  </nav>
  <label for="nav-toggle" class="nav-toggle-label">
    <span></span>
  </label>
</header>

  <div id="title">
    <img src="dobrodosli.png" alt="title" id="motw">
    <h3>Svi najtraženiji svetski modeli satova na jednom mestu!</h3>
  </div>

    <br>
    <h3 style="color:rgb(120,56,10)">Pretraži: <input type="text" class="searchInput"></h3>
    <h3 style="color:rgb(120,56,10)">Sortiraj po: <span class="nameSort">Naziv</span> | <span class="priceSort">Cena</span></h3> <br>
    <br>
    
  
    <br><br><br>
    <div class="allProducts">

      <?php foreach ($watches as $watch) : ?>
        <div class="product">
          <a href="post.php?id=<?php echo $watch['id']; ?>"><img class="watch-image" src="<?php echo $watch['img']; ?>" alt="Nema slike"></a>
          <p><br>Korisnik: <?php echo $watch['username']; ?></p><br>
          <p>Model: <?php echo $watch['title']; ?></p><br>
          <p>Pol: <?php echo $watch['gender']; ?></p><br>
          <p>Cena: $<?php echo $watch['price']; ?></p><br>
          <br><br><br>
        </div>
      <?php endforeach; ?>

    </div>

    <p style="color:rgb(120,56,10);font-size:20px"><strong>Šta predstavlja ručni sat?</strong></p>
    <p align ="justify">Ručni sat je mali prenosivi časovnik koji pokazuje vreme. Pored toga, oni mogu imati i druge funkcije 
      (tzv. Komplikacije pri satu) - najčešće datumsku knjigu, tj. Prikazuju i dan u nedelji i mesecu ili čak ceo datum. 
      Takođe mogu da budu opremljeni uređajem za merenje kraćih vremena (hronograf, štoperica), 
      mogu da imaju rotacijski brojčanik, itd. Sat je takođe modni dodatak, predmet društvenog predstavljanja i prestiža. 
      Dragi su od zlata, od titanijuma, ukrašeni su kao nakit i podložni su promenama u modi. 
      Pored toga, postoje i posebni satovi.</p>
    <p style="color:rgb(120,56,10);font-size:20px"><strong>Kako je nastao prvi sat?</strong></p>
    <p align ="justify"> Prvi ručni sat je nastao 1868. godine. Prva serijska proizvodnja načinjena je 1880. godine. 
      Tada je proizvedeno 200 satova. Ručne satove su u početku nosile samo žene, pošto nije bio popularan 
      kod muškaraca – civila. Koristili su ga samo nemački pomorski oficiri. Prvi sat za muškarce je nastao 
      tako što je brazilski pilot Alberto Santos Domont, 1904. godine, pitao svog prijatelja Luisa Kartiera 
      da mu napravi sat koji će moći da stavi na ruku koji bi mu omogućio da ne meri svoje performanse u letu, 
      a da su mu istovremeno obe ruke na komandama. Ubrzo su počeli komercijalno da se proizvode i ručni satovi 
      za muškarce, a prvi je nazvan po pomenutom pilotu.</p>
    <p style="color:rgb(120,56,10);font-size:20px"><strong>Razvoj sata sa klatnom</strong></p>

    <p align ="justify"> Značajan razvoj javio se 1657. s pronalaskom sata s klatnom. Još ranije je Galilej imao ideju da iskoristi 
      njihajuće klatno za pokretanje satnog mehanizma. Kristijan Hajgens se, međutim, obično smatra za pronalazača. 
      On je napravio matematičku formulu odnosa dužine klatna i vremena (99,38 cm ili 39,13 inča za jednu sekundu vremena) 
      i dao da se prvi takav sat napravi. Engleski sajdžija Viljem Klement je 1670. napravio „uspinjač sa sidrom“, za razliku 
      od Hajgensovog „uspinjača sa krunom“. Za nepunu generaciju dodate su i kazaljke za minute i sekunde. Uzbuđenje zbog sata 
      s klatnom privuklo je pažnju dizajnera koji su napravili razne oblike satova. Napravljeno je kućište za smeštanje sata s klatnom. 
      Engleski sajdžija Viljem Klement je izmislio ovo kućište 1670. godine. Otprilike u isto vreme kućišta su počela da se izrađuju 
      od drveta s licem od staklenog emajla. Eli Teri je 17. novembra 1797. prvi patentirao sat. On je poznat kao osnivač američke 
      industrije satova. Razvoj elektronike u 20. veku doveo je do satova bez ikakvog satnog mehanizma. Vreme na ovim satovima merilo 
      se na razne načine, na primer pomoću kvarcnih kristala ili raspadanjem radioaktivnih elemenata. Čak su i mehanički satovi 
      napajani baterijama, čime je navijanje sata postalo suvišno.</p>
  </div>

  <div class="breakDiv"></div>

  <div id="footer">
    <h4 style="color:rgb(139, 69, 19)";>SVET SATOVA DOO<br>
    <br>Nemanjina 27, Belgrade, Serbia<br>
    <br>Mobile: 011 3335 230<br>
    <br>Email: svetsatova@gmail.com</h4>
  </div>

  <script src="app.js"></script>



</body>

</html>