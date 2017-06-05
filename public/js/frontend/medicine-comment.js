var CommentViewModel = function()
{
    var self = this;

    self.url = '/comment/json/getList';
    self.medicineId = ko.observable();
    self.currentPage = ko.observable(1);
    self.totalPage = ko.observable();
    self.commentDataArray = ko.observableArray([]);
    self.currentUserId = ko.observable(0);

    self.completeLoadData = function(data)
    {
        self.currentPage(data.comments.current_page);
        self.totalPage(data.comments.last_page);
        self.commentDataArray(data.comments.data);
        self.currentUserId(data.currentUserId);
        $('#comment-indicator').addClass('hide');
    }

    self.initData = function(paramMedicineId)
    {
        $('#comment-indicator').removeClass('hide');
        
        self.medicineId(paramMedicineId);
        var params = { page: self.currentPage(), medicineId: paramMedicineId };
        var request = $.ajax({method: "GET", url: self.url, data: params});

        request.done(function(data){
            self.totalPage(data.comments.last_page);
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('#comment-indicator').addClass('hide');
        });

        return self;
    }

    self.sendComment = function(data, event)
    {
        var paramUrl = '/comment/send/data';
        $('#comment-indicator').removeClass('hide');

        var paramContent = $('#comment-content-textarea').val();
        if (!paramContent) {
            $('#comment-content-textarea').focus();
            $('#comment-indicator').addClass('hide');
            $('#comment-button-show-emty').click();
            return;
        }

        $('#comment-content-textarea').val('');

        var tokenParam = $('meta[name=_token]').attr('content');
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : tokenParam }
        });

        var params = { medicineId: self.medicineId(), content: paramContent };
        
        var request = $.ajax({method: 'POST', url: paramUrl, data: params});
        request.done(function(data){
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('#comment-indicator').addClass('hide');
            $('#comment-content-textarea').val(paramContent);
        });
    }

    self.nextPage = function()
    {
        $('#comment-indicator').removeClass('hide');

        var currentPage = self.currentPage();
        if (currentPage < self.totalPage()){
            self.currentPage(++currentPage);
        }
       
        var params = { page: self.currentPage(), medicineId: self.medicineId() };

        var request = $.ajax({method: "GET", url: self.url, data: params});
        request.done(function(data){
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('#comment-indicator').addClass('hide');
        });
    }

    self.prePage = function()
    {
        $('#comment-indicator').removeClass('hide');

        var currentPage = self.currentPage();
        if (currentPage > 1){
            self.currentPage(--currentPage);
        }
        
        var params = { page: self.currentPage(), medicineId: self.medicineId() };
        var request = $.ajax({method: "GET", url: self.url, data: params});

        request.done(function(data){
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('#comment-indicator').addClass('hide');
        });
    }
}
