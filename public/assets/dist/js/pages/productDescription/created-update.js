const tableSummary = $("#productTable").DataTable({
    lengthMenu: [
        [10, 25, 50, 100, 500, -1],
        [10, 25, 50, 100, 500, "All"],
    ],
    searching: false,
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    info: false,
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
            previous: "<i class='fas fa-angle-left'></i>",
            next: "<i class='fas fa-angle-right'></i>",
        },
    },
    oLanguage: {
        sSearch: "",
    },
    processing: true,
    serverSide: true,
    ajax: {
        url: `${url}/elevenia-admin/product-service/productDataTable`,
        method: "POST",
        data: function (d) {
            d.productDetail = $('input[name="productDetail"]').val();
            return d;
        },
    },
    columns: [
        {
            name: "name",
            data: "content",
        },

    ],
});


$(function() {
    $('#submitInputDetail').on('submit', async function(e) {
        e.preventDefault();
        const form = $(this);
        const buttonSubmitSummary = $('#submitBtnDetail');
        buttonSubmitSummary.attr('disabled', true);
        buttonSubmitSummary.html('Loading...');
        const data = new FormData(this);
        const productDetail = $('#productDetail');

       const result = await sendData(`${url}/elevenia-admin/product-service/productDetail/store`, 'POST', data);
        if (result.status == 'success') {
            productDetail.val(productDetail.val() + ' ' + result.data);
            buttonSubmitSummary.attr('disabled', false).html('Simpan');
            $('#modalDetailProduct').modal('hide');
            tableSummary.draw();
            Swal.fire(`Saved Succesfully`, result.message, "success");
        }else {
            buttonSubmitSummary.attr('disabled', false).html('Simpan');
            Swal.fire(`Gagal`, result.message, "error");
        }
    });

    tableSummary.on('click', '.btn-edit', async function(e) {
       const modalDetail =  $('#modalDetailProduct');
       const id = $(this).data('id');
        modalDetail.modal('show');
        const res = await sendData(`${url}/elevenia-admin/product-service/productDetail/${id}`, 'GET', {});
        modalDetail.find('input[name="id"]').val(res?.data.id);
        modalDetail.find('input[name="name"]').val(res?.data.name);
        modalDetail.find('#imageInputDetail').css('background-image', `url('${url}/${res?.data?.image}')`);
        modalDetail.find('#imageInputDetail').html(`<button type="button" class="btn btn-danger float-right btn-remove-image" data-key="imageInputDetail">
                                                        <i class="fa fa-trash"></i>
                                                    </button>`);
    });

    tableSummary.on('click', '.btn-delete', async function(e) {
        e.preventDefault();
        const id = $(this).data("id");
        const nama = $(this).data("title");
        const urlTarget = `${url}/elevenia-admin/product-service/productDetail/${id}`
        deleteDataTable(nama, urlTarget, tableSummary)
    });

    $('#modalDetailProduct').on('hide.bs.modal', function (e) {
        const form = $(this).find('#submitInputDetail');
        form.trigger('reset');
        form.find('#imageInputDetail').css('background-image', 'none');
        form.find('#imageInputDetail').find('.btn-remove-image').remove();
        form.find('#imageInputDetail').html(`<label for="image-upload">Pilih Gambar</label>
                                                    <input type="file" name="imageInputDetail">`);
    });
});
