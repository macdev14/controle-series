@props(['title'])
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <x-navbar></x-navbar>
    <div class="container">
        <div class="jumbotron">
            <h1>{{ $title }}</h1>
        </div>
        <x-flash-message/>

   {{$slot}}
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId) {
    let formData = new FormData();
    const nome = document
        .querySelector(`#input-nome-serie-${serieId} > input`)
        .value;
    const token = document
        .querySelector(`input[name="_token"]`)
        .value;
    formData.append('nome', nome);
    formData.append('_token', token);
    const url = `/series/${serieId}/editaNome`;
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(() => {
        toggleInput(serieId);
        document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });
}
    </script> 
</body>
</html>