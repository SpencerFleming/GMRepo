function boldenCurrentPage() {
    $('.footer a').each(function() {
        url = window.location.href.split('/');
        url = url[url.length - 1];
        href = $(this).attr('href');
        if (href == url) {
            $(this).css("font-weight","Bold");
        }
    });
}

$(document).ready(boldenCurrentPage);
