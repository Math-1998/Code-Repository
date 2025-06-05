

jQuery(document).ready(function () {
    canalPipelad();
    bloqueioForm();
    mascaraForm();
    adjustMargin();

    jQuery("[data-anchor]").click(function (event) {
        event.preventDefault();
        var target = jQuery(this.hash).offset().top;
        jQuery("html,body").animate({
            scrollTop: target,
        });
    });

    jQuery(".bt-post").click(function (e) {
        e.preventDefault();
        jQuery('#modal_whatsapp').modal('show');
    });

    const cidadeSelect = jQuery('[name=cidade]');
    const disponibilidadeWrapper = jQuery('.container-disponibilidade');
    const alertaDisponibilidade = jQuery('.alert-form');
    const disponibilidadeSelect = jQuery('[name=disponibilidade]');
    const form = jQuery('form');

    // Monitora mudanças no select de cidade
    cidadeSelect.on('change', function () {
        if (jQuery(this).val() === 'Não') {
            disponibilidadeWrapper.fadeIn();
            disponibilidadeSelect.prop('required', true);
        } else {
            disponibilidadeWrapper.fadeOut();
            disponibilidadeSelect.prop('required', false);
        }
    });

    // Valida o formulário antes do envio
    form.on('submit', function (e) {
        if (cidadeSelect.val() === 'Não' && disponibilidadeSelect.val() === 'Não') {
            e.preventDefault();
            alertaDisponibilidade.show()
        }
    });
});

var acc = document.getElementsByClassName("accordion-sanfona");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active-sanfona");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

/* Definir canal para pipelead */
function canalPipelad() {
    /* Canal para formulário */
    if (!sessionStorage.getItem("canal")) {
        var p = {
            referrer_uri: document.referrer,
            current_uri: window.location.href,
        };
        sessionStorage.setItem("canal", JSON.stringify(p));
    }
    objCanal = JSON.parse(sessionStorage.getItem("canal"));

    jQuery(".inputReferrer").attr("value", objCanal.referrer_uri);
    jQuery(".inputCurrent").attr("value", objCanal.current_uri);
}

/* Bloqueador duplo envio de form */
function bloqueioForm() {
    const formDOM = document.querySelectorAll("form:not(#calc-fertil)");

    formDOM.forEach((item) => {
        item.addEventListener("submit", function () {
            var btnForm = this.querySelector("input[type=submit]");
            if (this.checkValidity()) {
                btnForm.setAttribute("disabled", "disabled");
            }
        });
    });
}

/* Mascára para form */
function mascaraForm() {
    jQuery("[name=celular]").mask('(00)00000-0000');
    jQuery("[name=telefone]").mask('(00)00000-0000');
}

/* Ajustar a margin entre o header e a próxima seção) */

function adjustMargin() {
    let headerHeight;
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    if (isMobile) {
        headerHeight = document.querySelector('#meanmenu').offsetHeight;
    } else {
        headerHeight = document.querySelector('#masthead').offsetHeight;
    }

    document.querySelector('section').style.marginTop = `${headerHeight}px`;
}

document.addEventListener("DOMContentLoaded", adjustMargin);
window.onresize = adjustMargin;

setInterval(adjustMargin, 500);

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.no-index-video-trigger').forEach(function (picture) {
        picture.addEventListener('click', function () {
            const targetId = picture.getAttribute('data-video-id');
            const container = document.getElementById(targetId);

            if (container) {
                const videoUrl = container.getAttribute('data-src');
                const iframe = document.createElement('iframe');

                const attributes = {
                    src: videoUrl,
                    width: '1200',
                    height: '450',
                    frameborder: '0',
                    allowfullscreen: '',
                    allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
                };

                for (let attr in attributes) {
                    iframe.setAttribute(attr, attributes[attr]);
                }

                const styles = {
                    opacity: '0',
                    transition: 'opacity 0.5s ease',
                    width: '100%',
                    height: '380'
                };

                for (let prop in styles) {
                    iframe.style[prop] = styles[prop];
                }

                container.classList.remove('d-none');
                container.appendChild(iframe);

                requestAnimationFrame(() => {
                    iframe.style.opacity = '1';
                });
          
                picture.remove();
            }
        });
    });
});






