const { ajax } = require("jquery");

require("./bootstrap");

$(document).ready(function() {
    // setup
    const filter = $("#filter");
    const apiUrl =
        window.location.protocol +
        "//" +
        window.location.host +
        "/api/students/genders";
    // console.log(apiUrl);

    let source = $("#student-template").html();
    let template = Handlebars.compile(source);
    let container = $(".students");

    /**
     * Handle the selector view with handlebars
     * using the array returned with the logic of the Api/StudentController
     */
    filter.on("change", function() {
        let gender = $(this).val();
        // console.log(gender);

        $.ajax({
            type: "POST",
            url: apiUrl,
            data: {
                filter: gender
            }
        })
            .done(function(res) {
                if (res.response.length > 0) {
                    // console.log(res.response);

                    // clean
                    container.html("");

                    for (let i = 0; i < res.response.length; i++) {
                        const item = res.response[i];

                        let context = {
                            slug: item.slug,
                            img: item.img,
                            nome: item.nome,
                            eta: item.eta,
                            assunzione:
                                item.genere == "m" ? "assunto" : "assunta",
                            azienda: item.azienda,
                            ruolo: item.ruolo,
                            descrizione: item.descrizione
                        };

                        let output = template(context);
                        container.append(output);
                    }
                } else {
                    console.log(res.error);
                }
            })
            .fail(function(err) {
                console.log("Error:", err);
            });
    });

    //
}); //end ready
