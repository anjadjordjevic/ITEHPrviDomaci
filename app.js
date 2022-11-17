let nameSpan = document.querySelector('.nameSort');
let priceSpan = document.querySelector('.priceSort');
let allProductsDiv = document.querySelector('.allProducts');
let searchInput = document.querySelector('.searchInput');

nameSpan.addEventListener('click', () => {
  let sortType = "title";

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      sortType,
    },
    success: (response) => {
      let watches = JSON.parse(response);
      let html = "";
      watches.forEach(watch => {
        html += `<div class="product">
          <a href="post.php?id=${watch.id}"><img class="watch-image" src="${watch.img}" alt="Nema slike"></a>
          <p>username: ${watch.username}</p><br>
          <p>watch: ${watch.title}</p><br>
          <p>gender: ${watch.gender}</p><br>
          <p>price: $${watch.price}</p><br>
          <br><br><br>
        </div>`;
      });

      allProductsDiv.innerHTML = html;
    }
  });
});

priceSpan.addEventListener('click', () => {
  let sortType = "price";

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      sortType,
    },
    success: (response) => {
      let watches = JSON.parse(response);
      let html = "";
      watches.forEach(watch => {
        html += `<div class="product">
          <a href="post.php?id=${watch.id}"><img class="watch-image" src="${watch.img}" alt="Nema slike"></a>
          <p>username: ${watch.username}</p><br>
          <p>watch: ${watch.title}</p><br>
          <p>gender: ${watch.gender}</p><br>
          <p>price: $${watch.price}</p><br>
          <br><br><br>
        </div>`;
      });

      allProductsDiv.innerHTML = html;
    }
  });
});

searchInput.addEventListener('keyup', () => {

  let searchText = searchInput.value;

  $.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {
      searchText,
    },
    success: (response) => {
      let watches = JSON.parse(response);
      let html = "";
      watches.forEach(watch => {
        html += `<div class="product">
          <a href="post.php?id=${watch.id}"><img class="watch-image" src="${watch.img}" alt="Nema slike"></a>
          <p>username: ${watch.username}</p><br>
          <p>watch: ${watch.title}</p><br>
          <p>gender: ${watch.gender}</p><br>
          <p>price: $${watch.price}</p><br>
          <br><br><br>
        </div>`;
      });

      if(html == ""){
        html = "<strong>Ne postoje satovi sa zadatim nazivom</strong>";
      }

      allProductsDiv.innerHTML = html;
    }
  });
});