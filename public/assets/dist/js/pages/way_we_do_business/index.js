$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

const domStrings = {
    form: $("#form"),
    formInputan: $(".form-inputan"),
    btnTambah: $(".btn-tambah"),
    btnKembali: $(".btn-kembali"),
    inputVal: $("input[name='id']"),
    formJurusan: $('select[name="jurusan"]'),
    alertError: $(".alert-error"),
};

domStrings.formJurusan.select2();

const table = $("#example1").DataTable({
    lengthMenu: [
        [10, 25, 50, 100, 500, -1],
        [10, 25, 50, 100, 500, "All"],
    ],
    // searching: false,
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
        url: `${url}/elevenia-admin/way-we-do-business/dataTable`,
        method: "POST",
        data: function (d) {
            d.title = $('input[name="title"]').val();
            d.date = $('input[name="date"]').val();
            d.status = $('select[name="status"]').val();
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
            data: "content",
            orderable: false,
        },

    ],
});


domStrings.btnTambah.on("click", function (e) {
    e.preventDefault();
    domStrings.form.trigger("reset");
    domStrings.formInputan.find('#icon').css('background-image', 'none');
    domStrings.formInputan.find('#icon').find('.btn-remove-image').remove();
    domStrings.inputVal.val("0");
    domStrings.formInputan.find('#icon').html(`<label for="image-upload">Pilih Gambar</label>
                                                <input type="file" name="icon">`);
    domStrings.formJurusan.val(null).trigger("change");
    domStrings.formInputan.slideDown();
});

domStrings.btnKembali.on("click", function () {
    domStrings.formInputan.slideUp();
    domStrings.form.trigger("reset");
    domStrings.form.find('.gallery-item').css('background-image', 'none');
    domStrings.formInputan.find('#icon').find('.btn-remove-image').remove();
});

table.on("click", "a.btn-edit", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    domStrings.formInputan.slideDown();
    domStrings.inputVal.val(id);
    $.getJSON(`${url}/elevenia-admin/way-we-do-business/${id}`, function (res) {
        domStrings.formInputan.find('input[name="name"]').val(res?.data?.name);
        domStrings.formInputan.find('textarea[name="description"]').val(res?.data?.description);
        domStrings.formInputan.find('#icon').css('background-image', `url('${url}/${res?.data?.icon}')`);
        domStrings.formInputan.find('#icon').html(`<button type="button" class="btn btn-danger float-right btn-remove-image" data-key="icon">
                                                        <i class="fa fa-trash"></i>
                                                    </button>`);
    });
});

domStrings.form.on("submit", async function (e) {
    e.preventDefault();
    const data = new FormData(this);
    const result = await sendDataFile($(this).attr('action'), 'POST', data);
    if (result.status == 'success') {
        table.draw();
        Swal.fire(`Success`, result.message, "success");
        domStrings.form.trigger("reset");
        domStrings.form.find('.gallery-item').css('background-image', 'none');
        domStrings.formInputan.slideUp();
    }else {
        Swal.fire(`Gagal`, result.message, "error");
    }
});

function tanggal(tgl) {
    console.log(tgl);
    document.getElementById("tgl_akhir").min = tgl;
}

table.on("click", ".btn-hapus", function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    let nama = $(this).data("nama");
    let urlTarget = `${url}/elevenia-admin/way-we-do-business/${id}`;
    deleteDataTable(nama, urlTarget, table)
});
