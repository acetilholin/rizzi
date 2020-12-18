$(document).on('click', '.edit', function () {
    var id = $(this).attr("id");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "./offers/" + id,
        method: "GET",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            let offer = data.offer

            $('#update-from').val(moment(offer.date_from).format('DD.MM.Y'))
            $('#update-to').val(moment(offer.date_to).format('DD.MM.Y'))
            $('#offer-id').val(offer.id);
            $('#update-title').val(offer.title);
            $('#update-title-en').val(offer.title_en);
            $('#update-subtitle').summernote('code',offer.subtitle);
            $('#update-subtitle-en').summernote('code',offer.subtitle_en);
            $('#update-active').val(offer.active).change();
            $('#update-pmp').val(offer.price_mp);
            $('#update-ppc').val(offer.price_pc);
            $('#editOffer').modal('show');
        }
    })
});

$(document).on('click','.edit-image', function () {
    var id = $(this).attr("id");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/edit-image',
        method: "GET",
        data: { id: id },
        dataType: "json",
        success: function(data){
            let image = data.image

            $('#update-image').attr({"src": '/'+image.path})
            $('#update-ita').val(image.caption_it)
            $('#update-eng').val(image.caption_en)
            $('#update-category').val(image.category);
            $('#id').val(image.id)
            $('#update').modal('show');
        }
    })
});

$(document).ready(function() {
    $('.editor').summernote({
        rows: 5,
        lang: 'it-IT',
        height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['color', ['forecolor']]
        ]
    });
});

$('#update-from').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});
$('#update-to').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});
$('#datepicker1').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});
$('#datepicker2').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});

$(document).on('click','.open-image', function () {
    var id = $(this).attr("id");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/load-image',
        method: "GET",
        data: { id: id },
        dataType: "json",
        success: function(data){
            $('#hotel-img').attr({"src": '/'+data.image})
            $('#image').modal('show');
        }
    })
});

$(document).ready(function () {
    $('#t-users').tooltip()
    $('#t-stat').tooltip()
    $('#t-gallery').tooltip()
    $('#t-offers').tooltip()
    $('#u-state').tooltip()
    $('#u-online').tooltip()
    $('#mp').tooltip()
    $('#pc').tooltip()
    $('#p1-info').tooltip()
    $('#p2-info').tooltip()
});
