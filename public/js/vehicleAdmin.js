vehicleAdmin();

function vehicleAdmin() {
    let url = new URL(document.URL);

    if (url.pathname !== '/admin/vehicle/create') {
        return;
    }

    let model = document.querySelector('form select[name=model_id]');
    let modelParent = model.parentElement;

    let manufacturer = document.querySelector('form select[name=manufacturer_id]');

    manufacturer.addEventListener('change', (e) => {
        fetch(url.origin + '/api/models?manufacturer_id=' + (e.target.selectedIndex + 1))
            .then(res => res.json())
            .then(data => {
                let select = document.createElement('select');

                select.className = 'form-control';
                select.name = 'model_id';

                for (let model of data.data) {
                    let option = document.createElement('option');

                    option.value = model.id;
                    option.text = model.name;
                    option.className = 'form-control';

                    select.append(option);
                }

                modelParent.replaceChild(select, model);
                model = select;
            })
    });
    manufacturer.dispatchEvent(new Event('change'));

    function dispatchEvent(){
        manufacturer.dispatchEvent(new Event('change'));
    }

    return (() => {dispatchEvent();})();
}
