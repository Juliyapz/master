$(document).ready(function () {
  //Модальное окно
  var modalButton = $("[data-toggle=modal]");
  var closeModalButton = $(".modal__close");
  modalButton.on("click", openModal);
  closeModalButton.on("click", closeModal);

  function openModal() {
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.addClass('modal__overlay--visible');
    modalDialog.addClass('modal__dialog--visible');
  }

  function closeModal(event) {
    event.preventDefault();
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.removeClass('modal__overlay--visible');
    modalDialog.removeClass('modal__dialog--visible');
  }

  $(document).keyup(function (e) {
    if (e.keyCode == 27) {
      var modalOverlay = $(".modal__overlay");
      var modalDialog = $(".modal__dialog");
      modalOverlay.removeClass('modal__overlay--visible');
      modalDialog.removeClass('modal__dialog--visible');
    }
  });

  $(document).mouseup(function (e) {
    var modalDialog = $(".modal__dialog--visible");
    var modalOverlay = $(".modal__overlay--visible");
    if (!modalDialog.is(e.target)
      && modalDialog.has(e.target).length === 0) {
      modalDialog.removeClass('modal__dialog--visible');
      modalOverlay.removeClass('modal__overlay--visible');
    }
  });

  $('.phone-numb').mask('+7(000) 000-00-00');

});