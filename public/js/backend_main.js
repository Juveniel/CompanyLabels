$(document).ready(function(){

    //Pass CSRF token through meta for all ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Session timeout
    $.sessionTimeout({
        warnAfter: 900000 ,
        redirAfter: 1200000 ,
        redirUrl: '/admin/lockscreen',
        logoutUrl: '/admin/auth/logout'
    });

    //Menu active class changer
    menuClassActive();

    //Activate TWB tooltips
    $('[data-toggle="tooltip"]').tooltip();

    //Datatables
    $('#user-list-tb').DataTable();
    $('#section-list-tb').DataTable();

    $('#table-log').DataTable({
        "order": [ 1, 'desc' ],
        "stateSave": true,
        "stateSaveCallback": function (settings, data) {
            window.localStorage.setItem("datatable", JSON.stringify(data));
        },
        "stateLoadCallback": function (settings) {
            var data = JSON.parse(window.localStorage.getItem("datatable"));
            if (data) data.start = 0;
            return data;
        }
    });
    $('.table-container').on('click', '.expand', function(){
        $('#' + $(this).data('display')).toggle();
    });
    $('#delete-log').click(function(){
        return confirm('Are you sure?');
    });

    //Preview avatar for user before upload
    $("#avatar-upl").on('change', function () {

        //Get count of selected files
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#avatar-holder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        image_holder.attr('src', e.target.result);
                    };

                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }

            } else {
                $('#avatarFileReaderNS').modal('show');
            }
        } else {
            $('#avatarFileTypeModal').modal('show');
        }
    });

    //preview company logo todo separate in fuynction
    $("#logo-upl").on('change', function () {

        //Get count of selected files
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#logo-holder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        image_holder.attr('src', e.target.result);
                    };

                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }

            } else {
                $('#logoFileReaderNS').modal('show');
            }
        } else {
            $('#logoFileTypeModal').modal('show');
        }
    });

    //Create user populate cities select
    $('#sl_country').change(function()
    {
        var selectedCountryId = $("#sl_country").val();

        $.ajax({
            method: "POST",
            url: '/admin/users/create/getCities/'+selectedCountryId,
            data: selectedCountryId,
            dataType: "json",
            async: true,
            success: function (data) {
                console.dir(data);
                var $cities_select = $('#sl_city');

                $cities_select.empty();

                $.each(data, function(index, city) {
                    $cities_select.append('<option value="' + index + '">' + city + '</option>');
                });
            },
            error: function () {

            }
        });
    });

    resizeContent();
    changePanelCollapseIcons();
});

$(window).resize(function() {
    resizeContent();
});

function resizeContent() {
    var windowHeight = $(window).height();
    $('#portfolio-page').height(windowHeight);
}

function changePanelCollapseIcons(){
    $(".collapseTrigger").html('<i class="fa fa-fw fa-chevron-up"></i>');

    $(".panel-collapse").on("hide.bs.collapse", function(){
        $(".collapseTrigger").html('<i class="fa fa-fw fa-chevron-down"></i>');
    });
    $(".panel-collapse").on("show.bs.collapse", function(){
        $(".collapseTrigger").html('<i class="fa fa-fw fa-chevron-up"></i>');
    });
}
function menuClassActive(){
    $(".nav .sub-menu").on("click", function(e) {
        e.stopPropagation();
    });

    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().toggleClass("active");
    });

    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
}