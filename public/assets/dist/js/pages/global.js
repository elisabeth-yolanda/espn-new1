$('.select2').select2({});
$(".logout").click(function () {
    const nama = $(this).data().name;
    Swal.fire({
        title: "Do you want to logout?",
        text: ``,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6492b8da",
        cancelButtonColor: "#d33",
        confirmButtonText: "Keluar",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            const logout = `${url}/elevenia-admin/logout`;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            $.post(logout)
                .done(function (response) {
                // Logout berhasil
                Swal.fire({
                    title: "Logout Successful",
                    text: `Goodbye, ${nama}!`,
                    icon: "success",
                    confirmButtonColor: "#6492b8da",
                }).then(() => {
                    // Redirect ke halaman login atau halaman lainnya
                    window.location.href = "/elevenia-admin/login";
                });
                })
                .fail(function (error) {
                // Error saat melakukan logout
                Swal.fire({
                    title: "Logout Failed",
                    text: "An error occurred while logging out. Please try again.",
                    icon: "error",
                    confirmButtonColor: "#6492b8da",
                });
            });
        }
    });
});

$('.deleteData').on('click', function() {
    let name = $(this).data('name');
    let id = $(this).data('id');
    Swal.fire({
        title: "Do you want to delete",
        text: `Data ${name} will be deleted`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6492b8da",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $(`#form-hapus${id}`).submit();
        }
    });
})

$('.changeTA').on('change', function() {
    $('#formChangeTH').trigger('submit');
});

function deleteDataTable(nama, urlTarget, table) {
    Swal.fire({
        title: "Do you want to delete",
        text: `Data ${nama} will be deleted`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6492b8da",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yakin",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: urlTarget,
                method: "post",
                data: [{ name: "_method", value: "DELETE" }],
                success: function (res) {
                    table.draw();
                    Swal.fire(`Berhasil dihapus`, res.message, "success");
                },
                error: function (res) {
                    console.log(res);
                    Swal.fire(`Gagal`, `${res.responseJSON.message}`, "error");
                },
            });
        }
    });
}

async function sendData(url, type, data) {
    const config = {
        method: type,
        url: url,
        data: data,
    };
    const result = await axios(config)
                    .then((res) => res.data)
                    .then(async (res) => {
                        return res;
                    }).catch(async (err) => {
                        Swal.fire(`Gagal`, err.responseJSON.message, "error");
                        return err.response;
                    });

    return result;
}


async function sendDataFile(url, type, data) {
    const header = {
        "Content-Type": "multipart/form-data",
    };

    const config = {
        method: type,
        url: url,
        header: header,
        data: data
    };

    const result = await axios(config)
                    .then((res) => res.data)
                    .then(async (res) => {
                        return res;
                    }).catch(async (err) => {
                        Swal.fire(`Gagal`, err.responseJSON.message, "error");
                        return err.response;
                    });

    return result;
}
