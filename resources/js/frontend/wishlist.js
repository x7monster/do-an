$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.add-wish-list').on('click', function(e) {
        e.preventDefault()
        let productId = $(this).data('id')
        let url = 'wishlists'

        $.ajax({
            method: 'POST',
            url: url,
            data: {
                id: productId
            }, 
            success: function(res) {
                if (res.success) {
                    Swal.fire({
                        title: res.product,
                        text: res.success,
                        icon: 'success',
                    })
                }
            },
            error: function(error) {
                Swal.fire({
                    text: error.statusText,
                    icon: 'error',
                })
            }
        })        
    })

    $('.remove-wish-list').on('click', function(e) {
        e.preventDefault()
        let productId = $(this).data('id')
        let url = `wishlists/${productId}`

        $.ajax({
            method: 'DELETE',
            url: url,
            success: function(res) {
                Swal.fire({
                    title: res.product,
                    text: res.success,
                    icon: 'success',
                }).then(function() {
                    window.location.reload()
                })
            },
            error: function(error) {
                Swal.fire({
                    text: error.statusText,
                    icon: 'error',
                })
            }
        })
    })
})