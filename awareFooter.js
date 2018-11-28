function boldenCurrentPage() {
    url = window.location.href.split('/');
    url = url[url.length - 1];
    $('.footer a').each(function() {
        href = $(this).attr('href').split('/');
        if (href[href.length - 1] == url) {
            $(this).css("font-weight","Bold");
        }
    });
}

$(document).ready(boldenCurrentPage);
