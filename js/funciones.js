function limpiar(){
    document.form.reset();
    document.form.usuario.focus();
}
function validar(){
    var form =  document.form;
    if(form.usuario.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar un usuario!',
        });
        form.usuario.value="";
        form.usuario.focus();
        return false;
    }
    if(form.contra.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar una contraseña!',
        });
        form.contra.value="";
        form.contra.focus();
        return false;
    }
    form.submit();
}
function limpiar1(){
    document.form.reset();
    document.form.nombre.focus();
}
function registro(){
    var form =  document.form;
    if(form.c.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su cedula!',
            timer: 1500,
        });
        form.c.value="";
        form.c.focus();
        return false;
    }
    if(form.n.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su nombre!',
            timer: 1500,
        });
        form.n.value="";
        form.n.focus();
        return false;
    }
    if(form.a.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su apellido!',
        });
        form.a.value="";
        form.a.focus();
        return false;
    }
    if(form.co.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar su correo!',
        });
        form.co.value="";
        form.co.focus();
        return false;
    }
    if(form.p.value == 0 ){
        Swal.fire({
            icon: 'error',
            title: '¡¡ERROR !!',
            text: '¡Debe digitar una contraseña!',
        });
        form.p.value="";
        form.password.focus();
        return false;
    }
    form.submit();
}
function eliminar(url) {
    Swal.fire({
        title: "Esta seguro de eliminar el registro?",
        text: "No podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar el registro"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });
}

function eliminar_u(url) {
    Swal.fire({
        title: "Esta seguro de eliminar el registro?",
        text: "No podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar el registro"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });
}
function eliminar_p(url) {
    Swal.fire({
        title: "Esta seguro de eliminar el registro?",
        text: "No podras revertir la accion",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#878180',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar el registro"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });
}

