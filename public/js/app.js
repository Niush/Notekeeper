$(document).ready(function() {
    $('.sidenav').sidenav();

    $('.collapsible').collapsible({
        outDuration: 200
    });

    $('.modal').modal();

    $('.dropdown-trigger').dropdown({
        hover: true,
        coverTrigger: false,
        constrainWidth: false
    });

    $('input#title, textarea#note').characterCounter();

    $('#search').on('keyup', function(e) {
        var query = $('#search').val();

        if (query.length <= 3) {
            $(".result").html('');
            console.log('More Input');
        } else {
            if (e.which == 13) {
                //window.location.href = 'search/' + query;
            } else {
                $.ajax({
                    url: 'search/' + query,
                    method: "GET",
                    cache: false,
                    error: function() {
                        console.log("Could Not Fetch");
                        //$(".brand-logo").append('<span class="error">Unknown Request was Sent, try Reloading.</span>');
                    },
                    success: function(data) {
                        processData(data);
                    }
                });
            }
        }
    });

    function processData(data) {
        if (data.length == 0) {
            $(".result").html('');
            //$(".brand-logo").append('<span class="error">No Result Found</span>');
        } else {
            $(".result").html('');
            //console.log(data);
            for (var i = 0; i < data.length; i++) {
                var title = data[i]['title'];
                var note = data[i]['note'];
                var id = data[i]['id'];
                $(".result").append(
                    '<a href="edit/' + id + '" style="padding:5px;">' + title +
                    '<br/><h6 style="font-size:10px;padding:0 5px;">' + note + '</h6></a>'
                );
                //alert(note);
            }
        }
    }

});