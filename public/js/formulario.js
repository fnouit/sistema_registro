function mostrar(id) {
    if (id == "agremiado") {
        $("#agremiado").show();
        $("#no_agremiado").hide();
    }

    if (id == "no_agremiado") {
        $("#agremiado").hide();
        $("#no_agremiado").show();
    }
}