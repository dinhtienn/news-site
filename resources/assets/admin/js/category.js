import Swal from 'sweetalert2';

let stop = true;
$('.btn-delete').click(function (e) {
    if (stop) {
        e.preventDefault();
        Swal.fire({
            title: confirmDeleteTitle,
            text: confirmDeleteMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: deleteAccept,
            cancelButtonText: deleteCancel
        }).then((result) => {
            if (result.value) {
                stop = false;
                this.click();
            }
        })
    } else {
        stop = true;
    }
});
