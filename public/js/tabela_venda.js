$(document).ready(function ($) {
    var table = $("#tableVenda").DataTable({
        ajax: "venda/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "pageLength": 5,
        "order": [0, "ASC"],
        columns: [
            { data: "id", name: "id" },
            { data: "nome_produto", name: "nome" },
            { data: "preco_total", name: "preco" },
            { data: "quantidade", name: "quantidade" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json" }
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    $(document).on("click", ".btnExcluir", function () {

        var id = $(this).data('id');

        swalWithBootstrapButtons.fire({
            title: 'Tem certeza que deseja excluir a venda ' + id + '?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, quero excluir!',
            cancelButtonText: 'Não, Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "delete",
                    url: "venda/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {},
                    success: function (data) {
                        if (data.erro) {
                            swalWithBootstrapButtons.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error");
                        } else {
                            swalWithBootstrapButtons.fire("Sucesso", "Exclusão Realizada", "success")
                                .then(function (result) {
                                    if (result.value) {
                                        $("#tableVenda").DataTable().draw(false);
                                    }
                                });
                        }
                    },
                    error: function () {
                        swalWithBootstrapButtons.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error");
                    },
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error");
            }
        })
    });
});
