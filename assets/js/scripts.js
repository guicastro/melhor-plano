
function ReturnApiData(route) {

    Loading($(".container-fluid"), true);

    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'api/'+route,
        success: function(data, textStatus, jqXHR) {

            Loading($(".container-fluid"), false);
            
            if(data.success==true) {
                
                $.each(data.data, function (key, DataObject) { 
                    
                    CreateCard(key, DataObject);
                });
            }
        },
        error: function (jqXHR, status, error) {
            
            Loading($(".container-fluid"), false);

            toastr.error(jqXHR.responseText, 'Erro '+status)
        }
    });

}

function CreateCard(type, Cards) {

    if(type=="products") {

        var CardsArea = $("#standalone");

        $.each(Cards, function (key, DataObject) { 
            
            CardsArea.append('<div class="col-lg-4 col-12">\
                                <div class="card">\
                                    <div class="card-header"><strong>'+DataObject.name+'</strong></div>\
                                    <ul class="list-group list-group-flush">\
                                        <li class="list-group-item">'+DataObject.description+'</li>\
                                        <li class="list-group-item">$ '+DataObject.price+'/mo</li>\
                                    </ul>\
                                    <div class="card-body">\
                                        <a href="#'+DataObject.id+'" class="btn btn-primary view-bundles" data-id='+DataObject.id+'>View bundles</a>\
                                    </div>\
                                </div>\
                            </div>');
        });

    }
    
    else if(type=="bundles") {
        
        var CardsArea = $("#bundles");
        
        $.each(Cards, function (key, BundleObject) { 
            
            var BundleNumber = 0;

            BundleNumber++;

            var Card = $('<div class="col-lg-4 col-12 bundle-card bundle-'+BundleObject.mainProduct.id+'"></div>');
            var CardBundleBody = $('<div class="card card-bundle"></div>');
            var CardHeader = $('<div class="card-header"><strong>'+BundleObject.mainProduct.name+' Bundle '+BundleNumber+'</strong></div>');
            
            var BundleList = $('<ul class="list-group list-group-flush"></ul>');

            $.each(BundleObject.products, function (ProductKey, ProductObject) { 
                                    
                switch(ProductObject.product.type) {
                    
                    case "bb":
                        BundleList.append('<li class="list-group-item"><i class="fas fa-globe"></i> '+ProductObject.product.name+' ('+ProductObject.product.description+')</li>');
                        break;
                    case "tv":
                        BundleList.append('<li class="list-group-item"><i class="fas fa-tv"></i> '+ProductObject.product.name+' ('+ProductObject.product.description+')</li>');
                        break;
                    case "ll":
                        BundleList.append('<li class="list-group-item"><i class="fas fa-phone"></i> '+ProductObject.product.name+' ('+ProductObject.product.description+')</li>');
                        break;
                    case "addon":
                        BundleList.append('<li class="list-group-item"><i class="fas fa-plus"></i> '+ProductObject.product.name+' ('+ProductObject.product.description+')</li>');   
                        break;
                }
            });

            var BundlePrice = $('<div class="card-footer">\
                                    <div class="row">\
                                        <div class="col-9"><strong>Total</strong></div>\
                                        <div class="col-3 text-right"><strong>$ '+BundleObject.price+'</strong></div>\
                                    </div>\
                                </div>');
            
            CardBundleBody.append(CardHeader);
            CardBundleBody.append(BundleList);
            CardBundleBody.append(BundlePrice);
            Card.append(CardBundleBody);
            CardsArea.append(Card);
        });

        $('.view-bundles').on('click', function (event) {
   
            var mainProduct = $(this).data('id');
            ShowBundleCards(mainProduct);
        });
    }

    $(".bundle-card").hide();
    
}


function Loading(element, status) {

    var loader = $('<div style="position: fixed; z-index: 2000;" class="loading-overlay"><i class="loading-icon fa fa-spin fa-cog fa-2x blue"></i></div>');
    
    if(status == true) {
        
        element.css('opacity', 0.25);
        loader.insertBefore(element);        
    }

    else if(status == false) {

        element.prevAll('.loading-overlay').remove();
        element.css('opacity', 1);
    }
}

function ShowBundleCards(mainProduct) {

    $(".bundle-card").hide();

    $(".bundles-body").show();

    $(".bundle-"+mainProduct).fadeIn();
}