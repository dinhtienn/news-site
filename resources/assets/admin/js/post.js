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

$('#btn-mark-read').click(function (e) {
    e.preventDefault();
    $.ajax({
        url: maskCommentReadRoute,
        method: 'GET',
        data: {
            id: this.dataset.id,
            postId: this.dataset.postId,
        },
        success: (data) => {
            if (data) {
                Swal.fire(
                    successTitle,
                    successMaskMessage,
                    'success'
                );
                $("textarea#review-content").val('');
            } else {
                Swal.fire(
                    errorHappenMessage,
                    errorHappenMessage,
                    'error'
                );
            }
        },
        error: (err) => {
            Swal.fire(
                errorHappenMessage,
                err,
                'error'
            );
        }
    });
});

$('#btn-save-comment').click(function (e) {
    e.preventDefault();
    $.ajax({
        url: insertCommentRoute,
        method: 'GET',
        data: {
            id: this.dataset.id,
            postId: this.dataset.postId,
            userId: this.dataset.userId,
            content: $("textarea#review-content").val()
        },
        success: (data) => {
            if (data) {
                Swal.fire(
                    successTitle,
                    successSaveMessage,
                    'success'
                );
                $("textarea#review-content").val('');
                if (data.id !== this.dataset.id) {
                    this.dataset.id = data.id;
                }
            } else {
                Swal.fire(
                    errorHappenMessage,
                    errorHappenMessage,
                    'error'
                );
            }
        },
        error: (err) => {
            Swal.fire(
                errorHappenMessage,
                err,
                'error'
            );
        }
    });
});

