function post(url, data, callback) {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", url);

    xhr.send(data);

    xhr.onload = () => {
      callback(xhr.response);
    };
}

function include(url) {
  var script = document.createElement('script');
  script.src = url;
  document.getElementsByTagName('head')[0].appendChild(script);
}

// var requestURL = 'https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json';
// var request = new XMLHttpRequest();
// request.open('GET', requestURL);
// request.responseType = 'json';
// request.send();
// request.onload = function() {
//   var superHeroes = request.response;
//   populateHeader(superHeroes);
//   showHeroes(superHeroes);
// }