export default function () {
    let form = document.querySelector('.subscribe-form');
    form && form.addEventListener('submit', function (e) {
        e.preventDefault();
        form.classList.add('loading');

        let formData = new FormData();
        let email = form.querySelector('[name=email]').value;
        formData.append('email', email);

        if(typeof twice_pictures !== 'undefined')
            fetch(twice_pictures.ajax_url + '?action=subscribe', {
                method: 'POST',
                body: formData,
            })
                .then(data => data.json())
                .then((data) => {
                    form.classList.remove('loading');
                    form.querySelector('.subscribe__message').innerHTML = data.message;
                });
    });
}

