"use strict";
const KTSigninGeneral = (function () {
    let e, t, i;

    return {
        init() {
            (e = document.querySelector("#kt_sign_in_form")),
                (t = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {message: "The username is required"}
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {message: "The password is required"},
                                callback: {
                                    message: "Please enter valid password",
                                    callback: function (e) {
                                        if (e.value.length > 0) return _validatePassword();
                                    },
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    },
                })),
                t.addEventListener("click", function (n) {
                    n.preventDefault();
                    i.validate().then(function (i) {
                        "Valid" === i
                            ? (t.setAttribute("data-kt-indicator", "on"),
                                (t.disabled = !0),
                                (e.submit()))
                            : Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"},
                            });
                    });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
