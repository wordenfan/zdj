; (function ($) {
    $.fn.extend({
        "liteNav": function (t) {
            var $this = $(this), i = 0, $pics = $('#NewsPic'), autoChange = function () {
                var $currentPic = $pics.find('a:eq(' + (i + 1 === 3 ? 0 : i + 1) + ')');
                $currentPic.css({
                    visibility: 'visible',
                    display: 'block'
                }).siblings('a').css({
                    visibility: 'hidden',
                    display: 'none'
                });
                $pics.find('.Navv>span:contains(' + (i + 2 > 3 ? 3 - i : i + 2) + ')').attr('class', 'Cur').siblings('span').attr('class', 'Normal');
                $('#NewsPicTxt').html('<a target="_blank" href="' + $currentPic[0].href + '">' + $currentPic.find('img').attr('title') + '</a>');
                i = i + 1 === 3 ? 0 : i + 1;
            }, st = setInterval(autoChange, t || 5000);
            $this.hover(function () {
                clearInterval(st);
            }, function () { st = setInterval(autoChange, t || 5000) });
            $pics.find('.Navv>span').click(function () {
                i = parseInt($(this).text(), 10) - 2;
                autoChange();
            });
        }
    });
}(jQuery));