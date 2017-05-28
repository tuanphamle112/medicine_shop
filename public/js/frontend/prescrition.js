var PrescriptionViewModel = function()
{
    var self = this;

    self.url = '/prescription/json/getList';
    self.currentPage = ko.observable(1);
    self.totalPage = ko.observable();
    self.prescriptionDataArray = ko.observableArray([]);
    self.prescriptionDetail = ko.observableArray();

    self.completeLoadData = function(data)
    {
        self.currentPage(data.current_page);
        self.prescriptionDataArray(data.data);
        $('.indicator').addClass('hide');
    }

    self.initData = function()
    {
        $('.indicator').removeClass('hide');

        var tmpDetail = {get_all_item_prescriptions: []};
        self.prescriptionDetail(tmpDetail);

        var params = { page: self.currentPage() };
        var request = $.ajax({method: "GET", url: self.url, data: params});

        request.done(function(data){
            self.totalPage(data.last_page);
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('.indicator').addClass('hide');
        });

        return self;
    }

    self.nextPage = function()
    {
        $('.indicator').removeClass('hide');

        var currentPage = self.currentPage();
        if (currentPage < self.totalPage()){
            self.currentPage(++currentPage);
        }
       
        var params = { page: self.currentPage() };

        var request = $.ajax({method: "GET", url: self.url, data: params});
        request.done(function(data){
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('.indicator').addClass('hide');
        });
    }

    self.prePage = function()
    {
        $('.indicator').removeClass('hide');

        var currentPage = self.currentPage();
        if (currentPage > 1){
            self.currentPage(--currentPage);
        }
        
        var params = { page: self.currentPage() };
        var request = $.ajax({method: "GET", url: self.url, data: params});

        request.done(function(data){
            self.completeLoadData(data);
        });
        request.fail(function(jqXHR, textStatus){
            $('.indicator').addClass('hide');
        });
    }

    self.viewDetailPrescription = function(data, event)
    {
        self.prescriptionDetail(data);
    }
}
