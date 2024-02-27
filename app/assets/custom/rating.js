(($) => {
    $(document).ready(function () {
        $('.rating-form input[name="rating"]').change(() => {
            var value = $('.rating-form input[name="rating"]:checked').val();
            $.ajax({
                url: rating.ajax_url,
                data: {
                    action: 'set_rating',
                    post_id: rating.post_id,
                    rating_nonce: rating.nonce,
                    rating: value
                },
                method: 'POST',
            })
        });
    })
})(jQuery)