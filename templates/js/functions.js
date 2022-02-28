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