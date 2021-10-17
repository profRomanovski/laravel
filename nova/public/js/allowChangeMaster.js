let time;
function doubleClickSelect() {
  if (document.querySelector('table[data-testid="resource-table"]') != null || document.querySelector('table[data-testid="resource-table"]') != undefined) {
    let cardWrap = document.querySelectorAll('.card')[1];
    if (cardWrap != undefined) {
      let checkboxArray = cardWrap.querySelectorAll('.checkbox');
      checkboxArray.forEach(function (element) {
        element.addEventListener('change', function () {
          this.closest('tr').querySelector('select').disabled = false;
          this.setAttribute('disabled', 'true');
        });
      });
    }

  }
}
