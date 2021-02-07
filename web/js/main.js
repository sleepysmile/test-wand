$(document).ready(function () {
    $(document).on('submit', '.js-commentForm', function (event) {
        event.preventDefault();
        var self = $(this);
        var listComment = self.siblings('.comment-list');

        $.post(self.attr('action'), self.serialize())
            .done(function (data) {
                if (data.success === true) {
                    self[0].reset()
                    listComment.append(data.item)
                }
            });
    })

    $(document).on('click', '.js-commentLoad', function (event) {
        event.preventDefault();
        var self = $(this);
        var container = self.siblings('.comment-container');

        $.get(self.attr('href'))
            .done(function (data) {
                self.hide();
                container.html(data);
            })
    });

});