document
    .getElementById("hitungTotalBayar")
    .addEventListener("click", function () {
        var total_berat =
            parseFloat(document.getElementById("total_berat").value) || 0;
        var diskon = parseFloat(document.getElementById("diskon").value) || 0;
        var pakaian_select = document.getElementById("pakaian_id");
        var harga =
            parseFloat(
                pakaian_select.options[
                    pakaian_select.selectedIndex
                ].getAttribute("data-harga")
            ) || 0;

        var total_bayar = total_berat * harga - diskon;
        document.getElementById("total_bayar").value = total_bayar.toFixed(2);
    });
