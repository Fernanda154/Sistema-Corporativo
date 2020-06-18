function getCoords() {
    var api;
    $('#toCrop').Jcrop({
        minSize: [160, 160],
        aspectRatio: 1,
        bgOpacity: 0.4,
        addClass: 'jcrop-light',
        onSelect: updateCoords,
        onChange: updateCoords,
        setSelect: [0, 0, 160, 160]
    });
}

function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};

function _(element) {
    if (document.getElementById(element))
        return document.getElementById(element);
    else
        return false;
}

function submitForm() {
    if (_('arquivo').files[0]) {//Se houver um arquivo, faremos alguns testes no mesmo
        var arquivo = _('arquivo').files[0];
        if (arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
            _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';
        else if (arquivo.size > 1024 * 2048)//2MB
            _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
        else {
            var x = _('x').value;
            var y = _('y').value;
            var w = _('w').value;
            var h = _('h').value;
            var formData = new FormData();
            formData.append('arquivo', arquivo);
            formData.append('x', x);
            formData.append('y', y);
            formData.append('w', w);
            formData.append('h', h);
            if (_('imgType')) {
                var imgType = _('imgType').value;
                formData.append('imgType', imgType);
            }
            if (_('imgName')) {
                var imgName = _('imgName').value;
                formData.append('imgName', imgName);
            }
            var request = new XMLHttpRequest();
            if (_('toCrop'))
                var includeFile = '../acesso_administrativo/cropFile.php';
            else
                var includeFile = '../acesso_administrativo/recebeFile.php';
            request.open('post', includeFile, true);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200)
                    _('result').innerHTML = request.responseText;
                if (_('toCrop'))
                    _('sendButton').value = 'Recortar';
            }
            request.send(formData);
            _('result').innerHTML = '<img src="loading.gif" />';
        }
    }
    else
        _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
}