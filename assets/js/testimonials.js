jQuery( function($) {
    $('.testimonials_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget),
        testimonial = button.attr('data-testimonial'),
        name = button.attr('data-name'),
        additional_info = button.attr('data-additionalinfo'),
        media_type = button.attr('data-mediatype'),
        media = button.attr('data-media'),
        embed_media = '';

        console.log(testimonial);
        console.log(name);
        console.log(additional_info);
        console.log(media_type);
        console.log(media);

        if (media_type == 'video') {
            embed_media = '\
            <div class="embed-container">\
                <iframe width="704" height="396" src="' + media + '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>\
            </div>';
        } else if (media_type == 'image') {
            embed_media = '<img src="' + media + '">';
        }

        if (embed_media != '') {
            $(this).find('.testimonial').append('<div class="testimonials_media pb-5">' + embed_media + '</div>');
        }

        $(this).find('.testimonial').append('<p class="testimonials_testimonial ' + media_type + ' mb-4">' + testimonial + '</p>');

        if (name != '') {
            $(this).find('.testimonial').append('<p class="testimonials_name m-0 font-weight-bold">' + name + '</p>');
        }
        if (additional_info != '') {
            $(this).find('.testimonial').append('<p class="testimonials_additionalinfo m-0 font-weight-light">' + additional_info + '</p>');
        }
    });

    $('.testimonials_modal').on('hidden.bs.modal', function (e) {
        $(this).find('.testimonial').html('');
    });
} );