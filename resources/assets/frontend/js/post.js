import Swal from 'sweetalert2';

liked = (liked === '1') ? true : false;
loggedIn = (loggedIn === '1') ? true : false;
authUserId = (authUserId !== '') ? authUserId : null;

$('#btn-like').click(function () {
    if (!loggedIn) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: loginToLikeMessage
        });
        return;
    }
    $.ajax({
        url: likeRoute,
        method: 'GET',
        data: {
            userId: authUserId,
            postId: this.dataset.postId,
        },
        success: (data) => {
            if (!data) {
                // Unlike
                $('#icon-like').removeClass('d-block');
                $('#icon-like').addClass('d-none');
                $('#icon-no-like').removeClass('d-none');
                $('#icon-no-like').addClass('d-block');
                $('#like-count').text(parseInt($('#like-count').text()) - 1);
            } else {
                // Like
                $('#icon-like').removeClass('d-none');
                $('#icon-like').addClass('d-block');
                $('#icon-no-like').removeClass('d-block');
                $('#icon-no-like').addClass('d-none');
                $('#like-count').text(parseInt($('#like-count').text()) + 1)
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

$('.btn-reply').click(function () {
    $('#textarea').focus();
    $('#reply-display').text(`${ replyDisplay } ${ this.dataset.username }`);
    $('#btn-cancel-reply').removeClass('d-none');
    $('#btn-cancel-reply').addClass('d-block');
    $('#btn-cancel-edit').removeClass('d-block');
    $('#btn-cancel-edit').addClass('d-none');
    $('#input-parent').attr('name', 'parent_id');
    $('#input-parent').val(parseInt(this.dataset.commentId));
});

$('#btn-cancel-reply').click(function (e) {
    e.preventDefault();
    $('#reply-display').text('');
    $('#btn-cancel-reply').removeClass('d-block');
    $('#btn-cancel-reply').addClass('d-none');
    $('#input-parent').val(null);
});

$('.btn-edit').click(function () {
    $('#textarea').focus();
    $('#textarea').html(this.dataset.content);
    $('#reply-display').text(editDisplay);
    $('#btn-cancel-reply').removeClass('d-block');
    $('#btn-cancel-reply').addClass('d-none');
    $('#btn-cancel-edit').removeClass('d-none');
    $('#btn-cancel-edit').addClass('d-block');
    $('#input-parent').attr('name', 'comment_id');
    $('#input-parent').val(parseInt(this.dataset.commentId));
});

$('#btn-cancel-edit').click(function (e) {
    e.preventDefault();
    $('#reply-display').text('');
    $('#btn-cancel-edit').removeClass('d-block');
    $('#btn-cancel-edit').addClass('d-none');
    $('#input-parent').val(null);
});
