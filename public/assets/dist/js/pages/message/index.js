$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
    },
});

const table = $("#example1").DataTable({
    lengthMenu: [
        [10, 25, 50, 100, 500, -1],
        [10, 25, 50, 100, 500, "All"],
    ],
    searching: false,
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    order: [],
    pagingType: "full_numbers",
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        processing:
            '<div class="spinner-border text-info" role="status">' +
            '<span class="sr-only">Loading...</span>' +
            "</div>",
        paginate: {
            Search: '<i class="icon-search"></i>',
            first: "<i class='fas fa-angle-double-left'></i>",
            previous: "<i class='fas fa-angle-left'></i>",
            next: "<i class='fas fa-angle-right'></i>",
            last: "<i class='fas fa-angle-double-right'></i>",
        },
    },
    oLanguage: {
        sSearch: "",
    },
    processing: true,
    serverSide: true,
    ajax: {
        url: `${url}/elevenia-admin/message/dataTable`,
        method: "POST",
        data: function (d) {
            const input = $('input');
            input.each(function() {
                let name = $(this).attr('name');
                let value = $(this).val();
                if (value != '')
                    d[name] = value;
            });
            return d;
        },
    },
    columns: [
        {
            name: "created_at",
            data: "DT_RowIndex",
        },
        {
            name: "name",
            data: "name",
            orderable: false,
        },
        {
            name: "email",
            data: "email",
            orderable: false,
        },
        {
            name: "subject",
            data: "subject",
            orderable: false,
        },
        {
            name: "message",
            data: "message",
            orderable: false,
        },
        {
            name: "submitted_at",
            data: "submitted_at",
            orderable: false,
        },

    ],
});



$('input').on('keyup', function() {
    setTimeout(function() {
        table.draw();
    }, 900);
}).on('change', function() {
    setTimeout(function() {
        table.draw();
    }, 900);
});
