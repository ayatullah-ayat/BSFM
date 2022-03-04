
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



function showModal(selector=null)
{
    if(selector){
        $(selector).modal('show');
    }
}

function hideModal(selector=null)
{
    if(selector){
        $(selector).modal('hide');
    }
}


function ajaxFormToken(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}


function ajaxRequest(obj, reload=false){
    $.ajax({
        ...obj,
        success(res){

            // console.log(res?.data);
            if(res?.success){
                _toastMsg(res?.msg ?? 'Success!', 'success');

                if(reload){
                   location.reload()
                }
            }
        },
        error(err){
            console.log(err);
            _toastMsg((err.responseJSON?.msg) ?? 'Something wents wrong!')
        },
    });
}


function globeInit(arr=[]){

    let selectPattern   = /select/gim;
    let datePattern     = /date/gim;

    if(arr.length){
   
        arr.forEach(elem => {

            if(selectPattern.test(elem.type)){
                console.log(selectPattern.test(elem.type));
                const { dropdownParent, selector, selectedVal, width } = elem;
                $(selector).select2({
                    width           : width ?? '100%' ,
                    theme           : 'bootstrap4',
                    dropdownParent,
                }).val(selectedVal).trigger('change')
            }
            else if(datePattern.test(elem.type)){
                const { selector, format} = elem;
                $(selector).datepicker({
                    autoclose       : true,
                    clearBtn        : false,
                    todayBtn        : true,
                    todayHighlight  : true,
                    orientation     : 'bottom',
                    format          : format ?? 'yyyy-mm-dd',
                })
            }
        });
    }
}


// let arr=[
//     {
//         dropdownParent  : '#categoryModal',
//         selector        : `#stuff`,
//         type            : 'select',
//         // selectedVal     : null,
//         // width           : '100%',
//     },
//     {
//         selector        : `#booking_date`,
//         type            : 'date',
//         format          : 'yyyy-mm-dd',
//     },

// ];