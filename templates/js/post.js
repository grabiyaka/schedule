function post(url, data, callback) {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", url);

    xhr.send(data);

    xhr.onload = () => {
      callback(xhr.response);
    };
}