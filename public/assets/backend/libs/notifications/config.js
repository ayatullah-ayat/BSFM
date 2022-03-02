
function _toastMsg(text = null, icon ='error', timer=2000, button=false){
    swal({
        title: manageTile(icon),
        text,
        icon,
        button,
    });

    setTimeout(() => swal.close(), timer);
}


function manageTile(icon){

    let title='';
    switch (icon) {
        case 'success':
            title = "Well done!";
            break;
        case 'error':
            title = "Error!";
            break;
        case 'info':
            title = "Good Job!";
            break;
    }

    return title;
}


function fieldError(responseJSON, field = "") {
    //_toastMsg(res?.msg,'success');
    if (responseJSON?.errors.hasOwnProperty(field)) {
        _toastMsg(responseJSON?.errors[field][0], 'error');
    }
}
