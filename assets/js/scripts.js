
function ReturnApiData(route) {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: 'api/'+route,
        success: function(data, textStatus, jqXHR) {

            console.log("success");
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
        },
        error: function (jqXHR, status, error) {
            
            console.log("error");
            console.log(jqXHR);
            console.log(status);
            console.log(error);
        }
    });

}